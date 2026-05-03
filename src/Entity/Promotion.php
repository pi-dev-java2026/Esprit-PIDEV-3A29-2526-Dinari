<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\PromotionRepository::class)]
#[ORM\Table(name: 'promotion')]
class Promotion
{
    // Types disponibles
    const TYPE_ETUDIANT  = 'etudiant';
    const TYPE_FAMILLE   = 'famille';
    const TYPE_FIDELITE  = 'fidelite';
    const TYPE_LIMITEE   = 'limitee';

    const TYPES = [
        'etudiant' => '🎓 Tarif étudiant',
        'famille'  => '👨‍👩‍👧 Pack familial',
        'fidelite' => '🔄 Fidélité',
        'limitee'  => '🎁 Offre limitée',
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    /** @phpstan-ignore-next-line property.unusedType */
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Abonnement::class, inversedBy: 'promotions')]
    #[ORM\JoinColumn(name: 'abonnement_id', referencedColumnName: 'id', onDelete: 'CASCADE', nullable: false)]
    private ?Abonnement $abonnement = null;

    #[ORM\Column(type: 'string', length: 30)]
    private string $type = self::TYPE_LIMITEE;

    #[ORM\Column(type: 'string', length: 100)]
    private string $label = '';

    #[ORM\Column(type: 'integer')]
    private int $reduction_pct = 0;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $conditions = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $actif = true;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    // ── GETTERS / SETTERS ────────────────────────────────────────────────────

    public function getId(): ?int { return $this->id; }

    public function getAbonnement(): ?Abonnement { return $this->abonnement; }
    public function setAbonnement(?Abonnement $abonnement): self { $this->abonnement = $abonnement; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }

    public function getLabel(): string { return $this->label; }
    public function setLabel(string $label): self { $this->label = $label; return $this; }

    public function getReductionPct(): int { return $this->reduction_pct; }
    public function setReductionPct(int $pct): self { $this->reduction_pct = $pct; return $this; }

    public function getConditions(): ?string { return $this->conditions; }
    public function setConditions(?string $conditions): self { $this->conditions = $conditions; return $this; }

    public function getDateDebut(): ?\DateTimeInterface { return $this->date_debut; }
    public function setDateDebut(?\DateTimeInterface $date): self { $this->date_debut = $date; return $this; }

    public function getDateFin(): ?\DateTimeInterface { return $this->date_fin; }
    public function setDateFin(?\DateTimeInterface $date): self { $this->date_fin = $date; return $this; }

    public function isActif(): bool { return $this->actif; }
    public function setActif(bool $actif): self { $this->actif = $actif; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->created_at; }

    // ── HELPERS MÉTIER ───────────────────────────────────────────────────────

    /**
     * Calcule le prix après réduction
     */
    public function getPrixApresReduction(float $prixBase): float
    {
        return round($prixBase * (1 - $this->reduction_pct / 100), 2);
    }

    /**
     * Label complet avec emoji selon le type
     */
    public function getTypeLabel(): string
    {
        return self::TYPES[$this->type] ?? $this->type;
    }

    /**
     * Couleur associée au type (pour l'UI)
     */
    public function getTypeColor(): string
    {
        return match($this->type) {
            'etudiant' => '#1a6fc4',
            'famille'  => '#27ae60',
            'fidelite' => '#f39c12',
            'limitee'  => '#e74c3c',
            default    => '#8a9bb5',
        };
    }

    /**
     * Vérifie si la promotion est encore valide aujourd'hui
     */
    public function isValide(): bool
    {
        if (!$this->actif) return false;
        $today = new \DateTime('today');
        if ($this->date_debut && $this->date_debut > $today) return false;
        if ($this->date_fin   && $this->date_fin   < $today) return false;
        return true;
    }

    /**
     * Jours restants avant expiration
     * 
     * @return int|null
     */
    public function getJoursRestants(): ?int
    {
        if (!$this->date_fin) return null;
        $diff = (new \DateTime('today'))->diff($this->date_fin);
        $days = $diff->invert ? 0 : $diff->days;
        return $days !== false ? (int) $days : null;
    }
}