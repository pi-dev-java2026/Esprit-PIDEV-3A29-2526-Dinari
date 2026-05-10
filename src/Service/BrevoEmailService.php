<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class BrevoEmailService
{
    public function __construct(
        private HttpClientInterface $httpClient
    ) {
    }

    public function sendEmail(
        string $toEmail,
        string $toName,
        string $subject,
        string $htmlContent
    ): array {
        $apiKey = $_ENV['BREVO_API_KEY'] ?? null;

        if (!$apiKey) {
            throw new \RuntimeException('BREVO_API_KEY introuvable dans .env');
        }

        $response = $this->httpClient->request('POST', 'https://api.brevo.com/v3/smtp/email', [
            'headers' => [
                'accept' => 'application/json',
                'api-key' => $apiKey,
                'content-type' => 'application/json',
            ],
            'json' => [
                'sender' => [
                    'name' => 'Plateforme Experts',
                    'email' => 'aziz2822003@gmail.com',
                ],
                'to' => [
                    [
                        'email' => $toEmail,
                        'name' => $toName,
                    ]
                ],
                'subject' => $subject,
                'htmlContent' => $htmlContent,
            ],
        ]);

        return $response->toArray(false);
    }
}