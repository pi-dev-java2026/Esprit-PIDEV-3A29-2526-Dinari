<?php

namespace App\Entity;

use App\Repository\QuizResultatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stores a quiz attempt result for a session user.
 * Since the app has no User entity, we track by session ID.
 */
#[ORM\Entity(repositoryClass: QuizResultatRepository::class)]
#[ORM\Table(name: "quiz_resultat")]
#[ORM\Index(columns: ["session_id"], name: "idx_qr_session")]
class QuizResultat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    /** Browser session ID — used as anonymous user identifier */
    #[ORM\Column(name: "session_id", type: "string", length: 128)]
    private string $sessionId = '';

    /** Score obtained (0–100 as a percentage) */
    #[ORM\Column(name: "score_obtenu", type: "integer")]
    private int $scoreObtenu = 0;

    /** Max possible score for this quiz */
    #[ORM\Column(name: "score_max", type: "integer")]
    private int $scoreMax = 100;

    /** User-declared level at time of attempt */
    #[ORM\Column(name: "niveau_utilisateur", type: "string", length: 20, nullable: true)]
    private ?string $niveauUtilisateur = null;

    #[ORM\Column(name: "date_passage", type: "datetime")]
    private \DateTimeInterface $datePassage;

    #[ORM\ManyToOne(targetEntity: Quiz::class)]
    #[ORM\JoinColumn(name: "id_quiz", referencedColumnName: "id_quiz", nullable: false, onDelete: "CASCADE")]
    private ?Quiz $quiz = null;

    public function __construct()
    {
        $this->datePassage = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getSessionId(): string { return $this->sessionId; }
    public function setSessionId(string $v): static { $this->sessionId = $v; return $this; }

    public function getScoreObtenu(): int { return $this->scoreObtenu; }
    public function setScoreObtenu(int $v): static { $this->scoreObtenu = $v; return $this; }

    public function getScoreMax(): int { return $this->scoreMax; }
    public function setScoreMax(int $v): static { $this->scoreMax = $v; return $this; }

    public function getNiveauUtilisateur(): ?string { return $this->niveauUtilisateur; }
    public function setNiveauUtilisateur(?string $v): static { $this->niveauUtilisateur = $v; return $this; }

    public function getDatePassage(): \DateTimeInterface { return $this->datePassage; }
    public function setDatePassage(\DateTimeInterface $v): static { $this->datePassage = $v; return $this; }

    public function getQuiz(): ?Quiz { return $this->quiz; }
    public function setQuiz(?Quiz $v): static { $this->quiz = $v; return $this; }

    /** Returns score as a percentage (0–100) */
    public function getScorePourcentage(): float
    {
        if ($this->scoreMax <= 0) return 0.0;
        return round(($this->scoreObtenu / $this->scoreMax) * 100, 1);
    }
}
