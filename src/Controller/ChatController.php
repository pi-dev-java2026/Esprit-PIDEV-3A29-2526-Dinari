<?php

namespace App\Controller;

use App\Service\ChatbotService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Contrôleur du module chatbot.
 * Expose deux routes :
 *   GET  /chat          → affichage de l'interface
 *   POST /chat/send     → traitement AJAX d'un message utilisateur
 */
#[Route('/chat', name: 'app_chat')]
class ChatController extends AbstractController
{
    public function __construct(
        private readonly ChatbotService  $chatbotService,
        private readonly LoggerInterface $logger
    ) {}

    /**
     * Affiche la page du chatbot.
     */
    #[Route('', name: '_index', methods: ['GET'])]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function index(): Response
    {
        return $this->render('chat/index.html.twig');
    }

    /**
     * Endpoint AJAX : reçoit un message utilisateur, le traite via le ChatbotService
     * et retourne la réponse JSON au frontend.
     *
     * Entrée  (JSON body) : { "message": "..." }
     * Sortie  (JSON)      : { "success": bool, "botMessage": "...", "reclamation": {...}|null }
     */
    #[Route('/send', name: '_send', methods: ['POST'])]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function send(Request $request): JsonResponse
    {
        // ── Décoder le corps JSON de la requête ─────────────────────────────
        $data = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->json([
                'success'    => false,
                'botMessage' => 'Format de requête invalide.',
                'error'      => 'Corps JSON malformé.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $userMessage = trim($data['message'] ?? '');

        // ── Validation du message ────────────────────────────────────────────
        if (empty($userMessage)) {
            return $this->json([
                'success'    => false,
                'botMessage' => 'Veuillez saisir un message.',
                'error'      => 'Message vide.',
            ], Response::HTTP_BAD_REQUEST);
        }

        if (mb_strlen($userMessage) > 2000) {
            return $this->json([
                'success'    => false,
                'botMessage' => 'Message trop long (maximum 2000 caractères).',
                'error'      => 'Dépassement de longueur.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // ── Récupérer l'email de l'utilisateur connecté ─────────────────────
        /** @var \App\Entity\User $user */
        $user      = $this->getUser();
        $userEmail = $user->getEmail();

        $this->logger->info('[ChatController] Message reçu', [
            'userEmail' => $userEmail,
            'length'    => mb_strlen($userMessage),
        ]);

        // ── Vérifier si c'est un email (Fonctionnalité Admin) ─────────────────
        if (filter_var($userMessage, FILTER_VALIDATE_EMAIL)) {
            if (!$this->isGranted('ROLE_ADMIN')) {
                return $this->json([
                    'success'    => false,
                    'botMessage' => 'Accès refusé. Vous n\'avez pas les droits d\'administration.',
                    'error'      => 'Access Denied',
                ], Response::HTTP_FORBIDDEN);
            }

            // Utilisateur est Admin et le message est un email
            $this->logger->info('[ChatController] Demande de réclamations par email (Admin)', ['email' => $userMessage]);
            $reclamationsData = $this->chatbotService->getReclamationsByEmail($userMessage);

            // Retour format JSON demandé (success bool pour compatibilité js + data array)
            return $this->json([
                'success' => $reclamationsData['status'] === 'success',
                'botMessage' => $reclamationsData['message'],
                'data' => $reclamationsData['data'] ?? [], // Array of reclamations if any
            ], Response::HTTP_OK);
        }

        // ── Fonctionnalité Admin : Réponse globale par Type ──────────────────
        if ($this->isGranted('ROLE_ADMIN')) {
            $session = $request->getSession();
            $waitingType = $session->get('admin_bulk_reply_type');

            if ($waitingType) {
                // MODE 2 : L'admin est en train d'écrire la réponse globale
                if (strtolower($userMessage) === 'annuler') {
                    $session->remove('admin_bulk_reply_type');
                    return $this->json([
                        'success' => true,
                        'botMessage' => '❌ Opération annulée. Vous pouvez reprendre une utilisation normale.'
                    ], Response::HTTP_OK);
                }

                $this->logger->info('[ChatController] Admin envoi réponse globale', ['type' => $waitingType, 'reponse' => $userMessage]);
                $reclamationsData = $this->chatbotService->envoyerReponseGlobale($waitingType, $userMessage);

                // On nettoie la session
                $session->remove('admin_bulk_reply_type');

                return $this->json([
                    'success' => $reclamationsData['status'] === 'success',
                    'botMessage' => $reclamationsData['message'],
                    'data' => []
                ], Response::HTTP_OK);
            }

            // MODE 1 : L'admin recherche par sujet/type (si le texte n'était pas un email/annulation)
            $inputLower = trim($userMessage);
            $this->logger->info('[ChatController] Demande de réclamations par sujet/type (Admin)', ['sujet' => $inputLower]);
            
            $reclamationsData = $this->chatbotService->getReclamationsByType($inputLower);

            if ($reclamationsData['status'] === 'success') {
                // On active le mode attente de réponse globale
                $session->set('admin_bulk_reply_type', $inputLower);
                
                return $this->json([
                    'success' => true,
                    'botMessage' => $reclamationsData['message'] . "\n\n⚠️ **Veuillez saisir maintenant la réponse globale** qui sera envoyée à toutes ces réclamations (ou tapez *Annuler*).",
                    'data' => $reclamationsData['data'] ?? []
                ], Response::HTTP_OK);
            } else {
                return $this->json([
                    'success' => false,
                    'botMessage' => $reclamationsData['message'] . "\n\n⚠️ En tant qu'administrateur, vous ne pouvez pas créer de réclamations. Pour interagir, veuillez saisir une **adresse email** ou un **type/sujet** valide.",
                ], Response::HTTP_OK);
            }
        }

        // ── Déléguer au service métier (chatbot IA classique) ────────────────
        $result = $this->chatbotService->processMessage($userEmail, $userMessage);

        // ── Retourner la réponse JSON ─────────────────────────────────────────
        $statusCode = $result['success']
            ? Response::HTTP_OK
            : Response::HTTP_INTERNAL_SERVER_ERROR;

        return $this->json($result, $statusCode);
    }
}
