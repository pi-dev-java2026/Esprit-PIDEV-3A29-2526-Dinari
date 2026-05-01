<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: "chapitre")]
class Chapitre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    /** @phpstan-ignore property.unusedType */
    private ?int $id = null;

    #[ORM\Column(type: "integer")]
    #[Assert\NotNull(message: "L'ordre est obligatoire.")]
    #[Assert\PositiveOrZero(message: "L'ordre doit être un nombre positif ou zéro.")]
    private int $position = 0;

    // ── Identité ──
    #[ORM\Column(type: "string", length: 200)]
    #[Assert\NotBlank(message: "Le titre est obligatoire.")]
    #[Assert\Length(max: 200, maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères.")]
    private string $titre = '';

    #[ORM\Column(name: "sous_titre", type: "string", length: 255, nullable: true)]
    private ?string $sousTitre = null;

    // ── Contenu ──
    #[ORM\Column(type: "text", nullable: true)]
    private ?string $intro = null;

    #[ORM\Column(name: "contenu_principal", type: "text", nullable: true)]
    private ?string $contenuPrincipal = null;

    #[ORM\Column(name: "a_retenir", type: "text", nullable: true)]
    private ?string $aRetenir = null;

    // ── Médias ──
    #[ORM\Column(name: "video_url", type: "string", length: 500, nullable: true)]
    private ?string $videoUrl = null;

    #[ORM\Column(name: "image_url", type: "string", length: 500, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(name: "image_titre", type: "string", length: 255, nullable: true)]
    private ?string $imageTitre = null;

    #[ORM\Column(name: "image_description", type: "string", length: 500, nullable: true)]
    private ?string $imageDescription = null;

    // ── Legacy (kept for BC) ──
    #[ORM\Column(type: "text", nullable: true)]
    private ?string $contenu = null;

    // ── Relations ──
    #[ORM\ManyToOne(targetEntity: Cours::class, inversedBy: "chapitres")]
    #[ORM\JoinColumn(name: "id_cours_id", referencedColumnName: "id_cours", nullable: false, onDelete: "CASCADE")]
    private ?Cours $cours = null;

    /** @var Collection<int, ChapitreTache> */
    #[ORM\OneToMany(targetEntity: ChapitreTache::class, mappedBy: "chapitre", cascade: ["persist", "remove"], orphanRemoval: true)]
    #[ORM\OrderBy(["position" => "ASC"])]
    private Collection $taches;

    /** @var Collection<int, ChapitreQuestion> */
    #[ORM\OneToMany(targetEntity: ChapitreQuestion::class, mappedBy: "chapitre", cascade: ["persist", "remove"], orphanRemoval: true)]
    #[ORM\OrderBy(["position" => "ASC"])]
    private Collection $questions;

    public function __construct()
    {
        $this->taches    = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getPosition(): int { return $this->position; }
    public function setPosition(int $v): static { $this->position = $v; return $this; }

    public function getTitre(): string { return $this->titre; }
    public function setTitre(string $v): static { $this->titre = $v; return $this; }

    public function getSousTitre(): ?string { return $this->sousTitre; }
    public function setSousTitre(?string $v): static { $this->sousTitre = $v; return $this; }

    public function getIntro(): ?string { return $this->intro; }
    public function setIntro(?string $v): static { $this->intro = $v; return $this; }

    public function getContenuPrincipal(): ?string { return $this->contenuPrincipal; }
    public function setContenuPrincipal(?string $v): static { $this->contenuPrincipal = $v; return $this; }

    public function getARetenir(): ?string { return $this->aRetenir; }
    public function setARetenir(?string $v): static { $this->aRetenir = $v; return $this; }

    public function getVideoUrl(): ?string { return $this->videoUrl; }
    public function setVideoUrl(?string $v): static { $this->videoUrl = $v; return $this; }

    public function getImageUrl(): ?string { return $this->imageUrl; }
    public function setImageUrl(?string $v): static { $this->imageUrl = $v; return $this; }

    public function getImageTitre(): ?string { return $this->imageTitre; }
    public function setImageTitre(?string $v): static { $this->imageTitre = $v; return $this; }

    public function getImageDescription(): ?string { return $this->imageDescription; }
    public function setImageDescription(?string $v): static { $this->imageDescription = $v; return $this; }

    public function getContenu(): ?string { return $this->contenu; }
    public function setContenu(?string $v): static { $this->contenu = $v; return $this; }

    public function getCours(): ?Cours { return $this->cours; }
    public function setCours(?Cours $v): static { $this->cours = $v; return $this; }

    /** @return Collection<int, ChapitreTache> */
    public function getTaches(): Collection { return $this->taches; }

    public function addTache(ChapitreTache $t): static
    {
        if (!$this->taches->contains($t)) {
            $this->taches->add($t);
            $t->setChapitre($this);
        }
        return $this;
    }

    public function removeTache(ChapitreTache $t): static
    {
        $this->taches->removeElement($t);
        return $this;
    }

    /** @return Collection<int, ChapitreQuestion> */
    public function getQuestions(): Collection { return $this->questions; }

    public function addQuestion(ChapitreQuestion $q): static
    {
        if (!$this->questions->contains($q)) {
            $this->questions->add($q);
            $q->setChapitre($this);
        }
        return $this;
    }

    public function removeQuestion(ChapitreQuestion $q): static
    {
        $this->questions->removeElement($q);
        return $this;
    }
}
