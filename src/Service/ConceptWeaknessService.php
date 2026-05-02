<?php

namespace App\Service;

use App\Entity\UserConceptProgress;
use App\Repository\UserConceptProgressRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Behavioral AI — Error Detection System.
 *
 * Analyzes user quiz answers per concept over time and:
 *  - Tracks correct/wrong counts per concept
 *  - Classifies each concept: Strong | Moderate | Weak | Critical
 *  - Detects repeated weaknesses (failing the same concept across multiple quizzes)
 *  - Generates personalized French feedback messages
 *
 * Classification rules:
 *  accuracy >= 0.75                          → Strong
 *  accuracy >= 0.50                          → Moderate
 *  accuracy < 0.50 AND streak < 3            → Weak
 *  accuracy < 0.50 AND streak >= 3           → Critical
 *  wrong > correct AND streak >= 2           → repeated weakness flag
 */
class ConceptWeaknessService
{
    /** Minimum answers before we classify (avoids noise on 1-question concepts) */
    private const MIN_ANSWERS_TO_CLASSIFY = 2;

    /** Streak threshold to flag as "repeated weakness" */
    private const REPEATED_WEAKNESS_STREAK = 2;

    /** Streak threshold to escalate to Critical */
    private const CRITICAL_STREAK = 3;

    public function __construct(
        private readonly UserConceptProgressRepository $progressRepo,
        private readonly EntityManagerInterface        $em,
    ) {}

    /**
     * Records answers for a set of concepts from a single quiz attempt.
     *
     * $conceptAnswers format:
     * [
     *   'budget'        => ['correct' => 2, 'wrong' => 1],
     *   'investissement' => ['correct' => 0, 'wrong' => 3],
     * ]
     *
     * @param array<string, array{correct: int, wrong: int}> $conceptAnswers
     */
    public function recordQuizAnswers(string $sessionId, array $conceptAnswers): void
    {
        foreach ($conceptAnswers as $concept => $counts) {
            $concept = strtolower(trim($concept));
            if ($concept === '') continue;

            $progress = $this->progressRepo->findOrCreate($sessionId, $concept);

            $correct = max(0, (int) $counts['correct']);
            $wrong   = max(0, (int) $counts['wrong']);

            $progress->setCorrectCount($progress->getCorrectCount() + $correct);
            $progress->setWrongCount($progress->getWrongCount() + $wrong);

            // Update weak quiz streak: did this quiz session go badly for this concept?
            if ($wrong > $correct) {
                $progress->setWeakQuizStreak($progress->getWeakQuizStreak() + 1);
            }

            // lastUpdated is refreshed automatically via #[ORM\PreUpdate]

            // Reclassify
            $this->classify($progress);

            $this->em->persist($progress);
        }

        $this->em->flush();
    }

    /**
     * Classifies a concept progress record and sets level + repeated weakness flag.
     */
    public function classify(UserConceptProgress $progress): void
    {
        $accuracy = $progress->getAccuracy();
        $streak   = $progress->getWeakQuizStreak();
        $total    = $progress->getTotalCount();

        // Not enough data yet — keep as moderate
        if ($total < self::MIN_ANSWERS_TO_CLASSIFY) {
            $progress->setLevel(UserConceptProgress::LEVEL_MODERATE);
            $progress->setIsRepeatedWeakness(false);
            return;
        }

        // Classify level
        if ($accuracy >= 0.75) {
            $progress->setLevel(UserConceptProgress::LEVEL_STRONG);
        } elseif ($accuracy >= 0.50) {
            $progress->setLevel(UserConceptProgress::LEVEL_MODERATE);
        } elseif ($streak >= self::CRITICAL_STREAK) {
            $progress->setLevel(UserConceptProgress::LEVEL_CRITICAL);
        } else {
            $progress->setLevel(UserConceptProgress::LEVEL_WEAK);
        }

        // Flag repeated weakness
        $isRepeated = ($progress->getWrongCount() > $progress->getCorrectCount())
            && ($streak >= self::REPEATED_WEAKNESS_STREAK);
        $progress->setIsRepeatedWeakness($isRepeated);
    }

    /**
     * Returns a full behavioral analysis for a session.
     *
     * @return array{
     *   concepts: UserConceptProgress[],
     *   weak: UserConceptProgress[],
     *   repeated: UserConceptProgress[],
     *   feedback: string[],
     *   summary: string,
     * }
     */
    public function analyze(string $sessionId): array
    {
        $all      = $this->progressRepo->findBySession($sessionId);
        $weak     = $this->progressRepo->findWeakConcepts($sessionId);
        $repeated = $this->progressRepo->findRepeatedWeaknesses($sessionId);

        $feedback = $this->generateFeedback($weak, $repeated);
        $summary  = $this->generateSummary($all, $weak, $repeated);

        return [
            'concepts' => $all,
            'weak'     => $weak,
            'repeated' => $repeated,
            'feedback' => $feedback,
            'summary'  => $summary,
        ];
    }

    /**
     * Generates personalized feedback messages in French.
     *
     * @param UserConceptProgress[] $weak
     * @param UserConceptProgress[] $repeated
     * @return string[]
     */
    private function generateFeedback(array $weak, array $repeated): array
    {
        $messages = [];

        foreach ($repeated as $p) {
            $label = $this->conceptLabel($p->getConcept());
            $messages[] = sprintf(
                '⚠️ Vous faites régulièrement des erreurs sur le concept "%s". Une révision approfondie est fortement recommandée.',
                $label
            );
        }

        foreach ($weak as $p) {
            if ($p->isRepeatedWeakness()) continue; // already covered above

            $label = $this->conceptLabel($p->getConcept());

            if ($p->getLevel() === UserConceptProgress::LEVEL_CRITICAL) {
                $messages[] = sprintf(
                    '🔴 Le concept "%s" est critique pour vous : %d erreurs contre %d bonnes réponses. Commencez par revoir les bases.',
                    $label,
                    $p->getWrongCount(),
                    $p->getCorrectCount()
                );
            } else {
                $messages[] = sprintf(
                    '🟡 Vous avez des difficultés avec "%s" (%d erreurs). Pratiquez davantage ce sujet.',
                    $label,
                    $p->getWrongCount()
                );
            }
        }

        if (empty($messages)) {
            $messages[] = '✅ Bonne progression ! Continuez à pratiquer pour renforcer vos acquis.';
        }

        return $messages;
    }

    /**
     * Generates a one-line summary of the user's overall concept mastery.
     *
     * @param UserConceptProgress[] $all
     * @param UserConceptProgress[] $weak
     * @param UserConceptProgress[] $repeated
     */
    private function generateSummary(array $all, array $weak, array $repeated): string
    {
        if (empty($all)) {
            return 'Aucune donnée disponible. Complétez des quiz pour obtenir une analyse.';
        }

        $criticalCount  = count(array_filter($all, fn($p) => $p->getLevel() === UserConceptProgress::LEVEL_CRITICAL));
        $repeatedCount  = count($repeated);
        $weakCount      = count($weak);
        $strongCount    = count(array_filter($all, fn($p) => $p->getLevel() === UserConceptProgress::LEVEL_STRONG));

        if ($criticalCount > 0) {
            return sprintf(
                'Attention : %d concept(s) critique(s) détecté(s). Une révision immédiate est nécessaire.',
                $criticalCount
            );
        }

        if ($repeatedCount > 0) {
            return sprintf(
                'Vous répétez les mêmes erreurs sur %d concept(s). Ciblez ces points faibles en priorité.',
                $repeatedCount
            );
        }

        if ($weakCount > 0) {
            return sprintf(
                '%d concept(s) à améliorer identifié(s). Des cours ciblés vous sont recommandés.',
                $weakCount
            );
        }

        return sprintf(
            'Excellente maîtrise ! %d concept(s) bien acquis. Continuez à progresser.',
            $strongCount
        );
    }

    /**
     * Maps raw concept keys to human-readable French labels.
     */
    private function conceptLabel(string $concept): string
    {
        return match ($concept) {
            'budget'          => 'Budget',
            'epargne'         => 'Épargne',
            'investissement'  => 'Investissement',
            'depenses'        => 'Dépenses',
            'abonnements'     => 'Abonnements',
            'credit'          => 'Crédit',
            'retraite'        => 'Retraite',
            'fiscalite'       => 'Fiscalité',
            'assurance'       => 'Assurance',
            'immobilier'      => 'Immobilier',
            default           => ucfirst($concept),
        };
    }
}
