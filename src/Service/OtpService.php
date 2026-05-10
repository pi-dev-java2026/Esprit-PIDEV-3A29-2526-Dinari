<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class OtpService
{
    public function __construct(
        private RequestStack $requestStack,
        private string       $resendApiKey = ''
    ) {}

    public function sendOtp(string $toEmail, string $planNom): void
    {
        $code      = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiresAt = time() + 600;

        $session = $this->requestStack->getSession();
        $session->set('otp_code',       $code);
        $session->set('otp_email',      $toEmail);
        $session->set('otp_expires_at', $expiresAt);

        $this->sendViaResend($toEmail, $planNom, $code);
    }

    private function sendViaResend(string $toEmail, string $planNom, string $code): void
    {
        // ── QR code via API gratuite (encode le code OTP) ──
        $qrData   = urlencode("DINARI-OTP:{$code}:{$planNom}");
        $qrUrl    = "https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={$qrData}&color=007f8c&bgcolor=ffffff&margin=10&format=png";

        // ── Chiffres individuels stylés ──
        $digits = implode('', array_map(
            fn($d) => "<td style='padding:0 5px;'>
                         <div style='
                           width:52px;height:60px;line-height:60px;
                           text-align:center;
                           background:#f0f7fa;
                           border:2px solid #e2eaf0;
                           border-bottom:3px solid #00b4c6;
                           border-radius:12px;
                           font-family:\"Courier New\",monospace;
                           font-size:30px;font-weight:900;
                           color:#0d1b2a;
                         '>$d</div>
                        </td>",
            str_split($code)
        ));

        // ── Expiration formatée ──
        $expireStr = date('H:i', time() + 600);

        $html = <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Code de confirmation Dinari</title>
</head>
<body style="margin:0;padding:0;background:#f0f7fa;font-family:'Helvetica Neue',Arial,sans-serif;">

  <!-- WRAPPER -->
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f0f7fa;padding:40px 0;">
    <tr><td align="center">
      <table width="560" cellpadding="0" cellspacing="0"
             style="background:#fff;border-radius:20px;border:1px solid #e2eaf0;
                    box-shadow:0 8px 32px rgba(0,127,140,0.10);overflow:hidden;max-width:560px;">

        <!-- HEADER -->
        <tr>
          <td style="background:linear-gradient(135deg,#0d1b2a 0%,#112240 50%,#007f8c 100%);
                     padding:32px 40px;text-align:center;">
            <div style="font-size:32px;font-weight:900;color:#fff;letter-spacing:-0.03em;
                        font-family:'Helvetica Neue',Arial,sans-serif;">
              Din<span style="color:#00b4c6;">ari</span>
            </div>
            <div style="margin-top:8px;font-size:12px;font-weight:700;color:rgba(255,255,255,.5);
                        letter-spacing:.15em;text-transform:uppercase;">
              Confirmation d'abonnement
            </div>
           </td>
         </tr>

        <!-- BADGE SUCCESS -->
        <tr>
          <td align="center" style="padding:36px 40px 0;">
            <div style="width:72px;height:72px;border-radius:50%;
                        background:linear-gradient(135deg,#10b981,#059669);
                        display:inline-flex;align-items:center;justify-content:center;
                        box-shadow:0 8px 24px rgba(16,185,129,0.30);">
              <span style="font-size:32px;line-height:1;">✓</span>
            </div>
           </td>
         </tr>

        <!-- TITRE -->
        <tr>
          <td align="center" style="padding:20px 40px 8px;">
            <h1 style="margin:0;font-size:24px;font-weight:900;color:#0d1b2a;
                       letter-spacing:-0.02em;">
              Votre code de confirmation
            </h1>
           </td>
         </tr>

        <!-- SOUS-TITRE -->
        <tr>
          <td align="center" style="padding:0 40px 28px;">
            <p style="margin:0;font-size:15px;color:#64748b;line-height:1.65;text-align:center;">
              Pour activer votre abonnement
              <strong style="color:#0d1b2a;">$planNom</strong>,
              entrez le code ci-dessous.<br>
              Il expire à <strong style="color:#007f8c;">$expireStr</strong>
              (dans <strong>10 minutes</strong>).
            </p>
           </td>
         </tr>

        <!-- CODE OTP -->
        <tr>
          <td align="center" style="padding:0 40px 32px;">
            <table cellpadding="0" cellspacing="0" style="display:inline-table;">
              <tr>$digits</tr>
            </table>
           </td>
         </tr>

        <!-- SÉPARATEUR -->
        <tr>
          <td style="padding:0 40px;">
            <div style="height:1px;background:linear-gradient(to right,transparent,#e2eaf0,transparent);"></div>
           </td>
         </tr>

        <!-- QR CODE SECTION -->
        <tr>
          <td style="padding:32px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td style="vertical-align:middle;padding-right:24px;">
                  <div style="font-size:14px;font-weight:800;color:#0d1b2a;margin-bottom:8px;">
                    📱 Ou scannez le QR code
                  </div>
                  <p style="margin:0;font-size:13px;color:#64748b;line-height:1.65;">
                    Scannez ce code depuis votre application Dinari ou un lecteur QR pour
                    confirmer instantanément votre identité.
                  </p>
                  <div style="margin-top:14px;display:inline-block;
                              background:#f0f7fa;border:1.5px solid #e2eaf0;
                              border-radius:8px;padding:8px 14px;
                              font-size:11px;font-weight:700;color:#007f8c;
                              letter-spacing:.05em;text-transform:uppercase;">
                    ⏱ Valide 10 min
                  </div>
                 </td>
                <td style="vertical-align:middle;text-align:center;flex-shrink:0;" width="160">
                  <div style="background:#fff;border:2px solid #e2eaf0;
                              border-radius:16px;padding:12px;display:inline-block;
                              box-shadow:0 4px 16px rgba(0,127,140,0.10);">
                    <img src="$qrUrl"
                         width="140" height="140"
                         alt="QR Code OTP Dinari"
                         style="display:block;border-radius:8px;"/>
                  </div>
                  <div style="margin-top:8px;font-size:10px;color:#94a3b8;font-weight:600;
                              letter-spacing:.05em;text-transform:uppercase;">
                    Scanner = confirmer
                  </div>
                 </td>
              </tr>
            </table>
           </td>
         </tr>

        <!-- SÉPARATEUR -->
        <tr>
          <td style="padding:0 40px;">
            <div style="height:1px;background:linear-gradient(to right,transparent,#e2eaf0,transparent);"></div>
           </td>
         </tr>

        <!-- ALERTE SÉCURITÉ -->
        <tr>
          <td style="padding:24px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0"
                   style="background:#fef9f0;border:1.5px solid #fed7aa;
                          border-radius:12px;overflow:hidden;">
              <tr>
                <td style="padding:16px 18px;">
                  <div style="font-size:13px;font-weight:800;color:#92400e;margin-bottom:6px;">
                    ⚠️ Sécurité
                  </div>
                  <div style="font-size:13px;color:#78350f;line-height:1.6;">
                    Ne partagez jamais ce code. Dinari ne vous demandera <strong>jamais</strong>
                    ce code par téléphone ou par message.
                    Si vous n'avez pas fait cette demande, ignorez cet email.
                  </div>
                 </td>
              </tr>
            </table>
           </td>
         </tr>

        <!-- FOOTER -->
        <tr>
          <td style="background:#f8fbfc;padding:20px 40px;
                     border-top:1px solid #e2eaf0;text-align:center;">
            <div style="font-size:12px;color:#94a3b8;line-height:1.7;">
              Cet email vous a été envoyé par
              <strong style="color:#64748b;">Dinari</strong>
              à <strong style="color:#64748b;">$toEmail</strong><br>
              Ce code OTP est valable uniquement pour cet abonnement · Expire à $expireStr
            </div>
            <div style="margin-top:12px;font-size:11px;color:#cbd5e1;">
              © 2025 Dinari · Tous droits réservés
            </div>
           </td>
         </tr>

      </table>
     </td>
   </tr>
  </table>

</body>
</html>
HTML;

        $payload = json_encode([
            'from'    => 'Dinari <onboarding@resend.dev>',
            'to'      => [$toEmail],
            'subject' => "🔐 Votre code Dinari : {$code}",
            'html'    => $html,
        ]);

        $ch = curl_init('https://api.resend.com/emails');
        
        if ($ch === false) {
            throw new \RuntimeException('Failed to initialize cURL');
        }
        
        // Convertir le payload en string si ce n'est pas déjà fait
        $postFields = is_string($payload) ? $payload : '';
        
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $postFields,
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . $this->resendApiKey,
                'Content-Type: application/json',
            ],
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_TIMEOUT => 30,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close($ch);

        if ($httpCode !== 200 && $httpCode !== 201) {
            $errorMsg = $response !== false ? (string) $response : 'Unknown error';
            throw new \RuntimeException('Resend API error ' . $httpCode . ': ' . $errorMsg);
        }
    }

    public function verifyOtp(string $inputCode): bool
    {
        $session   = $this->requestStack->getSession();
        $stored    = $session->get('otp_code');
        $expiresAt = $session->get('otp_expires_at');

        if (!$stored || !$expiresAt) return false;
        if (time() > (int) $expiresAt) return false;
        if ($inputCode !== (string) $stored) return false;

        $session->remove('otp_code');
        $session->remove('otp_expires_at');
        return true;
    }

    public function getOtpEmail(): ?string
    {
        $email = $this->requestStack->getSession()->get('otp_email');
        return $email !== null ? (string) $email : null;
    }
}