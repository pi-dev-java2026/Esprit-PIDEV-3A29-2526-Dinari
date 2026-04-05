<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "quiz")]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_quiz", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "titre", type: "string", length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(name: "liste_reponse", type: "text", nullable: true)]
    private ?string $listeReponse = null;

    #[ORM\Column(name: "reponse_correct", type: "string", length: 255, nullable: true)]
    private ?string $reponseCorrect = null;

    #[ORM\Column(name: "score_quiz", type: "integer", nullable: true)]
    private ?int $scoreQuiz = null;

    #[ORM\Column(name: "date_creation", type: "date", nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(name: "is_exam_mode", type: "boolean", nullable: true)]
    private ?bool $isExamMode = null;

    #[ORM\Column(name: "time_limit", type: "integer", nullable: true)]
    private ?int $timeLimit = null;

    #[ORM\ManyToOne(targetEntity: Cours::class, inversedBy: "quizzes")]
    #[ORM\JoinColumn(name: "id_cours", referencedColumnName: "id_cours", nullable: true)]
    private ?Cours $cours = null;

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
}