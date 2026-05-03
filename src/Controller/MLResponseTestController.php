<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MLResponseTestController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/nlp-assistant', name: 'app_nlp_assistant')]
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('ml/nlp_response.html.twig');
    }

    #[Route('/test-ml-response', name: 'app_test_ml_response', methods: ['GET', 'POST'])]
    public function testAutoResponse(Request $request): JsonResponse
    {
        // Accept dynamic JSON payload or fallback to mocked data
        $content = json_decode($request->getContent(), true);

        $payload = [
            'title' => $content['title'] ?? 'Erreur lors du checkout',
            'description' => $content['description'] ?? 'Bonjour, je ne parviens pas à finaliser ma transaction, ma carte est refusée sans aucune raison affichée. Merci de m\'aider.'
        ];

        try {
            // Forwarding the request to the Python Flask ML Service
            $response = $this->client->request('POST', 'http://127.0.0.1:5000/generate-response', [
                'json' => $payload
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $data = $response->toArray();
                return new JsonResponse([
                    'success' => true,
                    'input' => $payload,
                    'category' => $data['category'],
                    'confidence_score' => $data['confidence'],
                    'suggested_reply' => $data['suggested_response']
                ]);
            }

            return new JsonResponse([
                'success' => false,
                'error' => 'API returned status code ' . $statusCode,
                'content' => $response->getContent(false)
            ], $statusCode);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Could not connect to the ML service. Make sure app.py is running on port 5000.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
