<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;

class ChatbotService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private EntityManagerInterface $em
    ) {}

    /**
     * Récupère les abonnements depuis la BDD et construit un contexte
     */
    private function getAbonnementsContext(): string
    {
        $abonnements = $this->em->createQuery('
            SELECT a.nom, a.prix, a.description, a.categorie 
            FROM App\Entity\Abonnement a 
            WHERE a.actif = 1
        ')->getResult();
        
        if (empty($abonnements)) {
            return "Aucun abonnement trouvé en base de données.";
        }
        
        $context = "Voici les abonnements disponibles sur Dinari (à jour depuis la base de données) :\n";
        foreach ($abonnements as $abo) {
            $context .= "- {$abo['nom']} : {$abo['prix']} DT/mois - {$abo['description']}\n";
        }
        
        return $context;
    }

    /**
     * Chat avec l'assistant IA
     * 
     * @param array<int, array{role: string, content: string}> $history
     * @return string
     */
    public function chat(string $userMessage, array $history = []): string
    {
        // Récupérer les abonnements depuis la BDD
        $abonnementsContext = $this->getAbonnementsContext();
        
        // Message système complet avec contexte BDD
        $systemMessage = [
            'role' => 'system',
            'content' => "Tu es DinariBot, un assistant pour Dinari Tunisie.

INFORMATIONS À JOUR (de la base de données) :
$abonnementsContext

RÈGLES IMPORTANTES :
1. Utilise ces prix pour répondre aux questions sur les abonnements.
2. Tu dois te souvenir des prénoms des utilisateurs.
3. Ne confonds jamais Asma (prénom) avec asthme.
4. Pour résilier: va dans Mes abonnements.
5. Réponds toujours en français, de façon précise et utile.
6. Si un prix est demandé, donne le prix exact de la base de données."
        ];
        
        /** @var array<int, array{role: string, content: string}> $messages */
        $messages = [$systemMessage];
        
        // Ajouter l'historique (max 15 messages)
        $recentHistory = array_slice($history, -15);
        foreach ($recentHistory as $msg) {
            // On sait que les clés existent grâce au typage PHPDoc
            $messages[] = [
                'role' => $msg['role'],
                'content' => $msg['content']
            ];
        }
        
        // Ajouter le nouveau message
        $messages[] = ['role' => 'user', 'content' => $userMessage];
        
        try {
            $response = $this->httpClient->request('POST', 'http://localhost:11434/api/chat', [
                'json' => [
                    'model'   => 'dinari-bot-v3',
                    'messages' => $messages,
                    'stream'  => false,
                    'options' => [
                        'temperature' => 0.5,
                        'num_predict' => 300,
                    ]
                ],
                'timeout' => 60,
            ]);
            
            $data = $response->toArray();
            $rawResponse = (string) ($data['message']['content'] ?? 'Désolé, je ne peux pas répondre maintenant.');
            
            // Nettoyer l'encodage UTF-8
            $cleanResponse = mb_convert_encoding($rawResponse, 'UTF-8', 'UTF-8');
            
            // Remplacer les caractères problématiques
            $cleanResponse = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', (string) $cleanResponse) ?? '';
            $cleanResponse = preg_replace('/[\p{Cc}]+/u', '', (string) $cleanResponse) ?? '';
            
            return trim($cleanResponse);
            
        } catch (\Exception $e) {
            error_log("Chatbot error: " . $e->getMessage());
            return 'Désolé, une erreur technique est survenue. Veuillez réessayer.';
        }
    }
}