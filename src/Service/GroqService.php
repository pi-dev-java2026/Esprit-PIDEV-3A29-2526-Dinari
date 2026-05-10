<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Service responsable de la communication avec l'API Groq (LLM).
 * Envoie l'historique de conversation et retourne la réponse JSON structurée.
 */
class GroqService
{
    // Modèle Groq actuel (llama3-70b-8192 est désactivé → remplacé par llama-3.3-70b-versatile)
    private const MODEL = 'llama-3.3-70b-versatile';

    // Prompt système : force l'IA à retourner uniquement du JSON valide
    private const SYSTEM_PROMPT = <<<EOT
Tu es un assistant intelligent de classification de réclamations pour la plateforme DINARI (gestion financière).

Ton rôle est d'analyser le message de l'utilisateur et de retourner STRICTEMENT et UNIQUEMENT un objet JSON valide, sans aucun texte avant ou après.

Le JSON doit avoir exactement cette structure :
{
  "type": "Paiement | Technique | Compte",
  "description": "résumé court de la réclamation en français (max 200 caractères)",
  "priorite": "Faible | Moyenne | Élevée"
}

Règles de classification :
- type "Paiement" : problèmes de transaction, virement, frais, remboursement
- type "Technique" : bug, erreur application, problème d'accès, lenteur
- type "Compte" : mot de passe, profil, données personnelles, vérification
- priorite "Élevée" : urgent, bloquant, perte d'argent
- priorite "Moyenne" : gênant mais pas bloquant
- priorite "Faible" : question, amélioration, suggestion

IMPORTANT : Retourne UNIQUEMENT le JSON, rien d'autre. Pas d'explication, pas de markdown.
EOT;

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly LoggerInterface $logger,
        private readonly string $apiKey,
        private readonly string $apiUrl = 'https://api.groq.com/openai/v1/chat/completions'
    ) {}

    /**
     * Envoie l'historique de messages à l'API Groq et retourne la réponse brute.
     *
     * @param array $messages Tableau de messages formatés [['role' => 'user|assistant', 'content' => '...']]
     * @return string La réponse textuelle du modèle
     * @throws \RuntimeException En cas d'échec de la requête API
     */
    public function sendMessages(array $messages): string
    {
        // Préparer le payload avec le prompt système en premier
        $payload = [
            'model'       => self::MODEL,
            'messages'    => array_merge(
                [['role' => 'system', 'content' => self::SYSTEM_PROMPT]],
                $messages
            ),
            'temperature' => 0.2,  // Basse température pour des réponses cohérentes et structurées
            'max_tokens'  => 512,
        ];

        try {
            $response = $this->httpClient->request('POST', $this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json'    => $payload,
                'timeout' => 30,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                $body = $response->getContent(false);
                $this->logger->error('[GroqService] Erreur API HTTP', [
                    'status'   => $statusCode,
                    'response' => $body,
                ]);
                throw new \RuntimeException("L'API Groq a retourné le statut HTTP $statusCode.");
            }

            $data = $response->toArray();

            // Extraire le contenu de la réponse du modèle
            $content = $data['choices'][0]['message']['content'] ?? null;

            if (null === $content) {
                $this->logger->error('[GroqService] Réponse API malformée', ['data' => $data]);
                throw new \RuntimeException("La réponse de l'API Groq est malformée.");
            }

            return trim($content);

        } catch (TransportExceptionInterface $e) {
            $this->logger->error('[GroqService] Erreur réseau', ['exception' => $e->getMessage()]);
            throw new \RuntimeException("Impossible de contacter l'API Groq : " . $e->getMessage());
        }
    }

    /**
     * Parse la réponse JSON retournée par Groq.
     * Valide les champs obligatoires et les valeurs autorisées.
     *
     * @param string $jsonString La chaîne JSON brute
     * @return array{type: string, description: string, priorite: string}
     * @throws \RuntimeException Si le JSON est invalide ou incomplet
     */
    public function parseJsonResponse(string $jsonString): array
    {
        // Nettoyer les éventuels délimiteurs markdown (```json ... ```)
        $cleaned = preg_replace('/^```(?:json)?\s*/i', '', $jsonString);
        $cleaned = preg_replace('/\s*```$/', '', $cleaned);
        $cleaned = trim($cleaned);

        $data = json_decode($cleaned, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->logger->error('[GroqService] JSON invalide', [
                'raw'   => $jsonString,
                'error' => json_last_error_msg(),
            ]);
            throw new \RuntimeException('La réponse de l\'IA n\'est pas un JSON valide : ' . json_last_error_msg());
        }

        // Validation des champs obligatoires
        $validTypes     = ['Paiement', 'Technique', 'Compte'];
        $validPriorites = ['Faible', 'Moyenne', 'Élevée'];

        $type      = $data['type']        ?? null;
        $desc      = $data['description'] ?? null;
        $priorite  = $data['priorite']    ?? null;

        if (!in_array($type, $validTypes, true)) {
            $this->logger->warning('[GroqService] Type invalide, fallback à Technique', ['type' => $type]);
            $type = 'Technique';
        }

        if (empty($desc)) {
            throw new \RuntimeException('La description retournée par l\'IA est vide.');
        }

        if (!in_array($priorite, $validPriorites, true)) {
            $this->logger->warning('[GroqService] Priorité invalide, fallback à Moyenne', ['priorite' => $priorite]);
            $priorite = 'Moyenne';
        }

        return [
            'type'        => $type,
            'description' => $desc,
            'priorite'    => $priorite,
        ];
    }
}
