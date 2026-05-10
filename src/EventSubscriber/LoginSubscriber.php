<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class LoginSubscriber implements EventSubscriberInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LoginFailureEvent::class => 'onLoginFailure',
            LoginSuccessEvent::class => 'onLoginSuccess',
        ];
    }

    public function onLoginFailure(LoginFailureEvent $event): void
    {
        $passport = $event->getPassport();
        if (!$passport) {
            return;
        }

        $user = $passport->getUser();
        if (!$user instanceof User) {
            return;
        }

        // Increment failed attempts
        $attempts = $user->getFailedAttempts() + 1;
        $user->setFailedAttempts($attempts);

        if ($attempts >= 3) {
            $user->setBlockedUntil((new \DateTime())->modify('+60 minutes'));
            $user->setFailedAttempts(0); // Reset for when the block expires
        }

        $this->em->flush();
    }

    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $user = $event->getUser();
        if (!$user instanceof User) {
            return;
        }

        if ($user->getFailedAttempts() > 0 || $user->getBlockedUntil() !== null) {
            $user->setFailedAttempts(0);
            $user->setBlockedUntil(null);
            $this->em->flush();
        }
    }
}
