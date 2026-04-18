<?php

namespace App\Service;

use App\Entity\Conversations;
use App\Entity\Messages;
use App\Entity\Reclamation;
use App\Repository\ConversationsRepository;
use App\Repository\MessagesRepository;
use App\Repository\UserRepository;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * Service métier du chatbot.
 * Orchestre la mémoire conversationnelle, l'appel à Groq,
 * la création de réclamation et la persistance des messages.
 */
class ChatbotService
{
    public function __construct(
        private readonly EntityManagerInterface  $em,
        private readonly GroqService             $groqService,
        private readonly ConversationsRepository $conversationsRepo,
        private readonly MessagesRepository      $messagesRepo,
        private readonly UserRepository          $userRepository,
        private readonly ReclamationRepository   $reclamationRepository,
        private readonly LoggerInterface         $logger
    ) {}

    /**
     * Point d'entrée principal du chatbot.
     * Traite un message utilisateur et retourne une réponse structurée.
     *
     * @param string $userEmail   Email de l'utilisateur connecté
     * @param string $userMessage Texte saisi par l'utilisateur
     * @return array{
     *   success: bool,
     *   botMessage: string,
     *   reclamation: array{type: string, description: string, priorite: string}|null,
     *   error: string|null
     * }
     */
    public function processMessage(string $userEmail, string $userMessage): array
    {
        try {
            // ── 1. Récupérer ou créer une conversation pour cet utilisateur ─────────
            $conversation = $this->getOrCreateConversation($userEmail);

            // ── 2. Persister le message utilisateur en base ───────────────────────
            $userMsg = $this->saveMessage($conversation, 'user', $userMessage);

            // ── 3. Récupérer les 10 derniers messages pour la mémoire ─────────────
            $history = $this->buildHistory($conversation);

            // ── 4. Appeler l'API Groq avec l'historique ───────────────────────────
            $rawResponse = $this->groqService->sendMessages($history);
            $this->logger->info('[ChatbotService] Réponse Groq brute', ['raw' => $rawResponse]);

            // ── 5. Parser et valider le JSON retourné ────────────────────────────
            $parsed = $this->groqService->parseJsonResponse($rawResponse);

            // ── 6. Créer la réclamation en base ──────────────────────────────────
            $reclamation = $this->createReclamation($userEmail, $parsed);

            // ── 7. Construire le message de réponse du bot ───────────────────────
            $botText = $this->buildBotMessage($parsed);

            // ── 8. Persister la réponse du bot en base ────────────────────────────
            $this->saveMessage($conversation, 'bot', $botText);

            return [
                'success'     => true,
                'botMessage'  => $botText,
                'reclamation' => $parsed,
                'error'       => null,
            ];

        } catch (\RuntimeException $e) {
            $this->logger->error('[ChatbotService] Erreur traitement', [
                'message'   => $e->getMessage(),
                'userEmail' => $userEmail,
            ]);

            // Retourner un message d'erreur amical à l'utilisateur
            return [
                'success'     => false,
                'botMessage'  => "⚠️ Je n'ai pas pu analyser votre message. Veuillez réessayer ou reformuler votre réclamation.",
                'reclamation' => null,
                'error'       => $e->getMessage(),
            ];

        } catch (\Throwable $e) {
            $this->logger->critical('[ChatbotService] Erreur inattendue', [
                'exception' => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
            ]);

            return [
                'success'     => false,
                'botMessage'  => "❌ Une erreur interne s'est produite. L'équipe technique a été notifiée.",
                'reclamation' => null,
                'error'       => 'Erreur interne du serveur.',
            ];
        }
    }

    /**
     * Recherche les réclamations d'un utilisateur par son email.
     * Utilisé pour la commande de recherche admin.
     *
     * @param string $email L'email à rechercher
     * @return array Résultat formaté avec statut success/error et données
     */
    public function getReclamationsByEmail(string $email): array
    {
        try {
            // 1. Vérifier si l'utilisateur existe
            $user = $this->userRepository->findOneByEmail($email);
            
            if (!$user) {
                return [
                    'status' => 'error',
                    'message' => 'Utilisateur introuvable.'
                ];
            }

            // 2. Récupérer les réclamations
            $reclamations = $this->reclamationRepository->findByUser($email);

            if (empty($reclamations)) {
                return [
                    'status' => 'success',
                    'message' => 'Aucune réclamation trouvée pour cet utilisateur.',
                    'data' => []
                ];
            }

            // 3. Formater les données
            $data = [];
            foreach ($reclamations as $rec) {
                
                // Extraire le type et la priorité de la description ou du sujet (on fait au mieux avec les champs dispos)
                $subject = $rec->getSubject();
                $type = 'Technique'; // Default
                $priorite = 'Moyenne'; // Default
                
                if (preg_match('/\[(.*?)\]\s?(.*)/', $subject, $matches)) {
                    $type = $matches[1];
                }

                $desc = $rec->getDescription();
                if (preg_match('/\[Priorité\s*:\s*(.*?)\]\s?(.*)/i', $desc, $matches)) {
                    $priorite = trim($matches[1]);
                    $desc = trim($matches[2]);
                }

                $data[] = [
                    'id' => $rec->getId_reclamation(),
                    'type' => $type,
                    'description' => mb_strlen($desc) > 80 ? mb_substr($desc, 0, 80) . '...' : $desc,
                    'priorite' => $priorite,
                    'statut' => $rec->getStatut(),
                    'date' => method_exists($rec, 'getCreatedAt') && $rec->getCreatedAt() ? $rec->getCreatedAt()->format('Y-m-d H:i') : null
                ];
            }

            return [
                'status' => 'success',
                'message' => count($data) . ' réclamation(s) trouvée(s).',
                'data' => $data
            ];

        } catch (\Throwable $e) {
            $this->logger->error('[ChatbotService] Erreur lors de la recherche des réclamations', [
                'email' => $email,
                'exception' => $e->getMessage()
            ]);

            return [
                'status' => 'error',
                'message' => 'Erreur lors de la recherche.'
            ];
        }
    }

    /**
     * Recherche toutes les réclamations d'un certain type.
     */
    public function getReclamationsByType(string $type): array
    {
        try {
            $reclamations = $this->reclamationRepository->findByType($type);

            if (empty($reclamations)) {
                return [
                    'status' => 'error',
                    'message' => 'Aucune réclamation trouvée pour le type : ' . ucfirst($type)
                ];
            }

            $data = [];
            foreach ($reclamations as $rec) {
                $subject = $rec->getSubject();
                $priorite = 'Moyenne';
                $desc = $rec->getDescription();
                
                if (preg_match('/\[Priorité\s*:\s*(.*?)\]\s?(.*)/i', $desc, $matches)) {
                    $priorite = trim($matches[1]);
                    $desc = trim($matches[2]);
                }

                $data[] = [
                    'id' => $rec->getId_reclamation(),
                    'type' => $subject,
                    'description' => mb_strlen($desc) > 80 ? mb_substr($desc, 0, 80) . '...' : $desc,
                    'priorite' => $priorite,
                    'statut' => $rec->getStatut(),
                    'date' => method_exists($rec, 'getCreatedAt') && $rec->getCreatedAt() ? $rec->getCreatedAt()->format('Y-m-d H:i') : null
                ];
            }

            return [
                'status' => 'success',
                'message' => count($data) . ' réclamation(s) en attente trouvée(s) pour le mot-clé : "' . $type . '".',
                'data' => $data
            ];

        } catch (\Throwable $e) {
            $this->logger->error('[ChatbotService] Erreur lors de la recherche par type', [
                'type' => $type,
                'exception' => $e->getMessage()
            ]);

            return [
                'status' => 'error',
                'message' => 'Erreur technique lors de la récupération des réclamations.'
            ];
        }
    }

    /**
     * Met à jour en masse les réclamations d'un certain type.
     */
    public function envoyerReponseGlobale(string $type, string $reponse): array
    {
        try {
            $affectedRows = $this->reclamationRepository->updateReclamationsByType($type, $reponse);

            if ($affectedRows > 0) {
                return [
                    'status' => 'success',
                    'message' => '✅ Réponse envoyée avec succès et statut mis à jour ("Traitée") pour ' . $affectedRows . ' réclamation(s).'
                ];
            }

            return [
                'status' => 'error',
                'message' => 'Aucune réclamation n\'a été modifiée.'
            ];

        } catch (\Throwable $e) {
            $this->logger->error('[ChatbotService] Erreur lors de la mise à jour en masse', [
                'type' => $type,
                'exception' => $e->getMessage()
            ]);

            return [
                'status' => 'error',
                'message' => 'Erreur technique lors de la mise à jour.'
            ];
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Méthodes privées
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Retourne la dernière conversation de l'utilisateur ou en crée une nouvelle.
     */
    private function getOrCreateConversation(string $userEmail): Conversations
    {
        $conversation = $this->conversationsRepo->findLastByUserEmail($userEmail);

        if (!$conversation) {
            $conversation = new Conversations();
            $conversation->setUser_email($userEmail);
            // date_creation est initialisée dans le constructeur

            $this->em->persist($conversation);
            $this->em->flush();

            $this->logger->info('[ChatbotService] Nouvelle conversation créée', [
                'userEmail' => $userEmail,
                'id'        => $conversation->getId(),
            ]);
        }

        return $conversation;
    }

    /**
     * Persiste un message (user ou bot) dans la base de données.
     */
    private function saveMessage(Conversations $conversation, string $sender, string $content): Messages
    {
        $message = new Messages();
        $message->setConversation_id($conversation);
        $message->setSender($sender);
        $message->setContent($content);
        $message->setDate_message(new \DateTime());

        $this->em->persist($message);
        $this->em->flush();

        return $message;
    }

    /**
     * Récupère les 10 derniers messages de la conversation et les formate
     * pour l'API Groq (format OpenAI : role + content).
     *
     * @return array<int, array{role: string, content: string}>
     */
    private function buildHistory(Conversations $conversation): array
    {
        // Récupérer les 10 derniers messages (ordre DESC depuis la BDD)
        $messages = $this->messagesRepo->findLastByConversation($conversation, 10);

        // Inverser pour avoir l'ordre chronologique (du plus ancien au plus récent)
        $messages = array_reverse($messages);

        // Convertir en format API Groq
        $history = [];
        foreach ($messages as $msg) {
            // 'user' reste 'user', 'bot' devient 'assistant' pour l'API
            $role = ($msg->getSender() === 'bot') ? 'assistant' : 'user';
            $history[] = [
                'role'    => $role,
                'content' => $msg->getContent(),
            ];
        }

        return $history;
    }

    /**
     * Crée et persiste une Reclamation à partir des données extraites par l'IA.
     * Adapté au schéma existant : email, subject (= type), description, statut.
     */
    private function createReclamation(string $userEmail, array $parsed): Reclamation
    {
        $reclamation = new Reclamation();
        $reclamation->setEmail($userEmail);

        // Le "type" de l'IA correspond au "subject" de l'entité existante
        $reclamation->setSubject('[' . $parsed['type'] . '] ' . $parsed['priorite']);

        // La description inclut la priorité et le texte analysé
        $reclamation->setDescription(
            sprintf('[Priorité : %s] %s', $parsed['priorite'], $parsed['description'])
        );

        $reclamation->setStatut('En attente');

        $this->em->persist($reclamation);
        $this->em->flush();

        $this->logger->info('[ChatbotService] Réclamation créée', [
            'id'      => $reclamation->getId_reclamation(),
            'type'    => $parsed['type'],
            'priorite'=> $parsed['priorite'],
        ]);

        return $reclamation;
    }

    /**
     * Construit le message de réponse affiché à l'utilisateur dans le chat.
     */
    private function buildBotMessage(array $parsed): string
    {
        $icons = [
            'Paiement'  => '💳',
            'Technique' => '🔧',
            'Compte'    => '👤',
        ];

        $priorityColors = [
            'Élevée' => '🔴',
            'Moyenne' => '🟡',
            'Faible'  => '🟢',
        ];

        $icon     = $icons[$parsed['type']]               ?? '📋';
        $priority = $priorityColors[$parsed['priorite']]  ?? '⚪';

        return sprintf(
            "✅ Votre réclamation a été analysée et enregistrée avec succès.\n\n" .
            "%s **Type** : %s\n" .
            "%s **Priorité** : %s\n" .
            "📝 **Résumé** : %s\n\n" .
            "Notre équipe support prendra en charge votre demande dans les plus brefs délais.",
            $icon, $parsed['type'],
            $priority, $parsed['priorite'],
            $parsed['description']
        );
    }
}
