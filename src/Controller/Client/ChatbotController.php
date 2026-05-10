<?php

namespace App\Controller\Client;

use App\Service\ChatbotService;
use App\Service\LocalAudioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ChatbotController extends AbstractController
{
    #[Route('/chatbot/message', name: 'chatbot_message', methods: ['POST'])]
    public function message(
        Request $request,
        ChatbotService $chatbot,
        SessionInterface $session
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);
        $userMessage = trim($data['message'] ?? '');

        if (empty($userMessage)) {
            return $this->json(['error' => 'Message vide'], 400);
        }

        $history = $session->get('chat_history', []);
        $response = $chatbot->chat($userMessage, $history);

        $history[] = ['role' => 'user', 'content' => $userMessage];
        $history[] = ['role' => 'assistant', 'content' => $response];

        if (count($history) > 20) {
            $history = array_slice($history, -20);
        }

        $session->set('chat_history', $history);

        return $this->json(['response' => $response]);
    }

    #[Route('/chatbot/reset', name: 'chatbot_reset', methods: ['POST'])]
    public function reset(SessionInterface $session): JsonResponse
    {
        $session->remove('chat_history');
        return $this->json(['ok' => true]);
    }

    #[Route('/chatbot/voice-local', name: 'chatbot_voice_local', methods: ['POST'])]
    public function voiceLocal(
        Request $request,
        ChatbotService $chatbot,
        LocalAudioService $audio,
        SessionInterface $session
    ): JsonResponse {
        $uploadedFile = $request->files->get('audio');
        
        if (!$uploadedFile) {
            return $this->json(['error' => 'Aucun fichier audio'], 400);
        }
        
        $tempPath = sys_get_temp_dir() . '/' . uniqid() . '.wav';
        $uploadedFile->move(sys_get_temp_dir(), basename($tempPath));
        
        try {
            // 1. Transcription (Speech to Text) via Whisper local
            $userMessage = $audio->transcribe($tempPath);
            
            // Nettoyer le message transcrit
            $userMessage = $this->cleanText($userMessage);
            
            // 2. Réponse du chatbot (votre modèle Ollama)
            $history = $session->get('chat_history', []);
            $response = $chatbot->chat($userMessage, $history);
            
            // Nettoyer la réponse
            $response = $this->cleanText($response);
            
            // 3. Sauvegarder l'historique
            $history[] = ['role' => 'user', 'content' => $userMessage];
            $history[] = ['role' => 'assistant', 'content' => $response];
            
            // Limiter l'historique à 20 messages
            if (count($history) > 20) {
                $history = array_slice($history, -20);
            }
            $session->set('chat_history', $history);
            
            // 4. Synthèse vocale (Text to Speech) via Piper TTS
            $audioPath = sys_get_temp_dir() . '/' . uniqid() . '_response.wav';
            $audio->textToSpeech($response, $audioPath);
            
            // 5. Encoder l'audio en base64 pour le client
            $audioContent = file_get_contents($audioPath);
            if ($audioContent === false) {
                throw new \Exception('Impossible de lire le fichier audio généré');
            }
            $audioBase64 = base64_encode($audioContent);
            
            // 6. Nettoyer les fichiers temporaires
            if (file_exists($tempPath)) {
                unlink($tempPath);
            }
            if (file_exists($audioPath)) {
                unlink($audioPath);
            }
            
            return $this->json([
                'success' => true,
                'transcribed_text' => $userMessage,
                'response_text' => $response,
                'response_audio' => $audioBase64
            ]);
            
        } catch (\Exception $e) {
            // Nettoyer les fichiers temporaires en cas d'erreur
            if (file_exists($tempPath)) {
                unlink($tempPath);
            }
            
            return $this->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    #[Route('/chatbot/test', name: 'chatbot_test', methods: ['GET'])]
    public function test(ChatbotService $chatbot): JsonResponse
    {
        $response = $chatbot->chat("Bonjour, c'est quoi Dinari ?", []);
        
        return $this->json([
            'response' => $response,
            'length' => strlen($response),
            'is_utf8' => mb_check_encoding($response, 'UTF-8')
        ]);
    }

    /**
     * Nettoie le texte pour garantir un encodage UTF-8 valide
     */
    private function cleanText(string $text): string
{
    $clean = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

    $clean = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F\x80-\x9F]/u', '', $clean) ?? $clean;

    $clean = preg_replace('/[\p{Cc}]+/u', '', $clean) ?? $clean;

    $clean = str_replace("\0", '', $clean);

    return trim($clean);
}
}