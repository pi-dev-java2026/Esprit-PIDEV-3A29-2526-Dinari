<?php

namespace App\Entity;

use App\Repository\UserConceptProgressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tracks a user's performance on a specific concept (e.g. "budget", "epargne")
 * across all quiz attempts, identified by session ID.
 *
 * This is the core data store for the behavioral AI / error detection system.
 */
#[ORM\Entity(repositoryClass: UserConceptProgressRepository::class)]
#[ORM\Table(name: "user_concept_progress")]
#[ORM\Index(columns: ["session_id"], name: "idx_ucp_session")]
#[ORM\Index(columns: ["session_id", "concept"], name: "idx_ucp_session_concept")]
#[ORM\UniqueConstraint(name: "uniq_session_concept", columns: ["session_id", "concept"])]
#[ORM\HasLifecycleCallbacks]
class UserConceptProgress
{
    /** Classification levels */
    public const LEVEL_STRONG   = 'strong';
    public const LEVEL_MODERATE = 'moderate';
    public const LEVEL_WEAK     = 'weak';
    public const LEVEL_CRITICAL = 'critical';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    /** @phpstan-ignore property.unusedType */
    private ?int $id = null;

    /** Anonymous user identifier (browser session) */
    #[ORM\Column(name: "session_id", type: "string", length: 128)]
    private string $sessionId = '';

    /** Concept keyword: budget, epargne, investissement, etc. */
    #[ORM\Column(type: "string", length: 100)]
    private string $concept = '';

    /** Total correct answers for this concept across all quizzes */
    #[ORM\Column(name: "correct_count", type: "integer")]
    private int $correctCount = 0;

    /** Total wrong answers for this concept across all quizzes */
    #[ORM\Column(name: "wrong_count", type: "integer")]
    private int $wrongCount = 0;

    /**
     * How many separate quiz sessions had more wrong than correct for this concept.
     * Used to detect "repeated weakness" across time.
     */
    #[ORM\Column(name: "weak_quiz_streak", type: "integer")]
    private int $weakQuizStreak = 0;

    /**
     * Computed classification: strong | moderate | weak | critical
     * Recalculated by ConceptWeaknessService after each quiz.
     */
    #[ORM\Column(name: "level", type: "string", length: 20)]
    private string $level = self::LEVEL_MODERATE;

    /** Whether this concept has been flagged as a repeated weakness */
    #[ORM\Column(name: "is_repeated_weakness", type: "boolean")]
    private bool $isRepeatedWeakness = false;

    /** Set on insert and refreshed automatically on every update — never set manually. */
    #[ORM\Column(name: "last_updated", type: "datetime")]
    private \DateTime $lastUpdated;

    public function __construct()
    {
        $this->lastUpdated = new \DateTime();
    }

    // ── Lifecycle callbacks ───────────────────────────────────────────────────

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->lastUpdated = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->lastUpdated = new \DateTime();
    }

    // ── Getters / setters ─────────────────────────────────────────────────────

    public function getId(): ?int { return $this->id; }

    public function getSessionId(): string { return $this->sessionId; }
    public function setSessionId(string $v): static { $this->sessionId = $v; return $this; }

    public function getConcept(): string { return $this->concept; }
    public function setConcept(string $v): static { $this->concept = strtolower(trim($v)); return $this; }

    public function getCorrectCount(): int { return $this->correctCount; }
    public function setCorrectCount(int $v): static { $this->correctCount = $v; return $this; }

    public function getWrongCount(): int { return $this->wrongCount; }
    public function setWrongCount(int $v): static { $this->wrongCount = $v; return $this; }

    public function getWeakQuizStreak(): int { return $this->weakQuizStreak; }
    public function setWeakQuizStreak(int $v): static { $this->weakQuizStreak = $v; return $this; }

    public function getLevel(): string { return $this->level; }
    public function setLevel(string $v): static { $this->level = $v; return $this; }

    public function isRepeatedWeakness(): bool { return $this->isRepeatedWeakness; }
    public function setIsRepeatedWeakness(bool $v): static { $this->isRepeatedWeakness = $v; return $this; }

    /** Read-only — managed automatically by Doctrine lifecycle callbacks. */
    public function getLastUpdated(): \DateTime { return $this->lastUpdated; }

    // ── Business logic ────────────────────────────────────────────────────────

    /** Total answers attempted for this concept */
    public function getTotalCount(): int
    {
        return $this->correctCount + $this->wrongCount;
    }

    /** Accuracy ratio 0.0–1.0 */
    public function getAccuracy(): float
    {
        $total = $this->getTotalCount();
        if ($total === 0) return 0.0;
        return $this->correctCount / $total;
    }
}
