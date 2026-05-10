<?php

namespace App\Controller;

use App\Repository\ExpertComptableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExpertStatsController extends AbstractController
{
    #[Route('/admin/expert-statistiques', name: 'app_admin_expert_stats')]
    public function index(ExpertComptableRepository $expertComptableRepository): Response
    {
        $stats = $expertComptableRepository->getExpertsStatistics();

        return $this->render('expert_stats/index.html.twig', [
            'stats' => $stats,
        ]);
    }
}