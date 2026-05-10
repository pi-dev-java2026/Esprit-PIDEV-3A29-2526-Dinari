<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, \Symfony\Component\HttpFoundation\Request $request): Response
    {
        // Si déjà connecté, redirige selon le rôle
        if ($this->getUser()) {
            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_user_index');
            }
            return $this->redirectToRoute('app_home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Récupère l'éventuelle erreur de connexion Google stockée en session
        $googleError = null;
        if ($request->hasSession() && $request->getSession()->has('google_auth_error')) {
            $googleError = $request->getSession()->get('google_auth_error');
            $request->getSession()->remove('google_auth_error');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            'google_error'  => $googleError,
            'recaptcha_site_key' => $_ENV['RECAPTCHA_SITE_KEY'],
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Cette méthode n'est jamais exécutée — elle est interceptée par Symfony Security
        throw new \LogicException('This method should not be called directly.');
    }

    #[Route('/complete-profile', name: 'app_complete_profile')]
    public function completeProfile(
        \Symfony\Component\HttpFoundation\Request $request,
        \Doctrine\ORM\EntityManagerInterface $em,
        \Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface $hasher
    ): Response {
        $user = $this->getUser();
        if (!$user instanceof \App\Entity\User) {
            return $this->redirectToRoute('app_login');
        }

        // Si le profil est déjà complet (mot de passe présent)
        if ($user->getPassword() !== '') {
            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_user_index');
            }
            return $this->redirectToRoute('app_home');
        }

        $form = $this->createForm(\App\Form\CompleteProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            if ($plainPassword) {
                $user->setPassword($hasher->hashPassword($user, $plainPassword));
            }

            // Save face image if captured
            $facePath = trim((string) $request->request->get('face_image_path', ''));
            if ($facePath && str_starts_with($facePath, 'faces/') && !str_contains($facePath, '..')) {
                $fullFacePath = $this->getParameter('kernel.project_dir') . '/public/' . $facePath;
                if (file_exists($fullFacePath)) {
                    $user->setFace_image($facePath);
                }
            }

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Votre profil a été complété avec succès !');
            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_user_index');
            }
            return $this->redirectToRoute('app_home');
        }

        return $this->render('security/complete_profile.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        \Symfony\Component\HttpFoundation\Request $request,
        \Doctrine\ORM\EntityManagerInterface $em,
        \Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface $hasher,
        \App\Service\RecaptchaService $recaptchaService
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $user = new \App\Entity\User();
        $user->setRole('User');

        $form = $this->createForm(\App\Form\UserType::class, $user, ['is_new' => true]);
        $form->remove('role');
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // 1. Vérification reCAPTCHA avant toute logique métier
            $recaptchaToken = $request->request->get('g-recaptcha-response');
            if (!$recaptchaService->verify($recaptchaToken, $request->getClientIp())) {
                $this->addFlash('recaptcha_error', 'Veuillez compléter le CAPTCHA "Je ne suis pas un robot".');
                return $this->render('security/register.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            if ($form->isValid()) {
                $plainPassword = $form->get('plainPassword')->getData();
                if ($plainPassword) {
                    $user->setPassword($hasher->hashPassword($user, $plainPassword));
                }

                // Save face image captured during registration
                $facePath = trim((string) $request->request->get('face_image_path', ''));
                if ($facePath && str_starts_with($facePath, 'faces/') && !str_contains($facePath, '..')) {
                    $fullFacePath = $this->getParameter('kernel.project_dir') . '/public/' . $facePath;
                    if (file_exists($fullFacePath)) {
                        $user->setFace_image($facePath);
                    }
                }

                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Route : /connect/google
     *
     * Redirige l'utilisateur vers la page de consentement Google (OAuth2).
     * Les scopes 'email' et 'profile' sont demandés pour récupérer
     * les informations de l'utilisateur après connexion.
     */
    #[Route('/connect/google', name: 'connect_google_start')]
    public function connectGoogle(ClientRegistry $clientRegistry): Response
    {
        // Redirige vers Google avec les scopes configurés dans knpu_oauth2_client.yaml
        return $clientRegistry
            ->getClient('google')
            ->redirect(['openid', 'email', 'profile'], []);
    }

    /**
     * Route : /connect/google/check
     *
     * Cette route est le callback OAuth2 de Google.
     * Elle n'est JAMAIS exécutée directement : elle est interceptée par
     * GoogleAuthenticator::supports() dès que la requête arrive.
     *
     * ⚠️  L'URI de redirection dans Google Cloud Console doit être :
     *     http://localhost:8000/connect/google/check
     */
    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectGoogleCheck(): never
    {
        // Intercepté par GoogleAuthenticator — ce code n'est jamais atteint
        throw new \LogicException('This route is handled by GoogleAuthenticator.');
    }
}
