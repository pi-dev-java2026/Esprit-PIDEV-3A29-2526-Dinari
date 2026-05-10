<?php

namespace App\Controller\Client;

use App\Repository\CoursRepository;
use App\Repository\QuizResultatRepository;
use App\Service\RecommendationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class StatistiquesController extends AbstractController
{
    #[Route('/statistiques', name: 'app_statistiques', methods: ['GET'])]
    public function index(
        Request                $request,
        QuizResultatRepository $resultatRepo,
        CoursRepository        $coursRepo,
        RecommendationService  $recommendationService,
        ChartBuilderInterface  $chartBuilder,
    ): Response {
        $sessionId  = $request->getSession()->getId();
        $history    = $resultatRepo->findBySession($sessionId);
        $avgScore   = $resultatRepo->getAverageScore($sessionId);
        $weakTopics = $resultatRepo->findWeakTopics($sessionId);
        $level      = $recommendationService->inferLevel($sessionId);
        $recs       = $recommendationService->recommend($sessionId, null, 6);

        // ── Bar chart: score history ──────────────────────────────────
        $scoreChart = null;
        if (!empty($history)) {
            $labels = [];
            $data   = [];
            $colors = [];
            foreach (array_reverse($history) as $r) {
                $labels[] = $r->getQuiz()?->getTitre() ?? 'Quiz';
                $pct      = $r->getScorePourcentage();
                $data[]   = $pct;
                $colors[] = $pct >= 80
                    ? 'rgba(46,204,113,0.75)'
                    : ($pct >= 50 ? 'rgba(243,156,18,0.75)' : 'rgba(231,76,60,0.75)');
            }

            $scoreChart = $chartBuilder->createChart(Chart::TYPE_BAR);
            $scoreChart->setData([
                'labels'   => $labels,
                'datasets' => [[
                    'label'           => 'Score (%)',
                    'data'            => $data,
                    'backgroundColor' => $colors,
                    'borderRadius'    => 6,
                ]],
            ]);
            $scoreChart->setOptions([
                'responsive' => true,
                'plugins'    => ['legend' => ['display' => false]],
                'scales'     => [
                    'y' => ['min' => 0, 'max' => 100, 'ticks' => ['callback' => 'v => v + "%"']],
                    'x' => ['ticks' => ['maxRotation' => 30, 'font' => ['size' => 11]]],
                ],
            ]);
        }

        // ── Pie chart: weak topics distribution ───────────────────────
        $topicChart = null;
        if (!empty($weakTopics)) {
            $topicChart = $chartBuilder->createChart(Chart::TYPE_PIE);
            $topicChart->setData([
                'labels'   => $weakTopics,
                'datasets' => [[
                    'data'            => array_fill(0, count($weakTopics), 1),
                    'backgroundColor' => ['#e74c3c','#e67e22','#f39c12','#9b59b6','#3498db','#1abc9c'],
                ]],
            ]);
            $topicChart->setOptions([
                'responsive' => true,
                'plugins'    => ['legend' => ['position' => 'bottom']],
            ]);
        }

        return $this->render('client/statistiques/index.html.twig', [
            'history'     => $history,
            'avg_score'   => $avgScore,
            'nb_quizzes'  => count($history),
            'level'       => $level,
            'weak_topics' => $weakTopics,
            'nb_recs'     => count($recs),
            'score_chart' => $scoreChart,
            'topic_chart' => $topicChart,
        ]);
    }
}
