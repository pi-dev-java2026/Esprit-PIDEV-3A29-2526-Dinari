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

        $staticCours = [
            [
                'id'          => null,
                'nomCours'    => 'Finance Personnelle',
                'description' => 'Comprendre les bases de la finance personnelle : budget, épargne, investissement et gestion financière au quotidien.',
                'dateCreation'=> new \DateTime('2026-01-01'),
                'chapitres'   => [
                    ['titre' => 'Introduction',        'sousTitre' => 'Pourquoi gérer ses finances ?', 'position' => 1],
                    ['titre' => 'Budget Personnel',    'sousTitre' => 'Créer et suivre son budget',    'position' => 2],
                    ['titre' => 'Épargne',             'sousTitre' => 'Stratégies d\'épargne efficaces','position' => 3],
                    ['titre' => 'Gestion Financière',  'sousTitre' => 'Contrôler ses dépenses',        'position' => 4],
                    ['titre' => 'Investissement',      'sousTitre' => 'Faire fructifier son argent',   'position' => 5],
                ],
            ],
            [
                'id'          => null,
                'nomCours'    => 'Les bases du budget',
                'description' => 'Créez et gérez un budget personnel efficace dès le premier mois.',
                'dateCreation'=> new \DateTime('2026-01-01'),
                'chapitres'   => [],
            ],
            [
                'id'          => null,
                'nomCours'    => 'Épargne & investissement',
                'description' => 'Stratégies pour épargner intelligemment et faire fructifier votre argent.',
                'dateCreation'=> new \DateTime('2026-01-15'),
                'chapitres'   => [],
            ],
            [
                'id'          => null,
                'nomCours'    => 'Comprendre la banque',
                'description' => 'Taux d\'intérêt, crédits, cartes bancaires — tout ce que vous devez savoir.',
                'dateCreation'=> new \DateTime('2026-02-01'),
                'chapitres'   => [],
            ],
        ];

        $nbCoursDb = $coursRepo->count([]);
        $nbQuizDb  = $quizRepo->count([]);

        $staticQuizCount = 6; // mirrors the static fallback in AdminQuizController

        return $this->render('admin/dashboard/index.html.twig', [
            'nbCours'        => $nbCoursDb + count($staticCours),
            'nbQuiz'         => $nbQuizDb  > 0 ? $nbQuizDb  : $staticQuizCount,
            'nbCommentaires' => $commentRepo->count([]),
            'tree'           => $tree,
            'static_cours'   => $staticCours,
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
