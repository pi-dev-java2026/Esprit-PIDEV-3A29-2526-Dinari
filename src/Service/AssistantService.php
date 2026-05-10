<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Proxy to the Python ML chatbot microservice.
 * The intelligence lives in chatbot_service/ (TF-IDF model trained on course content).
 */
class AssistantService
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $chatbotUrl = 'http://localhost:8001',
    ) {}

    public function respond(string $message): string
    {
        if (trim($message) === '') {
            return "Bonjour ! Je suis l'assistant Dinari. Posez-moi une question sur nos cours fintech.";
        }

        try {
            $response = $this->httpClient->request('POST', $this->chatbotUrl . '/chat', [
                'json'    => ['message' => $message],
                'timeout' => 8,
            ]);

            if ($response->getStatusCode() !== 200) {
                return $this->fallback();
            }

            $data = $response->toArray();
            return $data['reply'] ?? $this->fallback();

        } catch (TransportExceptionInterface $e) {
            return "Le service de chatbot est temporairement indisponible. Veuillez réessayer dans un instant.";
        } catch (\Throwable $e) {
            return $this->fallback();
        }
    }

    private function fallback(): string
    {
        return "Je ne suis pas sûr de comprendre. Essayez : \"Quels cours sont disponibles ?\", \"C'est quoi un budget ?\", \"Explique-moi l'épargne\".";
    }
}
