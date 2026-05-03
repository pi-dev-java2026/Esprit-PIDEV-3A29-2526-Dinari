<?php

namespace App\Service;

use App\Entity\User;

class UserManager
{
    public function validate(User $user): bool
    {
        if (empty($user->getName())) {
            throw new \InvalidArgumentException('Le nom est obligatoire.');
        }

        if (strlen($user->getName()) < 4) {
            throw new \InvalidArgumentException('Le nom doit contenir au moins 4 caractères.');
        }

        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email invalide.');
        }

        if ($user->getPhone() !== null) {
            if (!preg_match('/^[0-9\+\s\-]+$/', $user->getPhone())) {
                throw new \InvalidArgumentException('Numéro de téléphone invalide.');
            }
            if (strlen($user->getPhone()) < 8) {
                throw new \InvalidArgumentException('Le téléphone doit contenir au moins 8 caractères.');
            }
        }

        if (strlen($user->getPassword()) < 8) {
            throw new \InvalidArgumentException('Le mot de passe doit contenir au moins 8 caractères.');
        }

        if ($user->isBlockedByAdmin()) {
            throw new \InvalidArgumentException('Cet utilisateur est bloqué par l\'administrateur.');
        }

        return true;
    }
}