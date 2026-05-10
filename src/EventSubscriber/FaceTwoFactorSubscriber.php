<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class FaceTwoFactorSubscriber implements EventSubscriberInterface
{
    private UrlGeneratorInterface $urlGenerator;
    private TokenStorageInterface $tokenStorage;

    public function __construct(UrlGeneratorInterface $urlGenerator, TokenStorageInterface $tokenStorage)
    {
        $this->urlGenerator = $urlGenerator;
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess',
            KernelEvents::REQUEST    => ['onKernelRequest', 0], // Higher priority (or default 0) is fine
        ];
    }

    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $user = $event->getUser();

        if (!$user instanceof User) {
            return;
        }

        // If the user has a face image configured, flag them for 2FA validation
        $faceImage = $user->getFace_image();
        if ($faceImage) {
            $event->getRequest()->getSession()->set('face_2fa_pending', true);
            $event->getRequest()->getSession()->set('face_2fa_target', $event->getRequest()->getUri());
        }
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $session = $request->getSession();

        // 1. Are they locked in the 2FA state?
        if ($session->has('face_2fa_pending') && $session->get('face_2fa_pending') === true) {
            
            // Allow access to the verification routes, logout route, and static assets/profiler
            $route = $request->attributes->get('_route');
            $allowedRoutes = ['app_face_verify', 'app_face_compare', 'app_logout', '_wdt', '_profiler'];
            
            // Allow static assets
            if (str_starts_with($request->getPathInfo(), '/css/') || 
                str_starts_with($request->getPathInfo(), '/js/') || 
                str_starts_with($request->getPathInfo(), '/faces/') || 
                str_starts_with($request->getPathInfo(), '/images/')) {
                return;
            }

            if (!in_array($route, $allowedRoutes, true)) {
                $response = new RedirectResponse($this->urlGenerator->generate('app_face_verify'));
                $event->setResponse($response);
            }
        }
    }
}
