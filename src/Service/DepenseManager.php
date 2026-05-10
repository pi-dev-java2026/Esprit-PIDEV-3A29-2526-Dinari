<?php

namespace App\Service;

use App\Entity\Depense;

class DepenseManager
{
    public function validate(Depense $depense): bool
    {
        // Vérifier que le montant est obligatoire
        if (empty($depense->getMontant())) {
            throw new \InvalidArgumentException('Le montant est obligatoire');
        }

        // Vérifier que le montant est positif
        if ((float)$depense->getMontant() <= 0) {
            throw new \InvalidArgumentException('Le montant doit être positif');
        }

        // Vérifier que la description est obligatoire
        if (empty($depense->getDescription())) {
            throw new \InvalidArgumentException('La description est obligatoire');
        }

        return true;
    }
}