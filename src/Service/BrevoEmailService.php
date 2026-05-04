<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class BrevoEmailService
{
    public function __construct(
        private HttpClientInterface $httpClient
    ) {
    }

   public function sendEmail(string $to, string $subject, string $html): void
{
    $this->httpClient->request('POST', 'https://api.brevo.com/v3/smtp/email', [
        'headers' => [
            'api-key' => $_ENV['BREVO_API_KEY'],
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'sender' => [
                'name' => 'Plateforme Experts',
                'email' => 'aziz2822003@gmail.com',
            ],
            'to' => [
                ['email' => $to],
            ],
            'subject' => $subject,
            'htmlContent' => $html,
        ],
    ]);
}
}