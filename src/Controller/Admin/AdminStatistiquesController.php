<?php

namespace App\Controller\Admin;

use App\Repository\CoursRepository;
use App\Repository\QuizRepository;
use App\Repository\QuizResultatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[Route('/admin')]
class AdminStatistiquesController extends AbstractController
{
    #[Route('/statistiques', name: 'admin_statistiques', methods: ['GET'])]
    public function index(
        CoursRepository        $coursRepo,
        QuizRepository         $quizRepo,
        QuizResultatRepository $resultatRepo,
        ChartBuilderInterface  $chartBuilder,
    ): Response {
        // ── Core counts (always available) ───────────────────────────
        $nbCours    = $coursRepo->count([]);
        $nbQuizzes  = $quizRepo->count([]);
        $nbAttempts = $resultatRepo->countAll();
        $avgScore   = $resultatRepo->getGlobalAverageScore();
        $weakTopics = $resultatRepo->findGlobalWeakTopics();

        // ── Overview bar chart: platform summary ─────────────────────
        // Always has data — shows courses, quizzes, attempts side by side
        $overviewChart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $overviewChart->setData([
            'labels'   => ['Cours', 'Quiz', 'Tentatives'],
            'datasets' => [[
                'label'           => 'Total',
                'data'            => [$nbCours, $nbQuizzes, $nbAttempts],
                'backgroundColor' => ['rgba(37,99,235,0.75)', 'rgba(79,70,229,0.75)', 'rgba(16,185,129,0.75)'],
                'borderRadius'    => 8,
                'borderSkipped'   => false,
            ]],
        ]);
        $overviewChart->setOptions([
            'responsive'          => true,
            'maintainAspectRatio' => true,
            'plugins' => [
                'legend' => ['display' => false],
                'tooltip' => ['callbacks' => []],
            ],
            'scales' => [
                'y' => ['beginAtZero' => true, 'ticks' => ['stepSize' => 1]],
                'x' => ['grid' => ['display' => false]],
            ],
        ]);

        // ── Score gauge doughnut: avg score vs remaining ──────────────
        // Always has data — shows avg score as a filled arc
        $scoreDisplay = max(0.0, min(100.0, $avgScore));
        $scoreChart   = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $scoreChart->setData([
            'labels'   => ['Score moyen', 'Restant'],
            'datasets' => [[
                'data'            => [$scoreDisplay, 100 - $scoreDisplay],
                'backgroundColor' => [
                    $scoreDisplay >= 70 ? 'rgba(16,185,129,0.85)' : ($scoreDisplay >= 40 ? 'rgba(245,158,11,0.85)' : 'rgba(239,68,68,0.85)'),
                    'rgba(226,232,240,0.5)',
                ],
                'borderWidth'     => 0,
                'circumference'   => 180,
                'rotation'        => 270,
            ]],
        ]);
        $scoreChart->setOptions([
            'responsive'          => true,
            'maintainAspectRatio' => true,
            'cutout'              => '75%',
            'plugins'             => ['legend' => ['display' => false], 'tooltip' => ['enabled' => false]],
        ]);

        // ── Weak topics charts (only when data exists) ────────────────
        $barChart      = null;
        $doughnutChart = null;

        if (!empty($weakTopics)) {
            $topicLabels = array_column($weakTopics, 'topic');
            $topicCounts = array_column($weakTopics, 'count');
            $colors      = ['#2563EB','#4F46E5','#7C3AED','#DB2777','#DC2626','#D97706','#059669','#0891B2'];

            $barChart = $chartBuilder->createChart(Chart::TYPE_BAR);
            $barChart->setData([
                'labels'   => $topicLabels,
                'datasets' => [[
                    'label'           => 'Occurrences',
                    'data'            => $topicCounts,
                    'backgroundColor' => array_slice($colors, 0, count($topicLabels)),
                    'borderRadius'    => 6,
                    'borderSkipped'   => false,
                ]],
            ]);
            $barChart->setOptions([
                'responsive' => true,
                'plugins'    => ['legend' => ['display' => false]],
                'scales'     => ['y' => ['beginAtZero' => true, 'ticks' => ['stepSize' => 1]]],
            ]);

            $doughnutChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
            $doughnutChart->setData([
                'labels'   => $topicLabels,
                'datasets' => [[
                    'data'            => $topicCounts,
                    'backgroundColor' => array_slice($colors, 0, count($topicLabels)),
                    'borderWidth'     => 2,
                    'borderColor'     => '#fff',
                ]],
            ]);
            $doughnutChart->setOptions([
                'responsive' => true,
                'cutout'     => '55%',
                'plugins'    => ['legend' => ['position' => 'bottom', 'labels' => ['padding' => 16, 'font' => ['size' => 12]]]],
            ]);
        }

        return $this->render('admin/statistiques/index.html.twig', [
            'nb_cours'       => $nbCours,
            'nb_quizzes'     => $nbQuizzes,
            'nb_attempts'    => $nbAttempts,
            'avg_score'      => $avgScore,
            'weak_topics'    => $weakTopics,
            'overview_chart' => $overviewChart,
            'score_chart'    => $scoreChart,
            'bar_chart'      => $barChart,
            'doughnut_chart' => $doughnutChart,
        ]);
    }
}
