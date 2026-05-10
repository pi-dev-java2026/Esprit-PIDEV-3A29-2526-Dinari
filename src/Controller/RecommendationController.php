<?php

namespace App\Controller;

use App\Repository\ExpertComptableRepository;
use App\Service\ExpertSpecialityPredictor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecommendationController extends AbstractController
{
    #[Route('/recommandation-expert', name: 'app_recommandation_expert')]
    public function index(
        Request $request,
        ExpertSpecialityPredictor $predictor,
        ExpertComptableRepository $expertRepository
    ): Response {
        $besoin = '';
        $specialitePredite = null;
        $experts = [];

        if ($request->isMethod('POST')) {
            $besoin = trim((string) $request->request->get('besoin', ''));
            $specialitePredite = $predictor->predict($besoin);

            if ($specialitePredite !== null) {
                $experts = $expertRepository->findBy(
                    ['specialite' => $specialitePredite],
                    ['experience' => 'DESC']
                );
            }
        }

        return $this->render('recommendation/index.html.twig', [
            'besoin' => $besoin,
            'specialitePredite' => $specialitePredite,
            'experts' => $experts,
        ]);
    }
}