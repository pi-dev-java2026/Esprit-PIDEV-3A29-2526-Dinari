<?php

namespace App\Entity;

use App\Repository\DepenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepenseRepository::class)]
#[ORM\Table(name: 'depense')]
class Depense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_depense', type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $montant = null;

    #[ORM\Column(name: 'date_depense', type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDepense = null;

    #[ORM\Column(type: Types::STRING, length: 250)]
    private ?string $description = null;

    // ── Relation ManyToOne → ModePaiement ──
    #[ORM\ManyToOne(targetEntity: ModePaiement::class, inversedBy: 'depenses')]
    #[ORM\JoinColumn(name: 'mode_paiement_id', referencedColumnName: 'id', nullable: false)]
    private ?ModePaiement $modePaiement = null;

    #[ORM\Column(name: 'utilisateur_id', type: Types::INTEGER)]
    private ?int $utilisateurId = null;

    // ── Relation ManyToOne → Categorie ──
    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'depenses')]
    #[ORM\JoinColumn(name: 'categorie_id', referencedColumnName: 'id', nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'depense', targetEntity: JustificatifDepense::class, cascade: ['persist', 'remove'])]
    private Collection $justificatifs;

    public function __construct()
    {
        $this->justificatifs = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getMontant(): ?string { return $this->montant; }
    public function setMontant(string $montant): static { $this->montant = $montant; return $this; }

    public function getDateDepense(): ?\DateTimeInterface { return $this->dateDepense; }
    public function setDateDepense(\DateTimeInterface $dateDepense): static { $this->dateDepense = $dateDepense; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $description): static { $this->description = $description; return $this; }

    public function getModePaiement(): ?ModePaiement { return $this->modePaiement; }
    public function setModePaiement(?ModePaiement $modePaiement): static { $this->modePaiement = $modePaiement; return $this; }

    public function getUtilisateurId(): ?int { return $this->utilisateurId; }
    public function setUtilisateurId(int $utilisateurId): static { $this->utilisateurId = $utilisateurId; return $this; }

    public function getCategorie(): ?Categorie { return $this->categorie; }
    public function setCategorie(?Categorie $categorie): static { $this->categorie = $categorie; return $this; }

    public function getJustificatifs(): Collection { return $this->justificatifs; }

    public function addJustificatif(JustificatifDepense $justificatif): static
    {
        if (!$this->justificatifs->contains($justificatif)) {
            $this->justificatifs->add($justificatif);
            $justificatif->setDepense($this);
        }
        return $this;
    }

    public function removeJustificatif(JustificatifDepense $justificatif): static
    {
        if ($this->justificatifs->removeElement($justificatif)) {
            if ($justificatif->getDepense() === $this) {
                $justificatif->setDepense(null);
            }
        }
        return $this;
    }
}
