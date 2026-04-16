<?php

namespace App\Controller\Client;

use App\Entity\QuizResultat;
use App\Event\QuizCompletedEvent;
use App\Event\RecommendationsGeneratedEvent;
use App\Repository\QuizRepository;
use App\Repository\QuizResultatRepository;
use App\Service\RecommendationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/recommandations')]
class RecommendationController extends AbstractController
{
    /**
     * Main recommendation page — shows personalised course suggestions.
     */
    #[Route('', name: 'app_recommandations', methods: ['GET'])]
    public function index(
        Request                   $request,
        RecommendationService     $service,
        QuizResultatRepository    $resultatRepo,
        EventDispatcherInterface  $dispatcher,
    ): Response {
        $sessionId = $request->getSession()->getId();
        $niveau    = $request->query->get('niveau');

        $recommendations = $service->recommend($sessionId, $niveau ?: null);
        $inferredLevel   = $service->inferLevel($sessionId);
        $history         = $resultatRepo->findBySession($sessionId);
        $weakTopics      = $resultatRepo->findWeakTopics($sessionId);
        $avgScore        = $resultatRepo->getAverageScore($sessionId);

        if (!empty($recommendations)) {
            $dispatcher->dispatch(
                new RecommendationsGeneratedEvent($sessionId, count($recommendations)),
                RecommendationsGeneratedEvent::NAME
            );
        }

        return $this->render('client/recommandations/index.html.twig', [
            'recommendations' => $recommendations,
            'inferred_level'  => $inferredLevel,
            'selected_niveau' => $niveau ?: $inferredLevel,
            'history'         => $history,
            'weak_topics'     => $weakTopics,
            'avg_score'       => $avgScore,
        ]);
    }

    /**
     * API endpoint — returns recommendations as JSON (for AJAX widgets).
     */
    #[Route('/api', name: 'app_recommandations_api', methods: ['GET'])]
    public function api(
        Request               $request,
        RecommendationService $service,
    ): JsonResponse {
        $sessionId = $request->getSession()->getId();
        $niveau    = $request->query->get('niveau');
        $limit     = min((int) $request->query->get('limit', 6), 12);

        $recommendations = $service->recommend($sessionId, $niveau ?: null, $limit);

        $data = array_map(function ($item) {
            $cours = $item['cours'];
            return [
                'id'          => $cours->getId(),
                'nom'         => $cours->getNomCours(),
                'description' => $cours->getDescription(),
                'niveau'      => $cours->getNiveau(),
                'theme'       => $cours->getTheme(),
                'score'       => $item['score'],
                'reasons'     => $item['reasons'],
            ];
        }, $recommendations);

        return new JsonResponse($data);
    }

    /**
     * Records a quiz result for the current session.
     * Called via POST after a quiz is completed.
     */
    #[Route('/enregistrer-resultat', name: 'app_quiz_save_result', methods: ['POST'])]
    public function saveResult(
        Request                  $request,
        QuizRepository           $quizRepo,
        EntityManagerInterface   $em,
        EventDispatcherInterface $dispatcher,
    ): JsonResponse {
        $sessionId   = $request->getSession()->getId();
        $quizId      = (int) $request->request->get('quiz_id');
        $scoreObtenu = (int) $request->request->get('score_obtenu', 0);
        $scoreMax    = (int) $request->request->get('score_max', 100);
        $niveau      = $request->request->get('niveau');

        $quiz = $quizRepo->find($quizId);
        if (!$quiz) {
            return new JsonResponse(['error' => 'Quiz introuvable'], 404);
        }

        $resultat = new QuizResultat();
        $resultat->setSessionId($sessionId);
        $resultat->setQuiz($quiz);
        $resultat->setScoreObtenu(max(0, $scoreObtenu));
        $resultat->setScoreMax(max(1, $scoreMax));
        $resultat->setNiveauUtilisateur($niveau);

        $em->persist($resultat);
        $em->flush();

        // Dispatch event — subscriber handles notification creation
        $dispatcher->dispatch(
            new QuizCompletedEvent($resultat, $sessionId),
            QuizCompletedEvent::NAME
        );

        return new JsonResponse([
            'success'     => true,
            'pourcentage' => $resultat->getScorePourcentage(),
        ]);
    }
}
