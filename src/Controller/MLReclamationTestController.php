<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MLReclamationTestController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/ml-predict-interface', name: 'app_ml_predict_interface')]
    public function index(): Response
    {
        return $this->render('ml/prediction.html.twig');
    }

    #[Route('/test-ml-predict', name: 'app_test_ml_predict', methods: ['POST', 'GET'])]
    public function testPredict(Request $request): JsonResponse
    {
        // Try to read payload from JSON body, fallback to mock data
        $content = json_decode($request->getContent(), true);
        
        $payload = [
            'type' => $content['type'] ?? 'Technique',
            'agent_id' => $content['agent_id'] ?? 4,
            'priorite' => $content['priorite'] ?? 'high'
        ];

        try {
            $response = $this->client->request('POST', 'http://127.0.0.1:5000/predict', [
                'json' => $payload
            ]);

            $statusCode = $response->getStatusCode();
            
            if ($statusCode === 200) {
                $content = $response->toArray();
                return new JsonResponse([
                    'success' => true,
                    'message' => 'ML Prediction successful',
                    'input' => $payload,
                    'estimated_resolution_time_hours' => $content['estimated_resolution_time']
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
                'error' => 'Server error or Flask API is not reachable. Ensure the python app.py is running.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
