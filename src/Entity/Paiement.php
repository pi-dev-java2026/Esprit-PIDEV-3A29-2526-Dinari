<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Ignore;

#[ORM\Entity(repositoryClass: \App\Repository\PaiementRepository::class)]
#[ORM\Table(name: 'paiement')]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    
    private ?int $id = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $montant;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $date_paiement;

    #[ORM\Column(type: 'string', length: 20)]
    private string $statut = 'en_attente';

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $nom_titulaire = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $prenom_titulaire = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $mode_paiement = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $numero_carte = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private ?string $date_expiration = null;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    #[Ignore]  // ← empêche l'exposition en JSON/API
    private ?string $cvv = null;

    // Dans Paiement.php
#[ORM\ManyToOne(targetEntity: Abonnement::class, inversedBy: 'paiements')]
#[ORM\JoinColumn(name: 'abonnement_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
private ?Abonnement $abonnement_id = null;
    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $created_at;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $stripe_transaction_id = null;

    public function __construct()
    {
        $this->created_at    = new \DateTime();
        $this->date_paiement = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getMontant(): string { return $this->montant; }
    public function setMontant(string $montant): self { $this->montant = $montant; return $this; }

    public function getDatePaiement(): \DateTimeInterface { return $this->date_paiement; }
    public function setDatePaiement(\DateTimeInterface $date): self { $this->date_paiement = $date; return $this; }

    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $statut): self { $this->statut = $statut; return $this; }

    public function getNomTitulaire(): ?string { return $this->nom_titulaire; }
    public function setNomTitulaire(?string $nom): self { $this->nom_titulaire = $nom; return $this; }

    public function getPrenomTitulaire(): ?string { return $this->prenom_titulaire; }
    public function setPrenomTitulaire(?string $prenom): self { $this->prenom_titulaire = $prenom; return $this; }

    public function getModePaiement(): ?string { return $this->mode_paiement; }
    public function setModePaiement(?string $mode): self { $this->mode_paiement = $mode; return $this; }

    public function getNumeroCarte(): ?string { return $this->numero_carte; }
    public function setNumeroCarte(?string $numero): self { $this->numero_carte = $numero; return $this; }

    public function getDateExpiration(): ?string { return $this->date_expiration; }
    public function setDateExpiration(?string $date): self { $this->date_expiration = $date; return $this; }

    public function getCvv(): ?string { return $this->cvv; }

    // ← #[SensitiveParameter] empêche le CVV d'apparaître dans les stack traces
    public function setCvv(#[\SensitiveParameter] ?string $cvv): self
    {
        $this->cvv = $cvv;
        return $this;
    }

    public function getAbonnementId(): ?Abonnement { return $this->abonnement_id; }

    public function setAbonnementId(?Abonnement $abonnement): self
    {
        $this->abonnement_id = $abonnement;
        return $this;
    }

    /** @deprecated Utilisez getAbonnementId() à la place */
    public function getAbonnement_id(): ?Abonnement { return $this->abonnement_id; }

    /** @deprecated Utilisez setAbonnementId() à la place */
    public function setAbonnement_id(?Abonnement $value): self
    {
        $this->abonnement_id = $value;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(\DateTimeInterface $dt): self { $this->created_at = $dt; return $this; }

    public function getStripeTransactionId(): ?string { return $this->stripe_transaction_id; }
    public function setStripeTransactionId(?string $id): self { $this->stripe_transaction_id = $id; return $this; }

    public function isPayé(): bool { return $this->statut === 'payé'; }

    public function getStatutBadge(): string
    {
        return match($this->statut) {
            'payé'      => '<span style="color:#27ae60;font-weight:700;">✓ Payé</span>',
            'échoué'    => '<span style="color:#e74c3c;font-weight:700;">✗ Échoué</span>',
            'remboursé' => '<span style="color:#f39c12;font-weight:700;">↩ Remboursé</span>',
            default     => '<span style="color:#7f8c8d;font-weight:700;">⏳ En attente</span>',
        };
    }
}