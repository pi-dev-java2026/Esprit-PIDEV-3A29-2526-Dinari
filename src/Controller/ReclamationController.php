<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use App\Service\ReclamationClassifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reclamations', name: 'app_reclamation_')]
class ReclamationController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, ReclamationRepository $repo): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $userEmail = $this->getUser() ? $this->getUser()->getUserIdentifier() : null;

        $reclamations = $repo->findBySearch($search, $isAdmin ? null : $userEmail, $sort);

        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamations,
            'search' => $search,
            'sort' => $sort,
            'total' => count($reclamations),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $reclamation = new Reclamation();

        // Pre-fill email if logged in
        $currentUser = $this->getUser();
        if ($currentUser) {
            $reclamation->setEmail($currentUser->getUserIdentifier());
        }

        $form = $this->createForm(ReclamationType::class, $reclamation, [
            'is_admin' => $this->isGranted('ROLE_ADMIN')
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($reclamation);
            $em->flush();
            $this->addFlash('success', 'Réclamation créée avec succès.');
            return $this->redirectToRoute('app_reclamation_index');
        }

        return $this->render('reclamation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/show', name: 'show', methods: ['GET'])]
    public function show(Reclamation $reclamation): Response
    {
        $currentUser = $this->getUser();
        if (!$this->isGranted('ROLE_ADMIN')) {
            if (!$currentUser || $reclamation->getEmail() !== $currentUser->getUserIdentifier()) {
                throw $this->createAccessDeniedException("Vous ne pouvez voir que vos propres réclamations.");
            }
        }

        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $currentUser = $this->getUser();
        if (!$this->isGranted('ROLE_ADMIN')) {
            if (!$currentUser || $reclamation->getEmail() !== $currentUser->getUserIdentifier()) {
                throw $this->createAccessDeniedException("Vous ne pouvez modifier que vos propres réclamations.");
            }
        }

        $form = $this->createForm(ReclamationType::class, $reclamation, [
            'is_admin' => $this->isGranted('ROLE_ADMIN')
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Réclamation modifiée avec succès.');
            return $this->redirectToRoute('app_reclamation_index');
        }

        return $this->render('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/status', name: 'status', methods: ['POST'])]
    public function updateStatus(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Seul un administrateur peut modifier le statut d\'une réclamation.');
        }

        $newStatus = $request->request->get('statut');
        $allowed = ['En attente', 'En cours', 'Traitée', 'Rejetée'];
        if (in_array($newStatus, $allowed)) {
            $reclamation->setStatut($newStatus);
            $em->flush();
            $this->addFlash('success', 'Statut modifié avec succès.');
        }
        return $this->redirectToRoute('app_reclamation_index');
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        $currentUser = $this->getUser();
        if (!$this->isGranted('ROLE_ADMIN')) {
            if (!$currentUser || $reclamation->getEmail() !== $currentUser->getUserIdentifier()) {
                throw $this->createAccessDeniedException("Vous ne pouvez supprimer que vos propres réclamations.");
            }
        }

        if ($this->isCsrfTokenValid('delete' . $reclamation->getId_reclamation(), $request->request->get('_token'))) {
            $em->remove($reclamation);
            $em->flush();
            $this->addFlash('success', 'Réclamation supprimée.');
        }
        return $this->redirectToRoute('app_reclamation_index');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // ADMIN — Réponse groupée par type (ML)
    // ─────────────────────────────────────────────────────────────────────────

    /** Affiche la page de gestion ML */
    #[Route('/admin/bulk', name: 'admin_bulk', methods: ['GET'])]
    public function adminBulk(): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('reclamation/admin_bulk_response.html.twig', [
            'predicted_type' => null,
            'confidence'     => null,
            'all_scores'     => [],
            'reclamations'   => [],
            'search_text'    => '',
            'ml_error'       => null,
        ]);
    }

    /** Classifie le texte via ML et retourne les réclamations du type prédit */
    #[Route('/admin/bulk/search', name: 'admin_bulk_search', methods: ['POST'])]
    public function adminBulkSearch(
        Request $request,
        ReclamationRepository $repo,
        ReclamationClassifierService $classifier
    ): Response {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $searchText = trim((string) $request->request->get('search_text', ''));

        if (empty($searchText)) {
            $this->addFlash('error', 'Veuillez saisir un texte pour la classification ML.');
            return $this->redirectToRoute('app_reclamation_admin_bulk');
        }

        // ── Appel au modèle ML ──────────────────────────────────────────────
        $mlResult = $classifier->classify($searchText);

        $predictedType = $mlResult['type'];
        $confidence    = $mlResult['confidence'];
        $allScores     = $mlResult['all_scores'];
        $mlError       = $mlResult['error'];

        $reclamations = [];
        if (!$mlError && $predictedType !== 'Inconnu') {
            $reclamations = $repo->findByType($predictedType);
        }

        return $this->render('reclamation/admin_bulk_response.html.twig', [
            'predicted_type' => $predictedType,
            'confidence'     => $confidence,
            'all_scores'     => $allScores,
            'reclamations'   => $reclamations,
            'search_text'    => $searchText,
            'ml_error'       => $mlError,
        ]);
    }

    /** Envoie une réponse unique à toutes les réclamations du type prédit */
    #[Route('/admin/bulk/send', name: 'admin_bulk_send', methods: ['POST'])]
    public function adminBulkSend(
        Request $request,
        ReclamationRepository $repo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $type    = trim((string) $request->request->get('type', ''));
        $reponse = trim((string) $request->request->get('reponse', ''));

        if (empty($type) || empty($reponse)) {
            $this->addFlash('error', 'Le type et la réponse sont obligatoires.');
            return $this->redirectToRoute('app_reclamation_admin_bulk');
        }

        // ── Mise à jour groupée via DQL ──────────────────────────────────────
        $affected = $repo->updateReclamationsByType($type, $reponse);

        if ($affected > 0) {
            $this->addFlash('success',
                "✅ Réponse envoyée avec succès à {$affected} réclamation(s) de type « {$type} » — statut mis à jour : Traitée."
            );
        } else {
            $this->addFlash('error', "Aucune réclamation de type « {$type} » n'a été trouvée ou modifiée.");
        }

        return $this->redirectToRoute('app_reclamation_admin_bulk');
    }
}
