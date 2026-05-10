<?php

namespace App\Service;

use App\Entity\Abonnement;

class AbonnementValidatorService
{
    private const TIERS_VALIDES = ['Normal', 'Silver', 'Gold', 'Platinum'];

    public function validate(Abonnement $abonnement): bool
    {
        // Règle 1 : Prix > 0
        if ($abonnement->getPrix() <= 0) {
            throw new \InvalidArgumentException("Le prix doit être supérieur à 0");
        }

        // Règle 2 : Nom non vide
        if (empty(trim($abonnement->getNom()))) {
            throw new \InvalidArgumentException("Le nom est obligatoire");
        }

        // Règle 3 : Fréquence valide
        if (!in_array($abonnement->getFrequence(), ['mensuel', 'annuel', 'trimestriel', 'hebdomadaire'])) {
            throw new \InvalidArgumentException("Fréquence invalide");
        }

        // Règle 4 : Tier valide
        if (!in_array($abonnement->getTier(), self::TIERS_VALIDES)) {
            throw new \InvalidArgumentException("Tier invalide");
        }

        // Règle 5 : Catégorie non vide
        if (empty(trim($abonnement->getCategorie() ?? ''))) {
            throw new \InvalidArgumentException("La catégorie est obligatoire");
        }

        return true;
    }
}