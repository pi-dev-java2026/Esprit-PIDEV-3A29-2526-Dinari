<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "chapitre_question")]
class ChapitreQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "text")]
    private string $question = '';

    #[ORM\Column(name: "choix_a", type: "string", length: 300)]
    private string $choixA = '';

    #[ORM\Column(name: "choix_b", type: "string", length: 300)]
    private string $choixB = '';

    #[ORM\Column(name: "choix_c", type: "string", length: 300, nullable: true)]
    private ?string $choixC = null;

    #[ORM\Column(name: "choix_d", type: "string", length: 300, nullable: true)]
    private ?string $choixD = null;

    #[ORM\Column(name: "bonne_reponse", type: "string", length: 1)]
    private string $bonneReponse = 'a';

    #[ORM\Column(type: "integer")]
    private int $position = 0;

    #[ORM\ManyToOne(targetEntity: Chapitre::class, inversedBy: "questions")]
    #[ORM\JoinColumn(name: "id_chapitre", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
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

    public function getPosition(): int { return $this->position; }
    public function setPosition(int $v): static { $this->position = $v; return $this; }

    public function getChapitre(): ?Chapitre { return $this->chapitre; }
    public function setChapitre(?Chapitre $v): static { $this->chapitre = $v; return $this; }
}
