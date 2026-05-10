<?php

namespace App\Controller\Client;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RdvController extends AbstractController
{
    public function __construct(
        private string $resendApiKey = ''
    ) {}

    #[Route('/client/rdv/confirmer', name: 'app_client_rdv_confirmer', methods: ['POST'])]
    public function confirmer(Request $request): JsonResponse
    {
        $data = json_decode((string) $request->getContent(), true);

        // ── Validation ──
        $required = ['agence', 'date', 'slot', 'prenom', 'nom', 'cin', 'email', 'tel', 'planNom'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                return new JsonResponse(['success' => false, 'error' => "Champ manquant : $field"], 400);
            }
        }
        if (!filter_var((string) $data['email'], FILTER_VALIDATE_EMAIL)) {
            return new JsonResponse(['success' => false, 'error' => 'Email invalide.'], 400);
        }

        // ── Format date FR ──
        try {
            $dateObj       = new \DateTime((string) $data['date']);
            $dateFormatted = $dateObj->format('l d F Y');
            $dateFormatted = str_replace(
                ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
                ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'],
                $dateFormatted
            );
            $dateFormatted = str_replace(
                ['January','February','March','April','May','June','July','August','September','October','November','December'],
                ['janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'],
                $dateFormatted
            );
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => 'Date invalide.'], 400);
        }

        // ── Référence unique ──
        $reference = 'RDV-' . strtoupper(substr(md5(uniqid()), 0, 8));

        // ── Contenu QR code — ASCII pur, sans accents ──
        $qrContent = implode(' - ', [
            'DINARI',
            $reference,
            $data['prenom'] . ' ' . $data['nom'],
            $data['agence'],
            $data['slot'],
            $data['planNom'],
        ]);

        // ── Google Charts QR ──
        $qrUrl = 'https://chart.googleapis.com/chart?chs=200x200&cht=qr&choe=UTF-8&chld=M%7C4&chl=' . rawurlencode($qrContent);

        // ── Envoi email client ──
        $htmlClient = $this->renderHtmlEmail(
            prenom:      (string) $data['prenom'],
            nom:         (string) $data['nom'],
            agence:      (string) $data['agence'],
            agenceVille: (string) ($data['agenceVille'] ?? ''),
            date:        $dateFormatted,
            slot:        (string) $data['slot'],
            planNom:     (string) $data['planNom'],
            planPrix:    (string) ($data['planPrix'] ?? ''),
            message:     (string) ($data['message'] ?? ''),
            reference:   $reference,
            email:       (string) $data['email'],
            qrUrl:       $qrUrl
        );

        try {
            $this->sendViaResend(
                to:      (string) $data['email'],
                subject: "✅ Votre rendez-vous Dinari est confirmé — $reference",
                html:    $htmlClient
            );

            // ── Email interne ──
            $this->sendViaResend(
                to:      'contact@dinari.tn',
                subject: "📅 Nouveau RDV : {$data['prenom']} {$data['nom']} — {$data['agence']} — $dateFormatted {$data['slot']}",
                html:    "
                    <h2 style='font-family:Arial;color:#0d1b2a;'>Nouveau rendez-vous en agence</h2>
                    <p><strong>Référence :</strong> $reference</p>
                    <p><strong>Client :</strong> {$data['prenom']} {$data['nom']}</p>
                    <p><strong>CIN :</strong> {$data['cin']}</p>
                    <p><strong>Email :</strong> {$data['email']}</p>
                    <p><strong>Téléphone :</strong> {$data['tel']}</p>
                    <p><strong>Agence :</strong> {$data['agence']}</p>
                    <p><strong>Date :</strong> $dateFormatted à {$data['slot']}</p>
                    <p><strong>Plan :</strong> {$data['planNom']} — " . ($data['planPrix'] ?? '') . "</p>
                    <p><strong>Message :</strong> " . (!empty($data['message']) ? htmlspecialchars((string) $data['message']) : '(aucun)') . "</p>
                "
            );

        } catch (\Exception $e) {
            error_log('Resend error RDV: ' . $e->getMessage());
        }

        return new JsonResponse([
            'success'   => true,
            'reference' => $reference,
            'message'   => "Rendez-vous confirmé pour le $dateFormatted à {$data['slot']}",
        ]);
    }

    // ═══════════════════════════════════════════════════════════════════════
    // NOUVEL ENDPOINT OCR - Scanner carte d'identité
    // ═══════════════════════════════════════════════════════════════════════
    #[Route('/client/rdv/scan-id', name: 'app_client_rdv_scan_id', methods: ['POST'])]
    public function scanId(Request $request, \App\Service\OcrService $ocr): JsonResponse
    {
        $file = $request->files->get('id_card');
        
        if (!$file) {
            return new JsonResponse(['error' => 'Aucun fichier reçu'], 400);
        }
        
        try {
            $info = $ocr->extractIdentityInfo($file);
            return new JsonResponse([
                'success' => true,
                'cin' => $info['cin'],
                'nom' => $info['nom'],
                'prenom' => $info['prenom'],
                'date_naissance' => $info['date_naissance']
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    // ── Envoi via Resend API ─────────────────────────────────────────────
    private function sendViaResend(string $to, string $subject, string $html): void
    {
        $payload = json_encode([
            'from'    => 'Dinari <onboarding@resend.dev>',
            'to'      => [$to],
            'subject' => $subject,
            'html'    => $html,
        ]);

        if ($payload === false) {
            throw new \RuntimeException('Erreur encodage JSON');
        }

        $ch = curl_init('https://api.resend.com/emails');
        
        if ($ch === false) {
            throw new \RuntimeException('Erreur initialisation cURL');
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $this->resendApiKey,
                'Content-Type: application/json',
            ],
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_TIMEOUT        => 30,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 && $httpCode !== 201) {
            throw new \RuntimeException('Resend API error ' . $httpCode . ': ' . (string) $response);
        }
    }

    // ── Template HTML email ──────────────────────────────────────────────
    private function renderHtmlEmail(
        string $prenom, string $nom, string $agence, string $agenceVille,
        string $date, string $slot, string $planNom, string $planPrix,
        string $message, string $reference, string $email, string $qrUrl
    ): string {

        $messageBlock = !empty($message)
            ? "<tr>
                 <td style='padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:12px;color:#64748b;font-weight:600;'>💬 Message</td>
                 <td style='padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:13px;color:#0d1b2a;font-style:italic;'>" . htmlspecialchars($message) . "</td>
                </tr>"
            : '';

        return <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#f0f7fa;font-family:'Segoe UI',Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f0f7fa;padding:40px 0;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0"
       style="background:#fff;border-radius:20px;overflow:hidden;
              box-shadow:0 8px 32px rgba(0,127,140,.12);max-width:600px;width:100%;">

  <!-- HEADER -->
  <tr><td style="background:linear-gradient(135deg,#0d1b2a 0%,#112240 50%,#007f8c 100%);
                 padding:32px 36px;text-align:center;">
    <div style="font-size:30px;font-weight:900;color:#fff;letter-spacing:-0.03em;margin-bottom:6px;
                font-family:'Helvetica Neue',Arial,sans-serif;">
      Din<span style="color:#00b4c6;">ari</span>
    </div>
    <div style="font-size:12px;font-weight:700;color:rgba(255,255,255,.55);
                letter-spacing:.15em;text-transform:uppercase;">
      Confirmation de rendez-vous
    </div>
    </td></tr>

  <!-- BADGE + TITRE -->
  <tr><td style="padding:40px 36px 0;text-align:center;">
    <div style="width:80px;height:80px;
                background:linear-gradient(135deg,#10b981,#059669);
                border-radius:50%;display:inline-block;line-height:80px;
                font-size:36px;text-align:center;
                box-shadow:0 8px 24px rgba(16,185,129,.30);margin-bottom:20px;">✓</div>
    <h1 style="font-size:24px;font-weight:900;color:#0d1b2a;margin:0 0 10px;
               font-family:'Helvetica Neue',Arial,sans-serif;">
      Rendez-vous confirmé !
    </h1>
    <p style="font-size:15px;color:#64748b;margin:0 0 4px;line-height:1.6;">
      Bonjour <strong style="color:#0d1b2a;">$prenom $nom</strong>,
    </p>
    <p style="font-size:14px;color:#64748b;margin:0;">
      Votre rendez-vous a bien été enregistré.<br>
      Présentez-vous à l'agence à l'heure indiquée avec une pièce d'identité.
    </p>
    </td></tr>

  <!-- RÉFÉRENCE -->
  <tr><td style="padding:20px 36px 0;text-align:center;">
    <div style="background:#f0fbfc;border:1.5px solid rgba(0,127,140,.25);
                border-radius:10px;padding:12px 24px;display:inline-block;">
      <span style="font-size:12px;color:#64748b;font-weight:600;">Référence : </span>
      <strong style="font-size:15px;color:#007f8c;letter-spacing:.06em;
                     font-family:'Courier New',monospace;">$reference</strong>
    </div>
    </td></tr>

  <!-- DÉTAILS + QR CODE -->
  <tr><td style="padding:28px 36px;">
    <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td style="vertical-align:top;padding-right:20px;">
          <div style="background:#f8fafc;border:1.5px solid #e2eaf0;
                      border-radius:14px;padding:20px 22px;">
            <div style="font-size:11px;font-weight:700;color:#007f8c;
                        text-transform:uppercase;letter-spacing:.1em;margin-bottom:14px;">
              Détails du RDV
            </div>
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr><td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:12px;color:#64748b;font-weight:600;width:90px;">📅 Date</td>
                  <td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:13px;color:#0d1b2a;font-weight:700;">$date</td></tr>
              <tr><td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:12px;color:#64748b;font-weight:600;">🕐 Heure</td>
                  <td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:13px;color:#0d1b2a;font-weight:700;">$slot</td></tr>
              <tr><td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:12px;color:#64748b;font-weight:600;">🏢 Agence</td>
                  <td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:13px;color:#0d1b2a;font-weight:700;">$agence — $agenceVille</td></tr>
              <tr><td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:12px;color:#64748b;font-weight:600;">📦 Plan</td>
                  <td style="padding:8px 0;border-bottom:1px solid #e2eaf0;font-size:13px;color:#0d1b2a;font-weight:700;">$planNom</td></tr>
              <tr><td style="padding:8px 0;font-size:12px;color:#64748b;font-weight:600;">💰 Montant</td>
                  <td style="padding:8px 0;font-size:13px;color:#0d1b2a;font-weight:700;">$planPrix</td></tr>
              $messageBlock
            </table>
          </div>
        </td>
        <td style="vertical-align:top;text-align:center;" width="190">
          <div style="background:#fff;border:2px solid #e2eaf0;
                      border-radius:16px;padding:14px;
                      box-shadow:0 4px 16px rgba(0,127,140,.10);">
            <img src="$qrUrl"
                 width="160" height="160"
                 alt="QR Code $reference"
                 style="display:block;border-radius:8px;"/>
          </div>
          <div style="margin-top:10px;font-size:12px;color:#64748b;
                      font-weight:600;line-height:1.6;text-align:center;">
            📱 Scannez pour voir<br>les détails du RDV
          </div>
          <div style="margin-top:8px;background:#f0fbfc;
                      border:1px solid rgba(0,127,140,.2);
                      border-radius:6px;padding:6px 10px;
                      font-size:10px;color:#007f8c;font-weight:700;
                      letter-spacing:.04em;text-transform:uppercase;
                      font-family:'Courier New',monospace;">
            $reference
          </div>
        </td>
      </tr>
    </table>
    </td></tr>

  <!-- TIPS -->
  <tr><td style="padding:0 36px 28px;">
    <div style="background:#fffbeb;border:1.5px solid #fcd34d;
                border-radius:12px;padding:18px 22px;">
      <p style="font-size:13px;font-weight:800;color:#92400e;margin:0 0 10px;">
        💡 À ne pas oublier
      </p>
      <table cellpadding="0" cellspacing="0">
        <tr><td style="padding:3px 0;font-size:13px;color:#78350f;line-height:1.7;">
          ✔ Présentez-vous <strong>5 minutes avant</strong> votre créneau
        </td></tr>
        <tr><td style="padding:3px 0;font-size:13px;color:#78350f;line-height:1.7;">
          ✔ Apportez une <strong>pièce d'identité</strong> valide
        </td></tr>
        <tr><td style="padding:3px 0;font-size:13px;color:#78350f;line-height:1.7;">
          ✔ Montrez le QR code ou la référence <strong>$reference</strong>
        </td></tr>
        <tr><td style="padding:3px 0;font-size:13px;color:#78350f;line-height:1.7;">
          ✔ Nos conseillers s'occupent de tout pour votre abonnement
        </td></tr>
      </table>
    </div>
    </td></tr>

  <!-- FOOTER -->
  <tr><td style="background:#0d1b2a;padding:26px 36px;text-align:center;">
    <div style="font-size:20px;font-weight:900;color:#fff;margin-bottom:8px;
                font-family:'Helvetica Neue',Arial,sans-serif;">
      Din<span style="color:#00b4c6;">ari</span>
    </div>
    <p style="font-size:12px;color:rgba(255,255,255,.4);margin:0 0 6px;">
      Cet email a été envoyé à <strong style="color:rgba(255,255,255,.6);">$email</strong>
    </p>
    <p style="font-size:11px;color:rgba(255,255,255,.3);margin:0;">
      Pour modifier ou annuler votre RDV : contact@dinari.tn<br>
      © 2025 Dinari · Tous droits réservés
    </p>
    </td></tr>

</table>
</td></tr>
</table>

</body>
</html>
HTML;
    }
}