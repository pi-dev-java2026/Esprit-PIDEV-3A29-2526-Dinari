<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;

class ProfileCompletionSubscriber implements EventSubscriberInterface
{
    private Security $security;
    private RouterInterface $router;

    public function __construct(Security $security, RouterInterface $router)
    {
        $this->security = $security;
        $this->router = $router;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $routeName = $request->attributes->get('_route');

        // Allow routes that shouldn't be blocked
        if (
            $routeName === 'app_complete_profile' || 
            $routeName === 'app_face_capture' || 
            $routeName === 'app_logout' || 
            str_starts_with((string)$routeName, '_')
        ) {
            return;
        }

        $user = $this->security->getUser();

        if ($user instanceof User) {
            // Un mot de passe vide est la signature d'un compte OAuth fraichement créé (et incomplet)
            if ($user->getPassword() === '') {
                $url = $this->router->generate('app_complete_profile');
                $event->setResponse(new RedirectResponse($url));
            }
        }
    }
}
