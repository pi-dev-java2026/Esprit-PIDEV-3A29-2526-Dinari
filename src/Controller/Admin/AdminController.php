<?php

namespace App\Controller\Admin;

use App\Repository\BudgetRepository;
use App\Repository\CategorieRepository;
use App\Repository\DepenseRepository;
use App\Repository\HistoriqueDepenseRepository;
use App\Repository\ModePaiementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('', name: 'admin_index')]
    public function index(
        BudgetRepository       $budgetRepo,
        DepenseRepository      $depenseRepo,
        CategorieRepository    $categorieRepo,
        ModePaiementRepository $modePaiementRepo,
        HistoriqueDepenseRepository $historiqueRepo
    ): Response {
        $totalBudgets       = count($budgetRepo->findAll());
        $totalDepenses      = count($depenseRepo->findAll());
        $totalCategories    = count($categorieRepo->findAll());
        $totalModesPaiement = count($modePaiementRepo->findAll());

        $dernieresDepenses  = $depenseRepo->findBy([], ['dateDepense' => 'DESC'], 5);
        $categories         = $categorieRepo->findAllOrderedByLabel();
        $modesPaiement      = $modePaiementRepo->findAllOrderedByLabel();
        $dernieresActivites = $historiqueRepo->findDernieres(6);

        return $this->render('admin/index.html.twig', [
            'totalBudgets'        => $totalBudgets,
            'totalDepenses'       => $totalDepenses,
            'totalCategories'     => $totalCategories,
            'totalModesPaiement'  => $totalModesPaiement,
            'dernieresDepenses'   => $dernieresDepenses,
            'categories'          => $categories,
            'modesPaiement'       => $modesPaiement,
            'dernieresActivites'  => $dernieresActivites,
        ]);
    }
}
