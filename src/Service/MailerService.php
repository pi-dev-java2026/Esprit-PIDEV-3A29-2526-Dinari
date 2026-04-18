<?php

namespace App\Service;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private MailerInterface $mailer;
    private \Twig\Environment $twig;

    public function __construct(MailerInterface $mailer, \Twig\Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendResetCode(string $to, string $code): void
    {
        $html = $this->twig->render('emails/reset_password.html.twig', [
            'code' => $code
        ]);

        $email = (new Email())
            ->from('azizsoltani3578@gmail.com')
            ->to($to)
            ->subject('Réinitialisation de votre mot de passe - DINARI')
            ->html($html);

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // Log or handle the exception if necessary
        }
    }
}
