<?php

namespace App\Controller\Client;

use App\Entity\QuizResultat;
use App\Event\QuizCompletedEvent;
use App\Event\RecommendationsGeneratedEvent;
use App\Repository\QuizRepository;
use App\Repository\QuizResultatRepository;
use App\Repository\UserConceptProgressRepository;
use App\Service\AiRecommendationService;
use App\Service\ConceptWeaknessService;
use App\Service\RecommendationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/recommandations')]
class RecommandationCoursController extends AbstractController
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
     *
     * Builds concept_answers automatically from the quiz entity so the
     * behavioral AI always has data — no frontend changes required.
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

        $scoreMax    = max(1, $scoreMax);
        $scoreObtenu = max(0, min($scoreObtenu, $scoreMax));
        $isCorrect   = $scoreObtenu >= $scoreMax;

        $resultat = new QuizResultat();
        $resultat->setSessionId($sessionId);
        $resultat->setQuiz($quiz);
        $resultat->setScoreObtenu($scoreObtenu);
        $resultat->setScoreMax($scoreMax);
        $resultat->setNiveauUtilisateur($niveau);

        // Build concept_answers from the quiz entity so the behavioral AI
        // always receives structured data, regardless of what the frontend sends.
        $concept = $quiz->getConcept();
        if ($concept === null || $concept === '') {
            // Fall back to the first theme keyword
            $keywords = $quiz->getThemeKeywords();
            $concept  = $keywords[0] ?? null;
        }

        if ($concept !== null && $concept !== '') {
            $resultat->setConceptAnswers([
                $concept => [
                    'correct' => $isCorrect ? 1 : 0,
                    'wrong'   => $isCorrect ? 0 : 1,
                ],
            ]);
        }

        $em->persist($resultat);
        $em->flush();

        // Dispatch event — subscriber handles notification + behavioral AI update
        $dispatcher->dispatch(
            new QuizCompletedEvent($resultat, $sessionId),
            QuizCompletedEvent::NAME
        );

        return new JsonResponse([
            'success'     => true,
            'pourcentage' => $resultat->getScorePourcentage(),
            'concept'     => $concept,
        ]);
    }

    /**
     * AI recommendation page — collects financial data via form and shows ML-based advice.
     * GET  /recommandations/ia          → renders the form
     * POST /recommandations/ia          → submits data, shows result
     */
    #[Route('/ia', name: 'app_recommandations_ia', methods: ['GET', 'POST'])]
    public function ia(
        Request                  $request,
        AiRecommendationService  $aiService,
        QuizResultatRepository   $resultatRepo,
    ): Response {
        $sessionId = $request->getSession()->getId();
        $avgScore  = $resultatRepo->getAverageScore($sessionId);
        $niveau    = $resultatRepo->inferLevelFromScore($avgScore);

        $result = null;

        if ($request->isMethod('POST')) {
            $revenu          = (float) $request->request->get('revenu', 0);
            $totalDepenses   = (float) $request->request->get('total_depenses', 0);
            $totalAbonnements = (float) $request->request->get('total_abonnements', 0);

            if ($revenu > 0) {
                $result = $aiService->getRecommendation(
                    scorePourcentage:  $avgScore,
                    niveauUtilisateur: $niveau,
                    totalDepenses:     $totalDepenses,
                    totalAbonnements:  $totalAbonnements,
                    revenu:            $revenu,
                );
            }
        }

        return $this->render('client/recommandations/ia.html.twig', [
            'result'    => $result,
            'avg_score' => $avgScore,
            'niveau'    => $niveau,
        ]);
    }

    /**
     * AI recommendation JSON API — for AJAX calls.
     * POST /recommandations/ia/api
     */
    #[Route('/ia/api', name: 'app_recommandations_ia_api', methods: ['POST'])]
    public function iaApi(
        Request                 $request,
        AiRecommendationService $aiService,
        QuizResultatRepository  $resultatRepo,
    ): JsonResponse {
        $sessionId = $request->getSession()->getId();
        $avgScore  = $resultatRepo->getAverageScore($sessionId);
        $niveau    = $resultatRepo->inferLevelFromScore($avgScore);

        $data = $request->toArray();

        $revenu           = (float) ($data['revenu'] ?? 0);
        $totalDepenses    = (float) ($data['total_depenses'] ?? 0);
        $totalAbonnements = (float) ($data['total_abonnements'] ?? 0);

        if ($revenu <= 0) {
            return new JsonResponse(['error' => 'Le revenu doit être supérieur à 0'], 400);
        }

        $result = $aiService->getRecommendation(
            scorePourcentage:  $avgScore,
            niveauUtilisateur: $niveau,
            totalDepenses:     $totalDepenses,
            totalAbonnements:  $totalAbonnements,
            revenu:            $revenu,
        );

        return new JsonResponse($result);
    }

    /**
     * Behavioral AI analysis page — shows concept-level weakness detection.
     * GET /recommandations/analyse
     */
    #[Route('/analyse', name: 'app_analyse_comportementale', methods: ['GET'])]
    public function analyseComportementale(
        Request                        $request,
        ConceptWeaknessService         $weaknessService,
        UserConceptProgressRepository  $progressRepo,
    ): Response {
        $sessionId = $request->getSession()->getId();
        $analysis  = $weaknessService->analyze($sessionId);

        return $this->render('client/recommandations/analyse.html.twig', [
            'analysis'  => $analysis,
            'sessionId' => $sessionId,
        ]);
    }

    /**
     * Behavioral AI analysis JSON API.
     * GET /recommandations/analyse/api
     */
    #[Route('/analyse/api', name: 'app_analyse_comportementale_api', methods: ['GET'])]
    public function analyseApi(
        Request                $request,
        ConceptWeaknessService $weaknessService,
    ): JsonResponse {
        $sessionId = $request->getSession()->getId();
        $analysis  = $weaknessService->analyze($sessionId);

        $concepts = array_map(fn($p) => [
            'concept'            => $p->getConcept(),
            'correct'            => $p->getCorrectCount(),
            'wrong'              => $p->getWrongCount(),
            'accuracy'           => round($p->getAccuracy() * 100, 1),
            'level'              => $p->getLevel(),
            'repeated_weakness'  => $p->isRepeatedWeakness(),
            'streak'             => $p->getWeakQuizStreak(),
        ], $analysis['concepts']);

        return new JsonResponse([
            'concepts' => $concepts,
            'feedback' => $analysis['feedback'],
            'summary'  => $analysis['summary'],
        ]);
    }
}