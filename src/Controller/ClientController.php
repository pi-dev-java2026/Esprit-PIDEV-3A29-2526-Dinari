<?php

namespace App\Controller;

use App\Repository\ExpertComptableRepository;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientController extends AbstractController
{
    #[Route('/experts-client', name: 'app_client_experts')]
    public function experts(Request $request, ExpertComptableRepository $expertComptableRepository): Response
    {
        $search = $request->query->get('search');
        $specialite = $request->query->get('specialite');
        $tri = $request->query->get('tri');

        $experts = $expertComptableRepository->findByFilters($search, $specialite, $tri);

        return $this->render('client/experts.html.twig', [
            'experts' => $experts,
            'search' => $search,
            'specialite' => $specialite,
            'tri' => $tri,
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

        $search = $request->query->get('search');
        $prixMax = $request->query->get('prixMax');
        $dureeMax = $request->query->get('dureeMax');
        $tri = $request->query->get('tri');

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