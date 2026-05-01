<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "chapitre_question")]
class ChapitreQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    /** @phpstan-ignore property.unusedType */
    private ?int $id = null;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "La question est obligatoire.")]
    private string $question = '';

    #[ORM\Column(name: "choix_a", type: "string", length: 300)]
    #[Assert\NotBlank(message: "Le choix A est obligatoire.")]
    #[Assert\Length(max: 300, maxMessage: "Le choix A ne peut pas dépasser {{ limit }} caractères.")]
    private string $choixA = '';

    #[ORM\Column(name: "choix_b", type: "string", length: 300)]
    #[Assert\NotBlank(message: "Le choix B est obligatoire.")]
    #[Assert\Length(max: 300, maxMessage: "Le choix B ne peut pas dépasser {{ limit }} caractères.")]
    private string $choixB = '';

    #[ORM\Column(name: "choix_c", type: "string", length: 300, nullable: true)]
    #[Assert\Length(max: 300, maxMessage: "Le choix C ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $choixC = null;

    #[ORM\Column(name: "choix_d", type: "string", length: 300, nullable: true)]
    #[Assert\Length(max: 300, maxMessage: "Le choix D ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $choixD = null;

    #[ORM\Column(name: "bonne_reponse", type: "string", length: 1)]
    #[Assert\NotBlank(message: "La bonne réponse est obligatoire.")]
    #[Assert\Choice(choices: ['a', 'b', 'c', 'd'], message: "La bonne réponse doit être a, b, c ou d.")]
    private string $bonneReponse = 'a';

    /**
     * Concept keyword this question tests (e.g. "budget", "epargne", "investissement").
     * Used by the behavioral AI to track per-concept performance.
     */
    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $concept = null;

    #[ORM\Column(type: "integer")]
    #[Assert\PositiveOrZero(message: "L'ordre doit être un nombre positif ou zéro.")]
    private int $position = 0;

    #[ORM\ManyToOne(targetEntity: Chapitre::class, inversedBy: "questions")]
    #[ORM\JoinColumn(name: "id_chapitre_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private ?Chapitre $chapitre = null;

    public function getId(): ?int { return $this->id; }

    public function getQuestion(): string { return $this->question; }
    public function setQuestion(string $v): static { $this->question = $v; return $this; }

    public function getChoixA(): string { return $this->choixA; }
    public function setChoixA(string $v): static { $this->choixA = $v; return $this; }

    public function getChoixB(): string { return $this->choixB; }
    public function setChoixB(string $v): static { $this->choixB = $v; return $this; }

    public function getChoixC(): ?string { return $this->choixC; }
    public function setChoixC(?string $v): static { $this->choixC = $v; return $this; }

    public function getChoixD(): ?string { return $this->choixD; }
    public function setChoixD(?string $v): static { $this->choixD = $v; return $this; }

    public function getBonneReponse(): string { return $this->bonneReponse; }
    public function setBonneReponse(string $v): static { $this->bonneReponse = $v; return $this; }

    public function getConcept(): ?string { return $this->concept; }
    public function setConcept(?string $v): static { $this->concept = $v !== null ? strtolower(trim($v)) : null; return $this; }

    public function getPosition(): int { return $this->position; }
    public function setPosition(int $v): static { $this->position = $v; return $this; }

    public function getChapitre(): ?Chapitre { return $this->chapitre; }
    public function setChapitre(?Chapitre $v): static { $this->chapitre = $v; return $this; }
}
