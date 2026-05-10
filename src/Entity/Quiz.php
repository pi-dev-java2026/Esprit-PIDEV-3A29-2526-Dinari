<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "quiz_symfony")]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_quiz", type: "integer")]
   
    private ?int $id = null;

    #[ORM\Column(name: "titre", type: "string", length: 255, nullable: true)]
    #[Assert\NotBlank(message: "Le titre du quiz est obligatoire.")]
    #[Assert\Length(max: 255, maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $titre = null;

    #[ORM\Column(name: "liste_reponse", type: "text", nullable: true)]
    #[Assert\NotBlank(message: "Les choix de réponses sont obligatoires.")]
    private ?string $listeReponse = null;

    #[ORM\Column(name: "reponse_correct", type: "string", length: 255, nullable: true)]
    #[Assert\NotBlank(message: "La réponse correcte est obligatoire.")]
    #[Assert\Length(max: 255, maxMessage: "La réponse correcte ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $reponseCorrect = null;

    #[ORM\Column(name: "score_quiz", type: "integer", nullable: true)]
    #[Assert\Positive(message: "Le score doit être un nombre positif.")]
    private ?int $scoreQuiz = null;

    #[ORM\Column(name: "date_creation", type: "date", nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(name: "is_exam_mode", type: "boolean", nullable: true)]
    private ?bool $isExamMode = null;

    #[ORM\Column(name: "time_limit", type: "integer", nullable: true)]
    #[Assert\Positive(message: "La limite de temps doit être un nombre positif.")]
    private ?int $timeLimit = null;

    #[ORM\ManyToOne(targetEntity: Cours::class, inversedBy: "quizzes")]
    #[ORM\JoinColumn(name: "id_cours_id", referencedColumnName: "id_cours", nullable: true)]
    private ?Cours $cours = null;

    /**
     * Topic/theme of this quiz (comma-separated keywords).
     * Used to identify weak topics when the user scores poorly.
     * Example: "budget,depenses"
     */
    #[ORM\Column(name: "theme", type: "string", length: 255, nullable: true)]
    private ?string $theme = null;

    /**
     * Primary concept this quiz tests (single keyword).
     * Used by the behavioral AI for per-concept tracking.
     * Example: "budget"
     */
    #[ORM\Column(name: "concept", type: "string", length: 100, nullable: true)]
    private ?string $concept = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    public function getListeReponse(): ?string
    {
        return $this->listeReponse;
    }

    public function setListeReponse(?string $listeReponse): static
    {
        $this->listeReponse = $listeReponse;
        return $this;
    }

    public function getReponseCorrect(): ?string
    {
        return $this->reponseCorrect;
    }

    public function setReponseCorrect(?string $reponseCorrect): static
    {
        $this->reponseCorrect = $reponseCorrect;
        return $this;
    }

    public function getScoreQuiz(): ?int
    {
        return $this->scoreQuiz;
    }

    public function setScoreQuiz(?int $scoreQuiz): static
    {
        $this->scoreQuiz = $scoreQuiz;
        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function isExamMode(): ?bool
    {
        return $this->isExamMode;
    }

    public function setIsExamMode(?bool $isExamMode): static
    {
        $this->isExamMode = $isExamMode;
        return $this;
    }

    public function getTimeLimit(): ?int
    {
        return $this->timeLimit;
    }

    public function setTimeLimit(?int $timeLimit): static
    {
        $this->timeLimit = $timeLimit;
        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): static
    {
        $this->cours = $cours;
        return $this;
    }

    public function getTheme(): ?string { return $this->theme; }
    public function setTheme(?string $theme): static { $this->theme = $theme; return $this; }

    public function getConcept(): ?string { return $this->concept; }
    public function setConcept(?string $v): static { $this->concept = $v !== null ? strtolower(trim($v)) : null; return $this; }

    /** Returns theme as an array of trimmed keywords
     * @return string[]
     */
    public function getThemeKeywords(): array
    {
        if (!$this->theme) return [];
        return array_filter(array_map('trim', explode(',', strtolower($this->theme))));
    }

    /**
     * Returns answer choices as a clean array.
     * Handles all separator formats: newline (admin form), pipe (fixtures), comma (legacy).
     * Automatically skips the first element if it matches the question title (fixtures format).
     * @return string[]
     */
    public function getAnswerChoices(): array
    {
        if (!$this->listeReponse) return [];

        $raw = $this->listeReponse;

        // Normalise: replace | with newline, then split on newline
        $raw   = str_replace('|', "\n", $raw);
        $parts = array_filter(array_map('trim', explode("\n", $raw)));
        $parts = array_values($parts);

        // If first element matches the question title, it's the fixtures echo — skip it
        if (!empty($parts) && $this->titre && trim($parts[0]) === trim($this->titre)) {
            array_shift($parts);
        }

        return $parts;
    }
}