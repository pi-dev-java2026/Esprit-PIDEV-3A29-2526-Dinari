<?php

namespace App\Controller;

use App\Entity\Paiement;
use App\Repository\PaiementRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactureController extends AbstractController
{
    /**
     * Affiche la facture PDF inline dans le navigateur.
     * GET /facture/{id}/pdf
     */
    #[Route('/facture/{id}/pdf', name: 'facture_pdf', methods: ['GET'])]
    public function pdf(int $id, PaiementRepository $repo): Response
    {
        return $this->buildPdfResponse($id, $repo, inline: true);
    }

    /**
     * Force le téléchargement de la facture PDF.
     * GET /facture/{id}/telecharger
     */
    #[Route('/facture/{id}/telecharger', name: 'facture_telecharger', methods: ['GET'])]
    public function telecharger(int $id, PaiementRepository $repo): Response
    {
        return $this->buildPdfResponse($id, $repo, inline: false);
    }

    // ─────────────────────────────────────────────────────────────────────────

    private function buildPdfResponse(int $id, PaiementRepository $repo, bool $inline): Response
{
    /** @var Paiement|null $paiement */
    $paiement = $repo->find($id);

    if (!$paiement) {
        throw $this->createNotFoundException('Paiement introuvable.');
    }

    // ↓ removed the redundant instanceof check
    if ($paiement->getStatut() !== 'payé') {
        throw $this->createAccessDeniedException(
            'La facture est disponible uniquement pour les paiements confirmés.'
        );
    }

        $dateFin = $this->calculerDateFin($paiement);

        $numeroFacture = sprintf(
            'FAC-%s-%05d',
            $paiement->getDatePaiement()->format('Y'),
            $paiement->getId()
        );

        $html = $this->renderView('paiement/facture_pdf.html.twig', [
            'paiement'      => $paiement,
            'dateFin'       => $dateFin,
            'numeroFacture' => $numeroFacture,
        ]);

        $pdf      = $this->renderPdf($html);
        $filename = sprintf('facture-dinari-%s.pdf', $numeroFacture);
        $disp     = $inline ? 'inline' : 'attachment';

        return new Response($pdf, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => sprintf('%s; filename="%s"', $disp, $filename),
            'Content-Length'      => strlen($pdf),
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
        ]);
    }

    private function renderPdf(string $html): string
    {
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', false);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    private function calculerDateFin(Paiement $paiement): \DateTimeInterface
{
    $abonnement = $paiement->getAbonnementId();
    $debut      = clone $paiement->getDatePaiement();

    if (!$debut instanceof \DateTime) {
        $debut = new \DateTime($debut->format('Y-m-d H:i:s'));
    }

    if ($abonnement && method_exists($abonnement, 'getDateFin') && $abonnement->getDateFin()) {
        return $abonnement->getDateFin();
    }

    $frequence = strtolower($abonnement?->getFrequence() ?? 'mensuel');

    // ↓ removed the redundant if ($debut instanceof \DateTime) wrapper
    if ($frequence === 'annuel' || $frequence === 'annuelle' || $frequence === 'yearly') {
        $debut->modify('+1 year');
    } elseif ($frequence === 'trimestriel' || $frequence === 'quarterly') {
        $debut->modify('+3 months');
    } elseif ($frequence === 'hebdomadaire' || $frequence === 'weekly') {
        $debut->modify('+1 week');
    } else {
        $debut->modify('+1 month');
    }

    return $debut;
}
}