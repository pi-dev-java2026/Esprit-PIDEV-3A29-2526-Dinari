<?php

namespace App\Controller\Admin;

use App\Entity\HistoriqueDepense;
use App\Repository\HistoriqueDepenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/historique', name: 'admin_historique_')]
class HistoriqueController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, HistoriqueDepenseRepository $repo): Response
    {
        $action = $request->query->get('action');
        $entries = $repo->findFiltered($action ?: null);

        return $this->render('admin/historique/index.html.twig', [
            'entries'       => $entries,
            'filterAction'  => $action,
            'actions'       => [
                HistoriqueDepense::ACTION_CREE,
                HistoriqueDepense::ACTION_MODIFIE,
                HistoriqueDepense::ACTION_SUPPRIME,
            ],
        ]);
    }
}
