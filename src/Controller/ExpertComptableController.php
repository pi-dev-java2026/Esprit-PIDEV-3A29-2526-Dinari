<?php

namespace App\Controller;

use App\Entity\ExpertComptable;
use App\Form\ExpertComptableType;
use App\Repository\ExpertComptableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/expert/comptable')]
final class ExpertComptableController extends AbstractController
{
    #[Route(name: 'app_expert_comptable_index', methods: ['GET'])]
    public function index(Request $request, ExpertComptableRepository $expertComptableRepository): Response
    {
        $search = $request->query->get('search');
        $search = is_string($search) ? $search : null;

        $specialite = $request->query->get('specialite');
        $specialite = is_string($specialite) ? $specialite : null;

        $expertComptables = $expertComptableRepository->findByAdminFilters($search, $specialite);

        return $this->render('expert_comptable/index.html.twig', [
            'expert_comptables' => $expertComptables,
            'search' => $search,
            'specialite' => $specialite,
        ]);
    }

    #[Route('/new', name: 'app_expert_comptable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $expertComptable = new ExpertComptable();
        $form = $this->createForm(ExpertComptableType::class, $expertComptable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($expertComptable);
            $entityManager->flush();

            return $this->redirectToRoute('app_expert_comptable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('expert_comptable/new.html.twig', [
            'expert_comptable' => $expertComptable,
            'form' => $form,
        ]);
    }

    #[Route('/test-rentabilite', name: 'app_expert_comptable_test_rentabilite', methods: ['GET', 'POST'])]
    public function testRentabilite(Request $request, HttpClientInterface $client): Response
    {
        $result = null;
        $error = null;

        $data = [
            'titre' => '',
            'specialite' => '',
            'experience' => '',
            'prix' => '',
            'duree' => '',
        ];

        if ($request->isMethod('POST')) {
            $data['titre'] = $request->request->get('titre', '');
            $data['specialite'] = $request->request->get('specialite', '');
            $data['experience'] = $request->request->get('experience', '');
            $data['prix'] = $request->request->get('prix', '');
            $data['duree'] = $request->request->get('duree', '');

            try {
                $response = $client->request('POST', 'http://127.0.0.1:8000/predict', [
                    'json' => [
                        'titre' => $data['titre'],
                        'specialite' => $data['specialite'],
                        'experience' => (int) $data['experience'],
                        'prix' => (float) $data['prix'],
                        'duree' => (int) $data['duree'],
                    ],
                ]);

                $result = $response->toArray();
            } catch (\Throwable $e) {
                $error = 'Impossible de contacter l’API IA. Vérifiez que FastAPI est bien lancée.';
            }
        }

        return $this->render('expert_comptable/test_rentabilite.html.twig', [
            'result' => $result,
            'error' => $error,
            'data' => $data,
        ]);
    }

    #[Route('/{id}', name: 'app_expert_comptable_show', methods: ['GET'])]
    public function show(ExpertComptable $expertComptable): Response
    {
        return $this->render('expert_comptable/show.html.twig', [
            'expert_comptable' => $expertComptable,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_expert_comptable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ExpertComptable $expertComptable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExpertComptableType::class, $expertComptable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_expert_comptable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('expert_comptable/edit.html.twig', [
            'expert_comptable' => $expertComptable,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_expert_comptable_delete', methods: ['POST'])]
    public function delete(Request $request, ExpertComptable $expertComptable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $expertComptable->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($expertComptable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_expert_comptable_index', [], Response::HTTP_SEE_OTHER);
    }
    
}