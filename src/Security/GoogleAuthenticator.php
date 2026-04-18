<?php

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

/**
 * GoogleAuthenticator
 *
 * Intercepte la route /connect/google/check (callback OAuth2 Google).
 * - Récupère l'access token depuis Google
 * - Obtient le profil de l'utilisateur (email, nom, etc.)
 * - Crée l'utilisateur en base s'il n'existe pas encore
 * - Connecte l'utilisateur via le système Symfony Security
 */
class GoogleAuthenticator extends OAuth2Authenticator implements AuthenticationEntrypointInterface
{
    public function __construct(
        private ClientRegistry $clientRegistry,
        private EntityManagerInterface $entityManager,
        private RouterInterface $router,
        private UserRepository $userRepository,
    ) {
    }

    /**
     * Détermine si cet authenticator doit gérer la requête courante.
     * Il s'active uniquement sur la route de callback Google.
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_google_check';
    }

    /**
     * Authentifie l'utilisateur à partir du token OAuth2 fourni par Google.
     */
    public function authenticate(Request $request): Passport
    {
        // Récupère le client Google configuré dans knpu_oauth2_client.yaml
        $client = $this->clientRegistry->getClient('google');

        // Échange le "code" d'autorisation contre un access token
        $accessToken = $this->fetchAccessToken($client);

        return new SelfValidatingPassport(
            new UserBadge($accessToken->getToken(), function () use ($accessToken, $client) {
                /** @var GoogleUser $googleUser */
                $googleUser = $client->fetchUserFromToken($accessToken);

                $email = $googleUser->getEmail();

                // 1. Cherche l'utilisateur existant par son email Google
                $existingUser = $this->userRepository->findOneBy(['email' => $email]);

                if ($existingUser) {
                    // L'utilisateur existe déjà : on le retourne directement
                    return $existingUser;
                }

                // 2. L'utilisateur n'existe pas : on le crée automatiquement
                $newUser = new User();
                $newUser->setEmail($email);

                // Récupère le nom complet depuis Google
                // Si le nom est trop court (< 4 chars, validation min), on utilise la partie avant @
                $googleName = $googleUser->getName() ?? '';
                if (strlen($googleName) < 4) {
                    $googleName = explode('@', $email)[0]; // ex: "aziz.ben" depuis "aziz.ben@gmail.com"
                    // On s'assure qu'il fait au moins 4 caractères
                    if (strlen($googleName) < 4) {
                        $googleName = str_pad($googleName, 4, '_');
                    }
                }
                $newUser->setName($googleName);

                // Pas de mot de passe pour les comptes Google — connexion uniquement via OAuth2
                $newUser->setPassword(''); // champ requis en base mais non utilisé

                // Rôle standard pour les nouveaux inscrits via Google
                $newUser->setRole('User');

                $this->entityManager->persist($newUser);
                $this->entityManager->flush();

                return $newUser;
            })
        );
    }

    /**
     * Appelé après une authentification réussie.
     * Redirige vers le dashboard de l'utilisateur connecté.
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Redirige selon le rôle de l'utilisateur connecté
        if (in_array('ROLE_ADMIN', $token->getRoleNames())) {
            return new RedirectResponse($this->router->generate('app_user_index'));
        }
        return new RedirectResponse($this->router->generate('app_home'));
    }

    /**
     * Appelé si l'authentification échoue (ex: l'utilisateur a refusé l'accès Google).
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());

        // Stocke le message d'erreur en session pour l'afficher sur la page de login
        $request->getSession()->set('google_auth_error', $message);

        return new RedirectResponse($this->router->generate('app_login'));
    }

    /**
     * Point d'entrée : redirige vers /login si l'utilisateur n'est pas authentifié
     * et tente d'accéder à une ressource protégée.
     */
    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new RedirectResponse(
            $this->router->generate('app_login'),
            Response::HTTP_TEMPORARY_REDIRECT
        );
    }
}
