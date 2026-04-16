<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "cours_symfony")]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_cours", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "nom_cours", type: "string", length: 150, nullable: true)]
    #[Assert\NotBlank(message: "Le titre du cours est obligatoire.")]
    #[Assert\Length(max: 150, maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $nomCours = null;

    #[ORM\Column(name: "contenu", type: "string", length: 255, nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "L'identifiant ne peut pas dépasser {{ limit }} caractères.")]
    #[Assert\Regex(
        pattern: '/^(?!https?:\/\/).*/i',
        message: "L'identifiant ne doit pas être une URL."
    )]
    private ?string $contenu = null;

    #[ORM\Column(name: "description", type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: "date_creation", type: "date", nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    /**
     * Difficulty level: debutant | intermediaire | avance
     */
    #[ORM\Column(name: "niveau", type: "string", length: 20, nullable: true)]
    private ?string $niveau = null;

    /**
     * Topic/theme keywords (comma-separated) used for recommendation matching.
     * Example: "budget,epargne,investissement"
     */
    #[ORM\Column(name: "theme", type: "string", length: 255, nullable: true)]
    private ?string $theme = null;

    #[ORM\OneToMany(targetEntity: Chapitre::class, mappedBy: "cours", cascade: ["remove"], orphanRemoval: true)]
    #[ORM\OrderBy(["position" => "ASC"])]
    private Collection $chapitres;

    #[ORM\OneToMany(targetEntity: Quiz::class, mappedBy: "cours")]
    private Collection $quizzes;

    public function __construct()
    {
        $this->chapitres = new ArrayCollection();
        $this->quizzes   = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nomCours ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCours(): ?string
    {
        return $this->nomCours;
    }

    public function setNomCours(?string $nomCours): static
    {
        $this->nomCours = $nomCours;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): static
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
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

    public function getNiveau(): ?string { return $this->niveau; }
    public function setNiveau(?string $niveau): static { $this->niveau = $niveau; return $this; }

    public function getTheme(): ?string { return $this->theme; }
    public function setTheme(?string $theme): static { $this->theme = $theme; return $this; }

    /** Returns theme as an array of trimmed keywords */
    public function getThemeKeywords(): array
    {
        if (!$this->theme) return [];
        return array_filter(array_map('trim', explode(',', strtolower($this->theme))));
    }

    /** @return Collection<int, Chapitre> */
    public function getChapitres(): Collection { return $this->chapitres; }

    /** @return Collection<int, Quiz> */
    public function getQuizzes(): Collection { return $this->quizzes; }

    public function addChapitre(Chapitre $chapitre): static
    {
        if (!$this->chapitres->contains($chapitre)) {
            $this->chapitres->add($chapitre);
            $chapitre->setCours($this);
        }
        return $this;
    }

    public function removeChapitre(Chapitre $chapitre): static
    {
        $this->chapitres->removeElement($chapitre);
        return $this;
    }
}