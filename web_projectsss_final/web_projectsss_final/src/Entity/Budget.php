<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BudgetRepository::class)]
#[ORM\Table(name: 'budget')]
class Budget
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    /**
     * DECIMAL(10,2) — stored as string by Doctrine to preserve precision.
     * The DB column is NOT NULL, so this is never null after persist.
     */
    #[ORM\Column(name: 'montant_limite', type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $montantLimite = '0.00';

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $mois = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $annee = null;

    /**
     * Plain integer — no User entity exists yet. Will become a ManyToOne
     * association once authentication is implemented.
     */
    #[ORM\Column(name: 'utilisateur_id', type: Types::INTEGER)]
    private ?int $utilisateurId = null;

    public function getId(): ?int { return $this->id; }

    public function getMontantLimite(): string { return $this->montantLimite; }
    public function setMontantLimite(string $montantLimite): static { $this->montantLimite = $montantLimite; return $this; }

    public function getMois(): ?int { return $this->mois; }
    public function setMois(int $mois): static { $this->mois = $mois; return $this; }

    public function getAnnee(): ?int { return $this->annee; }
    public function setAnnee(int $annee): static { $this->annee = $annee; return $this; }

    public function getUtilisateurId(): ?int { return $this->utilisateurId; }
    public function setUtilisateurId(int $utilisateurId): static { $this->utilisateurId = $utilisateurId; return $this; }

    // Retourne le nom du mois en français
    public function getNomMois(): string
    {
        $mois = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars',
            4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
            7 => 'Juillet', 8 => 'Août', 9 => 'Septembre',
            10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        ];
        return $mois[$this->mois] ?? '';
    }
}
