<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/admin/ml')]
class MlPredictionController extends AbstractController
{
    // URL du serveur Flask (à configurer dans .env)
    private string $mlApiUrl;

    public function __construct(
        private readonly HttpClientInterface $http,
    ) {
        $this->mlApiUrl = $_ENV['ML_API_URL'] ?? 'http://localhost:5000';
    }

    /**
     * Dashboard principal des prédictions ML
     */
    #[Route('', name: 'admin_ml_dashboard', methods: ['GET'])]
    public function dashboard(): Response
    {
        try {
            // Vérifie santé de l'API Flask
            $health = $this->callApi('/api/ml/health');
            $stats  = $this->callApi('/api/ml/stats');

            $modelReady = $health['model_ready'] ?? false;
            $predictions = [];

            if ($modelReady) {
                $resp = $this->callApi('/api/ml/predict');
                $predictions = $resp['predictions'] ?? [];
            }

            return $this->render('admin/ml/dashboard.html.twig', [
                'predictions'  => $predictions,
                'stats'        => $stats,
                'model_ready'  => $modelReady,
                'generated_at' => new \DateTime(),
            ]);

        } catch (\Exception $e) {
            $this->addFlash('error', 'API ML indisponible : ' . $e->getMessage());
            return $this->render('admin/ml/dashboard.html.twig', [
                'predictions'  => [],
                'stats'        => [],
                'model_ready'  => false,
                'api_error'    => $e->getMessage(),
                'generated_at' => new \DateTime(),
            ]);
        }
    }

    /**
     * Lance l'entraînement du modèle (appel AJAX)
     */
    #[Route('/train', name: 'admin_ml_train', methods: ['POST'])]
    public function train(): JsonResponse
    {
        try {
            $result = $this->callApi('/api/ml/train', 'POST');
            return $this->json([
                'success' => true,
                'message' => $result['message'] ?? 'Entraînement terminé',
                'r2'      => $result['r2'] ?? $result['r2_score'] ?? null,
                'mae'     => $result['mae'] ?? null,
                'n_features' => $result['n_features'] ?? null,
                'n_trees' => $result['n_trees'] ?? 100,
                'feature_importances' => $result['feature_importances'] ?? [],
                'promo_model_trained' => $result['promo_model_trained'] ?? false,
                'devise'  => $result['devise'] ?? 'DT',
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Endpoint AJAX pour rafraîchir les prédictions
     */
    #[Route('/predict/json', name: 'admin_ml_predict_json', methods: ['GET'])]
    public function predictJson(): JsonResponse
    {
        try {
            $result = $this->callApi('/api/ml/predict');
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Endpoint pour obtenir le top N des prédictions
     */
    #[Route('/top/{n}', name: 'admin_ml_top', methods: ['GET'], requirements: ['n' => '\d+'])]
    public function top(int $n = 8): JsonResponse
    {
        try {
            $result = $this->callApi('/api/ml/top?n=' . $n);
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Endpoint pour obtenir les abonnements sous-performants
     */
    #[Route('/underperforming', name: 'admin_ml_underperforming', methods: ['GET'])]
    public function underperforming(Request $request): JsonResponse
    {
        try {
            $seuil = $request->query->get('seuil', 65);
            $result = $this->callApi('/api/ml/underperforming?seuil=' . $seuil);
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Endpoint pour obtenir les sous-performants avec recommandations promo
     */
    #[Route('/underperforming-with-promo', name: 'admin_ml_underperforming_promo', methods: ['GET'])]
    public function underperformingWithPromo(Request $request): JsonResponse
    {
        try {
            $seuil = $request->query->get('seuil', 65);
            $result = $this->callApi('/api/ml/underperforming-with-promo?seuil=' . $seuil);
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Endpoint pour obtenir le timing des promotions
     */
    #[Route('/promo-timing', name: 'admin_ml_promo_timing', methods: ['GET'])]
    public function promoTiming(): JsonResponse
    {
        try {
            $result = $this->callApi('/api/ml/promo-timing');
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Endpoint pour obtenir le breakdown mensuel
     */
    #[Route('/monthly-breakdown', name: 'admin_ml_monthly_breakdown', methods: ['GET'])]
    public function monthlyBreakdown(): JsonResponse
    {
        try {
            $result = $this->callApi('/api/ml/monthly-breakdown');
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Simule l'impact d'une promotion sur un abonnement
     */
    #[Route('/simulate-promo', name: 'admin_ml_simulate_promo', methods: ['POST'])]
    public function simulatePromo(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            $abonnementId = $data['abonnement_id'] ?? null;
            $discount = $data['discount'] ?? 20;

            if (!$abonnementId) {
                return $this->json(['success' => false, 'error' => 'abonnement_id requis'], 400);
            }

            if ($discount < 0 || $discount > 70) {
                return $this->json(['success' => false, 'error' => 'Discount doit être entre 0 et 70%'], 400);
            }

            // Appel à l'API Flask pour la simulation
            $result = $this->callApi('/api/ml/simulate-promo', 'POST', [
                'abonnement_id' => $abonnementId,
                'discount' => $discount
            ]);
            
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Simule une promotion sur plusieurs abonnements sous-performants
     */
    #[Route('/simulate-promo-multiple', name: 'admin_ml_simulate_promo_multiple', methods: ['POST'])]
    public function simulatePromoMultiple(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            $discount = $data['discount'] ?? 20;

            if ($discount < 0 || $discount > 70) {
                return $this->json(['success' => false, 'error' => 'Discount doit être entre 0 et 70%'], 400);
            }

            $result = $this->callApi('/api/ml/simulate-promo-multiple', 'POST', [
                'discount' => $discount
            ]);
            
            return $this->json($result);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Reçoit le webhook Stripe
     */
    #[Route('/stripe-webhook', name: 'admin_ml_stripe_webhook', methods: ['POST'])]
    public function stripeWebhook(Request $request): JsonResponse
    {
        try {
            $payload = $request->getContent();
            $sigHeader = $request->headers->get('stripe-signature');
            
            // Traitement du webhook Stripe
            // À implémenter selon vos besoins
            
            return $this->json(['success' => true]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Appel générique vers l'API Flask
     * 
     * @param array<string, mixed> $body
     * @return array<string, mixed>
     */
    private function callApi(string $path, string $method = 'GET', array $body = []): array
    {
        $options = [
            'timeout' => 30,
            'headers' => ['Accept' => 'application/json'],
        ];

        if ($method === 'POST' && !empty($body)) {
            $options['headers']['Content-Type'] = 'application/json';
            $options['body'] = json_encode($body, JSON_THROW_ON_ERROR);
        }

        $response = $this->http->request($method, $this->mlApiUrl . $path, $options);

        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException('API Flask erreur ' . $response->getStatusCode());
        }

        /** @var array<string, mixed> */
        return $response->toArray();
    }
}