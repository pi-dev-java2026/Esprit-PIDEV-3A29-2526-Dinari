<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

/**
 * Redirige les utilisateurs après connexion selon leur rôle :
 *  - Admin  → page de gestion des utilisateurs (interface admin)
 *  - Autres → page d'accueil publique
 */
class LoginRedirectSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly RouterInterface $router)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess',
        ];
    }

    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $roles = $event->getAuthenticatedToken()->getRoleNames();

        if (in_array('ROLE_ADMIN', $roles, true)) {
            $response = new RedirectResponse($this->router->generate('app_user_index'));
        } else {
            $response = new RedirectResponse($this->router->generate('app_home'));
        }

        $event->setResponse($response);
    }
}
