<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if ($user->isBlockedByAdmin()) {
            $reason = $user->getBlockReason() ?: 'Aucune raison spécifiée.';
            throw new CustomUserMessageAccountStatusException('Compte bloqué par l\'administrateur : ' . $reason);
        }

        if ($user->getBlockedUntil() && $user->getBlockedUntil() > new \DateTime()) {
            throw new CustomUserMessageAccountStatusException(
                sprintf('Compte temporairement bloqué. Réessayez à %s.', $user->getBlockedUntil()->format('H:i'))
            );
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if ($user->isBlockedByAdmin()) {
            $reason = $user->getBlockReason() ?: 'Aucune raison spécifiée.';
            throw new CustomUserMessageAccountStatusException('Compte bloqué par l\'administrateur : ' . $reason);
        }

        if ($user->getBlockedUntil() && $user->getBlockedUntil() > new \DateTime()) {
            throw new CustomUserMessageAccountStatusException(
                sprintf('Compte temporairement bloqué. Réessayez à %s.', $user->getBlockedUntil()->format('H:i'))
            );
        }
    }
}
