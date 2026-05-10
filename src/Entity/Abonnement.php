<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: \App\Repository\AbonnementRepository::class)]
#[ORM\Table(name: 'abonnement')]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $nom;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
private string $prix = '0.00';

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
private ?string $prix_marche = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
private ?string $prix_dinari = null;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $essai_gratuit = 0;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $badge = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $logo_domain = null;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $mis_en_avant = false;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_fin_offre = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: 'string', length: 20)]
    private string $frequence = 'mensuel';

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $categorie = null;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $actif = true;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $created_at;

    #[ORM\Column(type: 'string', length: 20, options: ['default' => 'Normal'])]
    private string $tier = 'Normal';

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $google_calendar_event_id = null;

    /** @var Collection<int, Paiement> */
    #[ORM\OneToMany(mappedBy: 'abonnement_id', targetEntity: Paiement::class, cascade: ['persist', 'remove'], orphanRemoval: true)]

    private Collection $paiements;

    /** @var Collection<int, Promotion> */
    #[ORM\OneToMany(mappedBy: 'abonnement', targetEntity: Promotion::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $promotions;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $nom_plan = null;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->paiements  = new ArrayCollection();
        $this->promotions = new ArrayCollection();
    }

    public function getLogoDomain(): ?string { return $this->logo_domain; }
    public function setLogoDomain(?string $d): self { $this->logo_domain = $d; return $this; }

    public function getPrixMarche(): ?string { return $this->prix_marche; }
public function setPrixMarche(string|float|null $prix): self { $this->prix_marche = $prix !== null ? (string) $prix : null; return $this; }

    public function getPrixDinari(): ?string { return $this->prix_dinari; }
public function setPrixDinari(string|float|null $prix): self { $this->prix_dinari = $prix !== null ? (string) $prix : null; return $this; }

    public function getEssaiGratuit(): int { return $this->essai_gratuit; }
    public function setEssaiGratuit(int $jours): self { $this->essai_gratuit = $jours; return $this; }

    public function getBadge(): ?string { return $this->badge; }
    public function setBadge(?string $badge): self { $this->badge = $badge; return $this; }

    public function isMisEnAvant(): bool { return $this->mis_en_avant; }
    public function getMisEnAvant(): bool { return $this->mis_en_avant; }
    public function setMisEnAvant(bool $v): self { $this->mis_en_avant = $v; return $this; }

    public function getDateFinOffre(): ?\DateTimeInterface { return $this->date_fin_offre; }
    public function setDateFinOffre(?\DateTimeInterface $date): self { $this->date_fin_offre = $date; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $desc): self { $this->description = $desc; return $this; }

    public function getId(): ?int { return $this->id; }

    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }

    public function getPrix(): string { return $this->prix; }
public function setPrix(string|float $prix): self { $this->prix = (string) $prix; return $this; }

    public function getDateDebut(): ?\DateTimeInterface { return $this->date_debut; }
    public function setDateDebut(?\DateTimeInterface $date): self { $this->date_debut = $date; return $this; }

    public function getFrequence(): string { return $this->frequence; }
    public function setFrequence(string $frequence): self { $this->frequence = $frequence; return $this; }

    public function getCategorie(): ?string { return $this->categorie; }
    public function setCategorie(?string $categorie): self { $this->categorie = $categorie; return $this; }

    public function isActif(): bool { return $this->actif; }
    public function getActif(): bool { return $this->actif; }
    public function setActif(bool $actif): self { $this->actif = $actif; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(\DateTimeInterface $dt): self { $this->created_at = $dt; return $this; }

    public function getTier(): string { return $this->tier; }
    public function setTier(string $tier): self { $this->tier = $tier; return $this; }

    public function getGoogleCalendarEventId(): ?string { return $this->google_calendar_event_id; }
    public function setGoogleCalendarEventId(?string $id): self { $this->google_calendar_event_id = $id; return $this; }

    /** @return Collection<int, Paiement> */
    public function getPaiements(): Collection { return $this->paiements; }

    /** @return Collection<int, Promotion> */
    public function getPromotions(): Collection { return $this->promotions; }

    public function getNomPlan(): ?string { return $this->nom_plan; }
    public function setNomPlan(?string $v): self { $this->nom_plan = $v; return $this; }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions->add($promotion);
            $promotion->setAbonnement($this);
        }
        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        $this->promotions->removeElement($promotion);
        return $this;
    }

    public function getNombreAbonnes(): int
    {
        return $this->paiements->filter(fn($p) => $p->getStatut() === 'payé')->count();
    }

    public function getTierLabel(): string
    {
        return match($this->tier) {
            'Silver'   => '🥈 Silver',
            'Gold'     => '🥇 Gold',
            'Platinum' => '💎 Platinum',
            default    => '⭐ Normal',
        };
    }

    public function getTierColor(): string
    {
        return match($this->tier) {
            'Silver'   => '#95a5a6',
            'Gold'     => '#f39c12',
            'Platinum' => '#9b59b6',
            default    => '#3498db',
        };
    }

    public function getEconomiePercent(): ?int
    {
        $prixMarche = (float) $this->prix_marche;
        $prixDinari = (float) $this->prix_dinari;

        if (!$prixMarche || !$prixDinari || $prixMarche <= 0) {
            return null;
        }
        return (int) round((($prixMarche - $prixDinari) / $prixMarche) * 100);
    }

    public function getPrixEffectif(): float
    {
        return (float) ($this->prix_dinari ?? $this->prix);
    }

    public function isOffreValide(): bool
    {
        if (!$this->date_fin_offre) return true;
        return $this->date_fin_offre >= new \DateTime('today');
    }

    public function getJoursRestants(): ?int
    {
        if (!$this->date_fin_offre) return null;
        $diff = (new \DateTime('today'))->diff($this->date_fin_offre);
        return $diff->invert ? 0 : (int) $diff->days;
    }

    /** @return Collection<int, Promotion> */
    public function getPromotionsActives(): Collection
    {
        return $this->promotions->filter(function (Promotion $p) {
            if (!$p->isActif()) return false;
            $today = new \DateTime('today');
            if ($p->getDateDebut() && $p->getDateDebut() > $today) return false;
            if ($p->getDateFin()   && $p->getDateFin()   < $today) return false;
            return true;
        });
    }

    public function getPromoEtudiant(): ?Promotion
{
    $promos = $this->getPromotionsActives()->filter(
        fn($p) => $p->getType() === 'etudiant'
    );
    
    if ($promos->isEmpty()) {
        return null;
    }
    
    $first = $promos->first();
    return $first instanceof Promotion ? $first : null;
}
}