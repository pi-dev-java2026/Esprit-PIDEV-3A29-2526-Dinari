<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Calls the Python ML microservice to get a financial recommendation label,
 * then maps it to human-readable advice in French.
 */
class AiRecommendationService
{
    /** Maps ML labels to user-facing advice */
    private const ADVICE_MAP = [
        'learn_budget' => [
            'titre'   => 'Apprenez les bases du budget',
            'conseil' => 'Votre score au quiz et votre profil financier indiquent que maîtriser la gestion d\'un budget est votre priorité. Commencez par le cours "Les bases du budget".',
            'icon'    => '📚',
        ],
        'reduce_expenses' => [
            'titre'   => 'Réduisez vos dépenses',
            'conseil' => 'Vos dépenses représentent une part trop importante de vos revenus. Identifiez les postes non essentiels et fixez-vous un plafond mensuel.',
            'icon'    => '✂️',
        ],
        'reduce_subscriptions' => [
            'titre'   => 'Réduisez vos abonnements',
            'conseil' => 'Vos abonnements consomment une part significative de vos revenus. Faites un audit de vos abonnements et supprimez ceux que vous utilisez peu.',
            'icon'    => '🔕',
        ],
        'build_savings' => [
            'titre'   => 'Constituez une épargne',
            'conseil' => 'Vous avez une marge pour épargner mais elle reste faible. Automatisez un virement mensuel vers un compte épargne, même petit.',
            'icon'    => '🏦',
        ],
        'invest' => [
            'titre'   => 'Passez à l\'investissement',
            'conseil' => 'Votre situation financière est saine et vos connaissances solides. C\'est le bon moment pour explorer les placements et faire fructifier votre épargne.',
            'icon'    => '📈',
        ],
    ];

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $chatbotUrl,
    ) {}

    /**
     * Sends user financial data to the ML service and returns structured advice.
     *
     * @return array{label: string, confidence: float, titre: string, conseil: string, icon: string}
     */
    public function getRecommendation(
        float  $scorePourcentage,
        string $niveauUtilisateur,
        float  $totalDepenses,
        float  $totalAbonnements,
        float  $revenu,
    ): array {
        try {
            $response = $this->httpClient->request('POST', $this->chatbotUrl . '/recommend', [
                'json' => [
                    'score_pourcentage'  => $scorePourcentage,
                    'niveau'             => $niveauUtilisateur,
                    'total_depenses'     => $totalDepenses,
                    'total_abonnements'  => $totalAbonnements,
                    'revenu'             => $revenu,
                ],
                'timeout' => 8,
            ]);

            $data  = $response->toArray();
            $label = $data['label'] ?? 'learn_budget';
            $conf  = (float) ($data['confidence'] ?? 0.0);

        } catch (TransportExceptionInterface) {
            // Fallback when Python service is unreachable
            $label = $this->fallbackLabel($scorePourcentage, $totalDepenses, $totalAbonnements, $revenu);
            $conf  = 0.0;
        }

        $advice = self::ADVICE_MAP[$label] ?? self::ADVICE_MAP['learn_budget'];

        return array_merge(['label' => $label, 'confidence' => $conf], $advice);
    }

    /** Simple rule-based fallback when the ML service is down */
    private function fallbackLabel(
        float $score,
        float $depenses,
        float $abonnements,
        float $revenu,
    ): string {
        if ($revenu <= 0) return 'learn_budget';
        $ratioDep = $depenses / $revenu;
        $ratioAbo = $abonnements / $revenu;
        $epargne  = ($revenu - $depenses - $abonnements) / $revenu;

        if ($score < 40)        return 'learn_budget';
        if ($ratioDep > 0.75)   return 'reduce_expenses';
        if ($ratioAbo > 0.20)   return 'reduce_subscriptions';
        if ($epargne >= 0.15)   return 'invest';
        return 'build_savings';
    }
}
