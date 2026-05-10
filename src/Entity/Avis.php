<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
#[ORM\Table(name: 'avi')]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
        
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Paiement::class)]
    #[ORM\JoinColumn(name: 'paiement_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Paiement $paiement = null;

    #[ORM\ManyToOne(targetEntity: Abonnement::class)]
    #[ORM\JoinColumn(name: 'abonnement_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Abonnement $abonnement = null;

    #[ORM\Column(type: 'string', length: 100)]
private string $nom_client; 
    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $email_client = null;

    #[ORM\Column(type: 'text')]
private string $commentaire;     // au lieu de ?string

    #[ORM\Column(type: 'integer')]
    private int $note = 5; // Note de 1 à 5

    #[ORM\Column(type: 'datetime')]
private \DateTimeInterface $date_cretion;  // au lieu de ?\DateTimeInterface

    #[ORM\Column(type: 'boolean')]
    private bool $approuve = false; // Modération

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $couleur_avatar = null; // Couleur pour l'avatar

    public function __construct()
    {
        $this->date_cretion = new \DateTime();
        $this->note = 5;
        $this->approuve = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaiement(): ?Paiement
    {
        return $this->paiement;
    }

    public function setPaiement(?Paiement $paiement): static
    {
        $this->paiement = $paiement;
        return $this;
    }

    public function getAbonnement(): ?Abonnement
    {
        return $this->abonnement;
    }

    public function setAbonnement(?Abonnement $abonnement): static
    {
        $this->abonnement = $abonnement;
        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nom_client;
    }

    public function setNomClient(string $nom_client): static
    {
        $this->nom_client = $nom_client;
        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->email_client;
    }

    public function setEmailClient(?string $email_client): static
    {
        $this->email_client = $email_client;
        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getNote(): int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = max(1, min(5, $note));
        return $this;
    }

    public function getDateCretion(): ?\DateTimeInterface
    {
        return $this->date_cretion;
    }

    public function setDateCretion(\DateTimeInterface $date_cretion): static
    {
        $this->date_cretion = $date_cretion;
        return $this;
    }

    public function isApprouve(): bool
    {
        return $this->approuve;
    }

    public function setApprouve(bool $approuve): static
    {
        $this->approuve = $approuve;
        return $this;
    }

    public function getCouleurAvatar(): ?string
    {
        return $this->couleur_avatar;
    }

    public function setCouleurAvatar(?string $couleur_avatar): static
    {
        $this->couleur_avatar = $couleur_avatar;
        return $this;
    }

    public function getInitiales(): string
    {
        $parts = explode(' ', trim($this->nom_client ?? ''));
        $initiales = '';
        foreach ($parts as $part) {
            if (!empty($part)) {
                $initiales .= strtoupper($part[0]);
            }
        }
        return substr($initiales, 0, 2);
    }
}
