<?php

namespace App\Controller\Client;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

#[Route('/abonnement/recommandation', name: 'app_recommendation_')]
class RecommendationController extends AbstractController
{
    private const FLASK_API_URL = 'http://localhost:5001';

    public function __construct(
        private HttpClientInterface $httpClient,
        private LoggerInterface $logger
    ) {}

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $prefill = [];
        $params = ['budget', 'category', 'frequency', 'profile'];
        
        foreach ($params as $param) {
            if ($request->query->has($param)) {
                $prefill[$param] = (int) $request->query->get($param);
            }
        }
        
        return $this->render('recommendation/index.html.twig', [
            'prefill' => $prefill
        ]);
    }

    #[Route('/get', name: 'get', methods: ['POST'])]
    public function getRecommendation(Request $request): JsonResponse
    {
        try {
            $data = json_decode((string) $request->getContent(), true);
            
            $errors = $this->validateInput($data);
            if (!empty($errors)) {
                return $this->json(['status' => 'error', 'errors' => $errors], 400);
            }
            
            $budget = (int) $data['budget'];
            
            $payload = [
                'budget'    => $budget,
                'category'  => (int) $data['category'],
                'frequency' => (int) $data['frequency'],
                'profile'   => (int) $data['profile'],
            ];
            
            // Appel à l'API Flask
            $response = $this->httpClient->request('POST', self::FLASK_API_URL . '/recommend', [
                'json'    => $payload,
                'timeout' => 10,
            ]);
            
            $result = $response->toArray();
            
            // Filtrer par budget
            if (isset($result['recommendations']) && is_array($result['recommendations'])) {
                $budgetMax = $this->getBudgetMax($budget);
                
                $filteredRecommendations = array_filter($result['recommendations'], function($rec) use ($budgetMax) {
                    $price = is_array($rec) ? ($rec['price'] ?? PHP_FLOAT_MAX) : PHP_FLOAT_MAX;
                    return $price <= $budgetMax;
                });
                
                if (!empty($filteredRecommendations)) {
                    $filteredRecommendations = array_values($filteredRecommendations);
                    $result['recommendations'] = $filteredRecommendations;
                    $result['best'] = $filteredRecommendations[0] ?? null;
                    $result['filtered_by_budget'] = true;
                } else {
                    $sortedByPrice = $result['recommendations'];
                    usort($sortedByPrice, function($a, $b) {
                        $priceA = is_array($a) ? ($a['price'] ?? PHP_FLOAT_MAX) : PHP_FLOAT_MAX;
                        $priceB = is_array($b) ? ($b['price'] ?? PHP_FLOAT_MAX) : PHP_FLOAT_MAX;
                        return $priceA - $priceB;
                    });
                    $result['recommendations'] = array_slice($sortedByPrice, 0, 3);
                    $result['best'] = $result['recommendations'][0] ?? null;
                    $result['budget_warning'] = "Aucun abonnement trouvé dans votre budget. Voici les moins chers :";
                }
            }
            
            // Enrichir la réponse avec les labels lisibles
            $result['labels'] = $this->buildLabels($payload);
            $result['budget_info'] = $this->getBudgetInfo($budget);
            
            $this->logger->info('Recommendation générée', [
                'input'  => $payload,
                'result' => is_array($result['best']) ? ($result['best']['plan'] ?? 'unknown') : 'unknown',
                'budget_max' => $this->getBudgetMax($budget)
            ]);
            
            return $this->json($result);
            
        } catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
            $this->logger->error('Flask API inaccessible', ['error' => $e->getMessage()]);
            return $this->json([
                'status' => 'error',
                'message' => 'Le service de recommandation est temporairement indisponible. Vérifiez que l\'API Flask est lancée sur le port 5001.',
            ], 503);
        } catch (\Exception $e) {
            $this->logger->error('Erreur recommandation', ['error' => $e->getMessage()]);
            return $this->json([
                'status' => 'error',
                'message' => 'Une erreur inattendue est survenue: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    private function getBudgetMax(int $budgetCode): float
    {
        return match($budgetCode) {
            1 => 9.99,
            2 => 29.99,
            3 => 69.99,
            4 => PHP_FLOAT_MAX,
            default => PHP_FLOAT_MAX,
        };
    }
    
    /**
     * @return array{code: int, label: string, max_price: string}
     */
    private function getBudgetInfo(int $budgetCode): array
    {
        $budgetMax = $this->getBudgetMax($budgetCode);
        $labels = $this->buildLabels(['budget' => $budgetCode]);
        
        return [
            'code' => $budgetCode,
            'label' => $labels['budget'],
            'max_price' => $budgetMax === PHP_FLOAT_MAX ? 'Illimité' : $budgetMax . ' DT'
        ];
    }
    
    /**
     * @param array<string, int|string>|null $data
     * @return array<int, string>
     */
    private function validateInput(?array $data): array
    {
        $errors = [];
        if (empty($data)) {
            return ['Données invalides.'];
        }
        
        $rules = [
            'budget'    => [1, 4],
            'category'  => [1, 4],
            'frequency' => [1, 3],
            'profile'   => [1, 3],
        ];
        
        foreach ($rules as $field => [$min, $max]) {
            if (!isset($data[$field])) {
                $errors[] = "Le champ '$field' est requis.";
                continue;
            }
            $val = (int) $data[$field];
            if ($val < $min || $val > $max) {
                $errors[] = "Le champ '$field' doit être entre $min et $max.";
            }
        }
        
        return $errors;
    }
    
    /**
     * @param array<string, int> $input
     * @return array<string, string>
     */
    private function buildLabels(array $input): array
    {
        return [
            'budget' => match($input['budget'] ?? 1) {
                1 => 'Budget : Moins de 10 DT',
                2 => 'Budget : 10 – 30 DT',
                3 => 'Budget : 30 – 70 DT',
                4 => 'Budget : Plus de 70 DT',
                default => 'Budget : Non spécifié'
            },
            'category' => match($input['category'] ?? 2) {
                1 => 'Musique & streaming',
                2 => 'Vidéo & films',
                3 => 'Outils pro & SaaS',
                4 => 'Gaming & loisirs',
                default => 'Non spécifié'
            },
            'frequency' => match($input['frequency'] ?? 2) {
                1 => 'Occasionnel',
                2 => 'Régulier',
                3 => 'Quotidien',
                default => 'Non spécifié'
            },
            'profile' => match($input['profile'] ?? 1) {
                1 => 'Particulier',
                2 => 'Famille',
                3 => 'Professionnel',
                default => 'Non spécifié'
            },
        ];
    }
}