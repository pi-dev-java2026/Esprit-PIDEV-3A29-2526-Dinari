<?php

namespace App\Controller;

use App\Entity\HistoriqueDepense;
use App\Repository\HistoriqueDepenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/historique', name: 'historique_')]
class HistoriqueClientController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, HistoriqueDepenseRepository $repo): Response
    {
        // Utilisateur fixé à 1 en attendant l'authentification
        $userId = 1;

        $action = $request->query->get('action');
        $type   = $request->query->get('type');

        $entries = $repo->findForUser($userId, $action ?: null, $type ?: null);

        // Compteurs pour les stats
        $stats = [
            'total'    => count($entries),
            'cree'     => count(array_filter($entries, fn($e) => $e->getAction() === HistoriqueDepense::ACTION_CREE)),
            'modifie'  => count(array_filter($entries, fn($e) => $e->getAction() === HistoriqueDepense::ACTION_MODIFIE)),
            'supprime' => count(array_filter($entries, fn($e) => $e->getAction() === HistoriqueDepense::ACTION_SUPPRIME)),
            'depenses' => count(array_filter($entries, fn($e) => $e->getTypeRessource() === HistoriqueDepense::TYPE_DEPENSE)),
            'budgets'  => count(array_filter($entries, fn($e) => $e->getTypeRessource() === HistoriqueDepense::TYPE_BUDGET)),
        ];

        return $this->render('historique/index.html.twig', [
            'entries'       => $entries,
            'stats'         => $stats,
            'filterAction'  => $action,
            'filterType'    => $type,
            'actions'       => [
                HistoriqueDepense::ACTION_CREE,
                HistoriqueDepense::ACTION_MODIFIE,
                HistoriqueDepense::ACTION_SUPPRIME,
            ],
        ]);
    }
}
