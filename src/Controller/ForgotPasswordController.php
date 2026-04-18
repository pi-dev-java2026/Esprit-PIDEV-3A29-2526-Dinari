<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CodeType;
use App\Form\ForgotPasswordEmailType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/forgot-password')]
class ForgotPasswordController extends AbstractController
{
    #[Route('', name: 'app_forgot_password_email')]
    public function enterEmail(Request $request, UserRepository $userRepository, EntityManagerInterface $em, MailerService $mailer, \App\Service\RecaptchaService $recaptchaService): Response
    {
        $form = $this->createForm(ForgotPasswordEmailType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // Vérification reCAPTCHA
            $recaptchaToken = $request->request->get('g-recaptcha-response');
            if (!$recaptchaService->verify($recaptchaToken, $request->getClientIp())) {
                $this->addFlash('danger', 'Veuillez compléter le CAPTCHA "Je ne suis pas un robot".');
                return $this->render('forgot_password/email.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            if ($form->isValid()) {
                $email = $form->get('email')->getData();
                $user = $userRepository->findOneBy(['email' => $email]);

                if ($user) {
                    // Generate 6 digit code
                    $code = sprintf('%06d', mt_rand(100000, 999999));
                    
                    // Set code and expiration (10 minutes)
                    $user->setReset_code($code);
                    $user->setResetExpiration((new \DateTime())->modify('+10 minutes'));
                    
                    $em->flush();

                    // Send email
                    $mailer->sendResetCode($user->getEmail(), $code);

                    // Save email in session to carry over to next steps
                    $request->getSession()->set('reset_email', $email);

                    $this->addFlash('success', 'Un code de réinitialisation a été envoyé à votre adresse email.');
                    return $this->redirectToRoute('app_forgot_password_code');
                } else {
                    $this->addFlash('danger', 'Aucun compte associé à cette adresse email.');
                }
            }
        }

        return $this->render('forgot_password/email.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/code', name: 'app_forgot_password_code')]
    public function enterCode(Request $request, UserRepository $userRepository): Response
    {
        $session = $request->getSession();
        $email = $session->get('reset_email');

        if (!$email) {
            return $this->redirectToRoute('app_forgot_password_email');
        }

        $form = $this->createForm(CodeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $code = $form->get('code')->getData();
            $user = $userRepository->findOneBy(['email' => $email]);

            if ($user && $user->getReset_code() === $code) {
                if ($user->getResetExpiration() !== null && $user->getResetExpiration() > new \DateTime()) {
                    // Valid code and not expired
                    $session->set('reset_code_verified', true);
                    return $this->redirectToRoute('app_forgot_password_reset');
                } else {
                    $this->addFlash('danger', 'Le code de réinitialisation a expiré.');
                }
            } else {
                $this->addFlash('danger', 'Code de réinitialisation incorrect.');
            }
        }

        return $this->render('forgot_password/code.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/reset', name: 'app_forgot_password_reset')]
    public function resetPassword(Request $request, UserRepository $userRepository, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher, \App\Service\RecaptchaService $recaptchaService): Response
    {
        $session = $request->getSession();
        $email = $session->get('reset_email');
        $isVerified = $session->get('reset_code_verified');

        if (!$email || !$isVerified) {
            return $this->redirectToRoute('app_forgot_password_email');
        }

        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // Vérification reCAPTCHA
            $recaptchaToken = $request->request->get('g-recaptcha-response');
            if (!$recaptchaService->verify($recaptchaToken, $request->getClientIp())) {
                $this->addFlash('danger', 'Veuillez compléter le CAPTCHA "Je ne suis pas un robot".');
                return $this->render('forgot_password/reset.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            if ($form->isValid()) {
                $user = $userRepository->findOneBy(['email' => $email]);

                if ($user) {
                    $newPassword = $form->get('password')->getData();
                    $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                    
                    $user->setPassword($hashedPassword);
                    $user->setReset_code(null);
                    $user->setResetExpiration(null);
                    
                    $em->flush();

                    // Clean session
                    $session->remove('reset_email');
                    $session->remove('reset_code_verified');

                    $this->addFlash('success', 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter.');
                    return $this->redirectToRoute('app_login');
                }
            }
        }

        return $this->render('forgot_password/reset.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
