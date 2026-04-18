<?php

namespace App\EventListener;

use App\Service\RecaptchaService;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * LoginRecaptchaListener
 *
 * Se déclenche lors de chaque tentative de connexion (CheckPassportEvent).
 * Vérifie le token reCAPTCHA v2 avant de laisser passer l'authentification.
 *
 * Si le CAPTCHA est invalide, une exception d'authentification est levée
 * et Symfony redirige l'utilisateur vers la page de login avec un message d'erreur.
 */
#[AsEventListener(event: CheckPassportEvent::class, priority: 10)]
class LoginRecaptchaListener
{
    public function __construct(
        private readonly RecaptchaService $recaptchaService,
        private readonly RequestStack $requestStack
    ) {}

    public function __invoke(CheckPassportEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();

        if (null === $request) {
            return;
        }

        // On ne vérifie que les requêtes POST sur la route de login
        if (!$request->isMethod('POST')) {
            return;
        }

        $token = $request->request->get('g-recaptcha-response');
        $clientIp = $request->getClientIp();

        if (!$this->recaptchaService->verify($token, $clientIp)) {
            throw new CustomUserMessageAuthenticationException(
                'Veuillez compléter le CAPTCHA "Je ne suis pas un robot".'
            );
        }
    }
}
