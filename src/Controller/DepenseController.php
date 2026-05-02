<?php

namespace App\Controller;

use App\Entity\Depense;
use App\Form\DepenseType;
use App\Entity\JustificatifDepense;
use App\Repository\CategorieRepository;
use App\Repository\DepenseRepository;
use App\Repository\ModePaiementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

#[Route('/depense', name: 'depense_')]
class DepenseController extends AbstractController
{
    // ── LISTE ──────────────────────────────────────────────
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(DepenseRepository $repo): Response
     {
        // Utilisateur fixé à 1 en attendant l'authentification
        $depenses = $repo->findByUtilisateur(1);
        $stats    = $repo->totalParCategorie(1);
        $totalMontant = $repo->getTotalParUtilisateur(1);
        $client = HttpClient::create();

            // mois courant + 1
            $mois = (int)date('m') + 1;

            // gérer décembre → janvier
            if ($mois == 13) {
                $mois = 1;
            }

            $prediction = null;

            try {
                $response = $client->request(
                    'GET',
                    'http://127.0.0.1:8001/predict',
                    [
                        'query' => [
                            'month' => $mois
                        ]
                    ]
                );

                $data = $response->toArray();
                $prediction = $data['prediction'];

            } catch (\Exception $e) {
                $prediction = null; // API down
            }

        return $this->render('depense/index.html.twig', [
            'depenses'     => $depenses,
            'stats'        => $stats,
            'totalMontant' => $totalMontant,
            'prediction' => $prediction
        ]);
    }

    // ── DÉTAIL ─────────────────────────────────────────────
    #[Route('/{id}', name: 'show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Depense $depense): Response
    {
        return $this->render('depense/show.html.twig', [
            'depense' => $depense,
        ]);
    }

    // ── CRÉER ──────────────────────────────────────────────
#[Route('/new', name: 'new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $em): Response
{
    $depense = new Depense();

    $form = $this->createForm(DepenseType::class, $depense);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        // ⚠️ temporaire (auth plus tard)
        $depense->setUtilisateurId(1);

        $em->persist($depense);
        $em->flush();

        return $this->redirectToRoute('depense_index');
    }

    return $this->render('depense/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

    // ── MODIFIER ───────────────────────────────────────────
    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]

 public function edit(Request $request, Depense $depense, EntityManagerInterface $em): Response
{
    $form = $this->createForm(DepenseType::class, $depense);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $em->flush();

        return $this->redirectToRoute('depense_index');
    }

    return $this->render('depense/edit.html.twig', [
        'form' => $form->createView(),
        'depense' => $depense,
    ]);
}

    // ── SUPPRIMER ──────────────────────────────────────────
    #[Route('/{id}/delete', name: 'delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Depense $depense, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $depense->getId(), $request->request->get('_token'))) {
            $em->remove($depense);
            $em->flush();
            $this->addFlash('success', 'Dépense supprimée.');
        }

        return $this->redirectToRoute('depense_index');
    }
}
