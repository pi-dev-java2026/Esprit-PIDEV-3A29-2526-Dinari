<?php

namespace App\Controller\Admin;

use App\Repository\CommentaireRepository;
use App\Repository\CoursRepository;
use App\Repository\QuizRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
class AdminDashboardController extends AbstractController
{
    #[Route('', name: 'admin_dashboard')]
    public function index(
        Request $request,
        CoursRepository $coursRepo,
        QuizRepository $quizRepo,
        CommentaireRepository $commentRepo,
    ): Response {
        $q    = trim($request->query->get('q', ''));
        $tree = $q !== '' ? $coursRepo->search($q) : $coursRepo->findAllWithTree();

        return $this->render('admin/dashboard/index.html.twig', [
            'nbCours'        => $coursRepo->count([]),
            'nbQuiz'         => $quizRepo->count([]),
            'nbCommentaires' => $commentRepo->count([]),
            'tree'           => $tree,
            'searchQuery'    => $q,
        ]);
    }

    /** AJAX endpoint — returns JSON for live search */
    #[Route('/search-cours', name: 'admin_search_cours', methods: ['GET'])]
    public function searchCours(Request $request, CoursRepository $repo): JsonResponse
    {
        $q      = trim($request->query->get('q', ''));
        $result = $q !== '' ? $repo->search($q) : $repo->findAllWithTree();

        $data = array_map(fn($c) => [
            'id'       => $c->getId(),
            'nom'      => $c->getNomCours(),
            'editUrl'  => $this->generateUrl('admin_cours_edit', ['id' => $c->getId()]),
            'chapUrl'  => $this->generateUrl('admin_chapitre_index', ['coursId' => $c->getId()]),
            'chapitres' => array_map(fn($ch) => [
                'id'      => $ch->getId(),
                'titre'   => $ch->getTitre(),
                'editUrl' => $this->generateUrl('admin_chapitre_edit', ['coursId' => $c->getId(), 'id' => $ch->getId()]),
                'taches'  => array_map(fn($t) => [
                    'libelle' => $t->getLibelle(),
                ], $ch->getTaches()->toArray()),
            ], $c->getChapitres()->toArray()),
        ], $result);

        return new JsonResponse($data);
    }
}
