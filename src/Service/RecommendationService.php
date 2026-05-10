<?php

namespace App\Service;

use App\Entity\Cours;
use App\Repository\CoursRepository;
use App\Repository\QuizResultatRepository;
use App\Repository\UserConceptProgressRepository;

/**
 * Computes a recommendation score for each course based on:
 *  - User level vs course level
 *  - Weak topics from quiz history
 *  - Whether the course has already been attempted
 *
 * Scoring breakdown (max ~100 pts):
 *  +40  course level matches user level
 *  +20  course level is one step above user level (progression)
 *  +30  course theme overlaps with a weak topic
 *  +20  course not yet attempted by the user
 *  -50  course already attempted (penalise, not exclude)
 */
class RecommendationService
{
    /** Level order used for "next step" logic */
    private const LEVEL_ORDER = ['debutant' => 1, 'intermediaire' => 2, 'avance' => 3];

    public function __construct(
        private readonly CoursRepository                $coursRepository,
        private readonly QuizResultatRepository         $quizResultatRepository,
        private readonly UserConceptProgressRepository  $conceptProgressRepository,
    ) {}

    /**
     * Returns an ordered list of recommended courses for the given session.
     *
     * @param string      $sessionId       Browser session ID
     * @param string|null $niveauUtilisateur debutant|intermediaire|avance (null = auto-detect)
     * @param int         $limit           Max number of results
     *
     * @return array<array{cours: Cours, score: int, reasons: string[]}>
     */
    public function recommend(
        string  $sessionId,
        ?string $niveauUtilisateur = null,
        int     $limit = 6
    ): array {
        // 1. Resolve user level
        $niveau = $this->resolveLevel($sessionId, $niveauUtilisateur);

        // 2. Gather context
        $weakTopics    = $this->quizResultatRepository->findWeakTopics($sessionId);
        $attemptedIds  = $this->quizResultatRepository->findAttemptedCoursIds($sessionId);
        $allCours      = $this->coursRepository->findBy([], null, 100);

        // Merge behavioral AI weak concepts (more precise than theme-based weak topics)
        $conceptWeakTopics = $this->conceptProgressRepository->findWeakConceptNames($sessionId);
        $weakTopics        = array_unique(array_merge($weakTopics, $conceptWeakTopics));

        // 3. Score each course
        $scored = [];
        foreach ($allCours as $cours) {
            [$score, $reasons] = $this->scoreCours($cours, $niveau, $weakTopics, $attemptedIds);
            $scored[] = ['cours' => $cours, 'score' => $score, 'reasons' => $reasons];
        }

        // 4. Sort descending by score
        usort($scored, fn($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($scored, 0, $limit);
    }

    /**
     * Scores a single course against the user's profile.
     *
     * @param string[]  $weakTopics
     * @param int[]     $attemptedIds
     * @return array{int, string[]}
     */
    private function scoreCours(
        Cours  $cours,
        string $niveau,
        array  $weakTopics,
        array  $attemptedIds
    ): array {
        $score   = 0;
        $reasons = [];

        $coursNiveau = strtolower($cours->getNiveau() ?? '');
        $userRank    = self::LEVEL_ORDER[$niveau]          ?? 1;
        $coursRank   = self::LEVEL_ORDER[$coursNiveau]     ?? 0;

        // ── Level matching ──────────────────────────────────────────────
        if ($coursNiveau === $niveau) {
            $score += 40;
            $reasons[] = 'Niveau correspondant';
        } elseif ($coursRank === $userRank + 1) {
            $score += 20;
            $reasons[] = 'Prochaine étape logique';
        } elseif ($coursRank < $userRank) {
            // Remedial: only boost if user has weak topics
            if (!empty($weakTopics)) {
                $score += 15;
                $reasons[] = 'Révision recommandée';
            }
        }

        // ── Weak topic matching ─────────────────────────────────────────
        if (!empty($weakTopics)) {
            $courseKeywords = $cours->getThemeKeywords();
            $overlap = array_intersect($weakTopics, $courseKeywords);
            if (!empty($overlap)) {
                $score += 30;
                $reasons[] = 'Renforce vos points faibles (' . implode(', ', $overlap) . ')';
            }
        }

        // ── Not yet attempted ───────────────────────────────────────────
        if ($cours->getId() !== null && !in_array($cours->getId(), $attemptedIds, true)) {
            $score += 20;
            $reasons[] = 'Cours non encore commencé';
        } else {
            $score -= 50;
            $reasons[] = 'Déjà tenté';
        }

        return [$score, $reasons];
    }

    /**
     * Resolves the effective user level.
     * If not provided, infers from average quiz score:
     *   < 40%  → debutant
     *   40–70% → intermediaire
     *   > 70%  → avance
     */
    private function resolveLevel(string $sessionId, ?string $provided): string
    {
        if ($provided && isset(self::LEVEL_ORDER[$provided])) {
            return $provided;
        }

        $avg = $this->quizResultatRepository->getAverageScore($sessionId);

        if ($avg >= 70) return 'avance';
        if ($avg >= 40) return 'intermediaire';
        return 'debutant';
    }

    /**
     * Returns the inferred level label for display.
     */
    public function inferLevel(string $sessionId): string
    {
        return $this->resolveLevel($sessionId, null);
    }
}
