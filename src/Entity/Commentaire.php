<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: \App\Repository\CommentaireRepository::class)]
#[ORM\Table(name: "commentaire")]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 100)]
    #[Assert\NotBlank(message: "L'auteur est obligatoire.")]
    #[Assert\Length(max: 100, maxMessage: "Le nom de l'auteur ne peut pas dépasser {{ limit }} caractères.")]
    private string $auteur = '';

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Le contenu du commentaire est obligatoire.")]
    private string $contenu = '';

    #[ORM\Column(name: "date_creation", type: "datetime")]
    private \DateTimeInterface $dateCreation;

    #[ORM\Column(name: "cours_slug", type: "string", length: 100, nullable: true)]
    private ?string $coursSlug = null;

    #[ORM\Column(name: "chapitre", type: "string", length: 100, nullable: true)]
    private ?string $chapitre = null;

    /** @var Collection<int, Reaction> */
    #[ORM\OneToMany(targetEntity: Reaction::class, mappedBy: "commentaire", cascade: ["persist", "remove"], orphanRemoval: true)]
    private Collection $reactions;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->reactions    = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getAuteur(): string { return $this->auteur; }
    public function setAuteur(string $auteur): static { $this->auteur = $auteur; return $this; }

    public function getContenu(): string { return $this->contenu; }
    public function setContenu(string $contenu): static { $this->contenu = $contenu; return $this; }

    public function getDateCreation(): \DateTimeInterface { return $this->dateCreation; }

    public function getCoursSlug(): ?string { return $this->coursSlug; }
    public function setCoursSlug(?string $slug): static { $this->coursSlug = $slug; return $this; }

    public function getChapitre(): ?string { return $this->chapitre; }
    public function setChapitre(?string $chapitre): static { $this->chapitre = $chapitre; return $this; }

    /** @return Collection<int, Reaction> */
    public function getReactions(): Collection { return $this->reactions; }

    /** @return array<string, int> */
    public function getReactionCounts(): array
    {
        $counts = [];
        foreach ($this->reactions as $r) {
            $counts[$r->getEmoji()] = ($counts[$r->getEmoji()] ?? 0) + 1;
        }
        return $counts;
    }
}
