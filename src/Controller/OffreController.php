<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/offre')]
final class OffreController extends AbstractController
{
    #[Route('', name: 'app_offre_index', methods: ['GET'])]
    public function index(
        Request $request,
        OffreRepository $offreRepository,
        \App\Repository\ExpertComptableRepository $expertComptableRepository
    ): Response {
        $expertId = $request->query->get('expert_id');

        if (!$expertId) {
            $offres = [];
            $expert = null;
        } else {
            $expert = $expertComptableRepository->find($expertId);

            if (!$expert) {
                throw $this->createNotFoundException('Expert introuvable.');
            }

            $offres = $offreRepository->findBy(
                ['expertComptable' => $expert],
                ['id' => 'DESC'],
                10
            );
        }

        return $this->render('offre/index.html.twig', [
            'offres' => $offres,
            'expert_id' => $expertId,
            'expert' => $expert,
        ]);
    }

    #[Route('/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
        public function new(
            Request $request,
            EntityManagerInterface $entityManager,
            \App\Repository\ExpertComptableRepository $expertComptableRepository
        ): Response {
            $offre = new Offre();

            $expertId = $request->query->get('expert_id');
            if ($expertId) {
                $expert = $expertComptableRepository->find($expertId);
                if ($expert) {
                    $offre->setExpertComptable($expert);
                }
            }

            $form = $this->createForm(OffreType::class, $offre);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($offre);
                $entityManager->flush();

                return $this->redirectToRoute('app_offre_index', [
                    'expert_id' => $offre->getExpertComptable()->getId(),
                ], Response::HTTP_SEE_OTHER);
            }

            return $this->render('offre/new.html.twig', [
                'offre' => $offre,
                'form' => $form,
                'expert_id' => $expertId,
            ]);
        }

    #[Route('/{id}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre): Response
    {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
    }

   #[Route('/{id}/edit', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_offre_index', [
                'expert_id' => $offre->getExpertComptable()->getId(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre_delete', methods: ['POST'])]
    public function delete(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $expertId = $offre->getExpertComptable()->getId();

        $token = $request->request->get('_token');

        if (is_string($token) && $this->isCsrfTokenValid('delete'.$offre->getId(), $token)) {
            $entityManager->remove($offre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offre_index', [
            'expert_id' => $expertId,
        ]);
    }
}