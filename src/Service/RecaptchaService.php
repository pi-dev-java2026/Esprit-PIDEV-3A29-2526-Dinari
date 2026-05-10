<?php

namespace App\Service;

/**
 * RecaptchaService
 *
 * Vérifie côté serveur le token reCAPTCHA v2 soumis par le client.
 * Utilise curl natif PHP pour appeler l'API Google.
 * La SECRET_KEY n'est jamais exposée côté frontend.
 */
class RecaptchaService
{
    private const VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

    public function __construct(
        private readonly string $secretKey
    ) {}

    /**
     * Vérifie un token reCAPTCHA v2.
     *
     * @param string|null $token    Le token `g-recaptcha-response` soumis par le formulaire
     * @param string|null $clientIp L'IP du client (optionnel)
     * @return bool true si le CAPTCHA est valide
     */
    public function verify(?string $token, ?string $clientIp = null): bool
    {
        if (empty($token)) {
            return false;
        }

        try {
            $postData = http_build_query([
                'secret'   => $this->secretKey,
                'response' => $token,
                'remoteip' => $clientIp ?? '',
            ]);

            $context = stream_context_create([
                'http' => [
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/x-www-form-urlencoded\r\n"
                              .  "Content-Length: " . strlen($postData) . "\r\n",
                    'content' => $postData,
                    'timeout' => 10,
                ],
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $result = file_get_contents(self::VERIFY_URL, false, $context);

            if ($result === false) {
                error_log('[reCAPTCHA] Impossible de contacter l\'API Google.');
                return false;
            }

            $data = json_decode($result, true);

            if (!is_array($data)) {
                error_log('[reCAPTCHA] Réponse JSON invalide: ' . $result);
                return false;
            }

            // Log pour le débogage en dev
            if (!($data['success'] ?? false) && !empty($data['error-codes'])) {
                error_log('[reCAPTCHA] Erreur: ' . implode(', ', $data['error-codes']));
            }

            return isset($data['success']) && $data['success'] === true;

        } catch (\Throwable $e) {
            error_log('[reCAPTCHA] Exception: ' . $e->getMessage());
            return false;
        }
    }
}
