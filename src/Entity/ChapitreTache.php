<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "chapitre_tache")]
class ChapitreTache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    /** @phpstan-ignore property.unusedType */
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 300)]
    #[Assert\NotBlank(message: "Le titre de la tâche est obligatoire.")]
    #[Assert\Length(max: 300, maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères.")]
    private string $libelle = '';

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "integer")]
    #[Assert\PositiveOrZero(message: "L'ordre doit être un nombre positif ou zéro.")]
    private int $position = 0;

    #[ORM\ManyToOne(targetEntity: Chapitre::class, inversedBy: "taches")]
    #[ORM\JoinColumn(name: "id_chapitre_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private ?Chapitre $chapitre = null;

    public function getId(): ?int { return $this->id; }

    public function getLibelle(): string { return $this->libelle; }
    public function setLibelle(string $v): static { $this->libelle = $v; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $v): static { $this->description = $v; return $this; }

    public function getPosition(): int { return $this->position; }
    public function setPosition(int $v): static { $this->position = $v; return $this; }

    public function getChapitre(): ?Chapitre { return $this->chapitre; }
    public function setChapitre(?Chapitre $v): static { $this->chapitre = $v; return $this; }
}
