<?php

namespace App\Controller;

use App\Entity\Budget;
use App\Repository\BudgetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

#[Route('/budget')]
class BudgetController extends AbstractController
{
    // ───────── LIST ─────────
#[Route('/', name: 'budget_index', methods: ['GET'])]
public function index(BudgetRepository $repo): Response
{
    $userId = 1;

    $budgets = $repo->findByUtilisateur($userId);

    $budgetsData = [];
    foreach ($budgets as $budget) {
        $budgetsData[] = $repo->getBudgetAvecConsommation(
            $userId,
            (int) $budget->getMois(),
            (int) $budget->getAnnee()
        );
    }

    $moisCourant = (int) date('n');
    $anneeCourante = (int) date('Y');

    $budgetCourant = $repo->getBudgetAvecConsommation(
        $userId,
        $moisCourant,
        $anneeCourante
    );

    return $this->render('budget/index.html.twig', [
        'budgetsData'   => $budgetsData, //iportant
        'budgetCourant' => $budgetCourant, // ✅ IMPORTANT
    ]);
}




#[Route('/budget/send-report', name: 'budget_send_report', methods: ['POST'])]
public function sendReport(Request $request): Response
{
    $mois = (int)$request->request->get('mois');
    $annee = (int)$request->request->get('annee');

    $client = HttpClient::create();

    try {
        $response = $client->request(
            'POST',
            'http://127.0.0.1:9000/run-report',
            [
                'json' => [
                    'mois' => $mois,
                    'annee' => $annee
                ]
            ]
        );

        $data = $response->toArray();

        $this->addFlash('success', "📊 Rapport envoyé pour $mois/$annee");

    } catch (\Exception $e) {
        $this->addFlash('error', '❌ Erreur API : ' . $e->getMessage());
    }

    return $this->redirectToRoute('budget_index');
}

    // ───────── NEW ─────────
    #[Route('/new', name: 'budget_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BudgetRepository $repo, EntityManagerInterface $em): Response
    {
        $userId = 1;

        if ($request->isMethod('POST')) {

            $budget = new Budget();

            $budget->setMontantLimite((string) $request->request->get('montant_limite'));
            $budget->setMois((int) $request->request->get('mois'));
            $budget->setAnnee((int) $request->request->get('annee'));
            $budget->setUtilisateurId($userId);

            // check duplicate
            if ($repo->existePourMois($userId, (int) $budget->getMois(), (int) $budget->getAnnee())) {
                $this->addFlash('error', 'Un budget existe déjà pour ce mois.');
                return $this->redirectToRoute('budget_new');
            }

            $em->persist($budget);
            $em->flush();

            $this->addFlash('success', 'Budget créé avec succès.');
            return $this->redirectToRoute('budget_index');
        }

        return $this->render('budget/new.html.twig', [
            'moisCourant' => (int) date('n'),
            'anneeCourante' => (int) date('Y'),
        ]);
    }

    // ───────── EDIT ─────────
    #[Route('/{id}/edit', name: 'budget_edit', methods: ['GET', 'POST'])]
    public function edit(Budget $budget, Request $request, BudgetRepository $repo, EntityManagerInterface $em): Response
    {
        $userId = 1;

        if ($request->isMethod('POST')) {

            $montantLimite = $request->request->get('montant_limite');
            $mois          = (int) $request->request->get('mois');
            $annee         = (int) $request->request->get('annee');

            // Validate that required fields are present
            if (!$montantLimite || !$mois || !$annee) {
                $this->addFlash('error', 'Tous les champs sont obligatoires.');
                return $this->redirectToRoute('budget_edit', ['id' => $budget->getId()]);
            }

            // Check for duplicate month/year (excluding the current budget)
            if ($repo->existePourMois($userId, $mois, $annee, $budget->getId())) {
                $this->addFlash('error', 'Un budget existe déjà pour ce mois.');
                return $this->redirectToRoute('budget_edit', ['id' => $budget->getId()]);
            }

            // Apply changes to the managed entity
            $budget->setMontantLimite((string) $montantLimite);
            $budget->setMois($mois);
            $budget->setAnnee($annee);

            // Explicitly persist to ensure Doctrine tracks the changes
            $em->persist($budget);
            $em->flush();

            $this->addFlash('success', 'Budget modifié avec succès.');
            return $this->redirectToRoute('budget_index');
        }

        return $this->render('budget/edit.html.twig', [
            'budget'        => $budget,
            'moisCourant'   => (int) date('n'),
            'anneeCourante' => (int) date('Y'),
        ]);
    }

    // ───────── DELETE ─────────
    #[Route('/{id}/delete', name: 'budget_delete', methods: ['POST'])]
    public function delete(Budget $budget, EntityManagerInterface $em): Response
    {
        $em->remove($budget);
        $em->flush();

        $this->addFlash('success', 'Budget supprimé.');
        return $this->redirectToRoute('budget_index');
    }
}