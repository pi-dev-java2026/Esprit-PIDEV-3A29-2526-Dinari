<?php

namespace App\Controller;

use App\Repository\ExpertComptableRepository;
use App\Repository\OffreRepository;
use App\Service\ExpertSpecialityPredictor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientController extends AbstractController
{
    #[Route('/experts-client', name: 'app_client_experts', methods: ['GET', 'POST'])]
    public function experts(
        Request $request,
        ExpertComptableRepository $expertComptableRepository,
        ExpertSpecialityPredictor $predictor
    ): Response {
        $searchValue = $request->query->get('search');
        $specialiteValue = $request->query->get('specialite');
        $triValue = $request->query->get('tri');

        $search = is_string($searchValue) ? $searchValue : null;
        $specialite = is_string($specialiteValue) ? $specialiteValue : null;
        $tri = is_string($triValue) ? $triValue : null;

        $besoin = '';
        $specialitePredite = null;

        if ($request->isMethod('POST')) {
            $besoinValue = $request->request->get('besoin', '');
            $besoin = is_string($besoinValue) ? trim($besoinValue) : '';

            $specialitePredite = $predictor->predict($besoin);

            if ($specialitePredite !== null) {
                $specialite = $specialitePredite;
            }
        }

        $experts = $expertComptableRepository->findByFilters($search, $specialite, $tri);

        return $this->render('client/experts.html.twig', [
            'experts' => $experts,
            'search' => $search,
            'specialite' => $specialite,
            'tri' => $tri,
            'besoin' => $besoin,
            'specialitePredite' => $specialitePredite,
        ]);
    }

    #[Route('/experts-client/{id}/offres', name: 'app_client_offres_expert')]
    public function offresExpert(
        int $id,
        Request $request,
        ExpertComptableRepository $expertComptableRepository,
        OffreRepository $offreRepository
    ): Response {
        $expert = $expertComptableRepository->find($id);

        if (!$expert) {
            throw $this->createNotFoundException('Expert introuvable.');
        }

        $searchValue = $request->query->get('search');
        $prixMaxValue = $request->query->get('prixMax');
        $dureeMaxValue = $request->query->get('dureeMax');
        $triValue = $request->query->get('tri');

        $search = is_string($searchValue) ? $searchValue : null;
        $prixMax = is_string($prixMaxValue) ? $prixMaxValue : null;
        $dureeMax = is_string($dureeMaxValue) ? $dureeMaxValue : null;
        $tri = is_string($triValue) ? $triValue : null;

        $offres = $offreRepository->findByFilters($expert, $search, $prixMax, $dureeMax, $tri);

        return $this->render('client/offres.html.twig', [
            'expert' => $expert,
            'offres' => $offres,
            'search' => $search,
            'prixMax' => $prixMax,
            'dureeMax' => $dureeMax,
            'tri' => $tri,
        ]);
    }
}