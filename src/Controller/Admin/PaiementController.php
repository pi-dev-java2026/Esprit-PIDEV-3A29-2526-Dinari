<?php

namespace App\Controller\Admin;

use App\Repository\PaiementRepository;
use App\Repository\AbonnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/paiement')]
class PaiementController extends AbstractController
{
    #[Route('/', name: 'admin_paiement_index')]
    public function index(
        PaiementRepository   $paiementRepo,
        AbonnementRepository $abonnementRepo
    ): Response {
        $paiements   = $paiementRepo->findAllWithAbonnement();
        $abonnements = $abonnementRepo->findAll();

        $total     = count($paiements);
        $actifs    = count(array_filter($paiements, fn($p) => $p->getStatut() === 'payé'));
        $enAttente = count(array_filter($paiements, fn($p) => $p->getStatut() === 'en_attente'));
        $revenus   = array_sum(array_map(
            fn($p) => $p->getMontant(),
            array_filter($paiements, fn($p) => $p->getStatut() === 'payé')
        ));

        // Stats par abonnement pour les cartes — utilise getAbonnementId()
        $statsByAbo = [];
        foreach ($paiements as $p) {
            $aboId = $p->getAbonnementId()?->getId(); // ← corrigé
            if (!$aboId) continue;
            if (!isset($statsByAbo[$aboId])) {
                $statsByAbo[$aboId] = ['count' => 0, 'revenus' => 0.0];
            }
            $statsByAbo[$aboId]['count']++;
            if ($p->getStatut() === 'payé') {
                $statsByAbo[$aboId]['revenus'] += $p->getMontant();
            }
        }

        return $this->render('admin/paiement/index.html.twig', [
            'paiements'   => $paiements,
            'abonnements' => $abonnements,
            'stats'       => [
                'total'     => $total,
                'actifs'    => $actifs,
                'enAttente' => $enAttente,
                'revenus'   => $revenus,
            ],
            'statsByAbo'  => $statsByAbo,
        ]);
    }

    #[Route('/abonnement/{id}/details', name: 'admin_paiement_abo_details', methods: ['GET'])]
    public function aboDetails(
        int                  $id,
        PaiementRepository   $paiementRepo,
        AbonnementRepository $abonnementRepo
    ): JsonResponse {
        $abonnement = $abonnementRepo->find($id);
        if (!$abonnement) {
            return $this->json(['error' => 'Abonnement introuvable'], 404);
        }

        $paiements  = $paiementRepo->findByAbonnementId($id);
        $revenus    = 0.0;
        $clients    = [];
        $historique = [];

        foreach ($paiements as $p) {
            if ($p->getStatut() === 'payé') {
                $revenus += $p->getMontant();
            }

            $nomComplet = trim(($p->getPrenomTitulaire() ?? '') . ' ' . ($p->getNomTitulaire() ?? ''));

            $entry = [
                'id'      => $p->getId(),
                'nom'     => $nomComplet ?: 'Client inconnu',
                'montant' => $p->getMontant(),
                'statut'  => $p->getStatut(),
                'date'    => $p->getDatePaiement()?->format('d/m/Y') ?? '—',
                'mode'    => $p->getModePaiement() ?? '—',
            ];

            $clients[]    = $entry;
            $historique[] = $entry;
        }

        return $this->json([
            'abonnement' => [
                'id'        => $abonnement->getId(),
                'nom'       => $abonnement->getNom(),
                'prix'      => $abonnement->getPrix(),
                'frequence' => $abonnement->getFrequence(),
                'categorie' => $abonnement->getCategorie(),
                'tier'      => $abonnement->getTier(),
            ],
            'nbPaiements' => count($paiements),
            'revenus'     => $revenus,
            'clients'     => $clients,
            'historique'  => $historique,
        ]);
    }
}