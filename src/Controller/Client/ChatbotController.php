<?php

namespace App\Controller\Client;

use App\Service\ChatbotService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/chatbot', name: 'app_chatbot_')]
class ChatbotController extends AbstractController
{
    #[Route('/message', name: 'message', methods: ['POST'])]
    public function message(Request $request, ChatbotService $chatbot): JsonResponse
    {
        $data    = json_decode($request->getContent(), true);
        $message = trim($data['message'] ?? '');

        if (mb_strlen($message) > 500) {
            return $this->json(['reply' => 'Votre message est trop long. Veuillez le raccourcir.']);
        }

        $reply = $chatbot->respond($message);

        return $this->json(['reply' => $reply]);
    }
}
