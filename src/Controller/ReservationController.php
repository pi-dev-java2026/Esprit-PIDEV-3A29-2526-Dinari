<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class ReservationController extends AbstractController
{
    #[Route('/reservation/offre/{id}/calendar', name: 'app_reservation_calendar', methods: ['GET'])]
    public function calendar(Offre $offre, Request $request): Response
    {
        $selectedDate = $request->query->get('date');

        $timeSlots = [
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
        ];

        return $this->render('reservation/calendar.html.twig', [
            'offre' => $offre,
            'expert' => $offre->getExpertComptable(),
            'selectedDate' => $selectedDate,
            'timeSlots' => $timeSlots,
        ]);
    }

    #[Route('/reservation/offre/{id}', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(
        Offre $offre,
        Request $request,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): Response {
        $reservation = new Reservation();
        $reservation->setOffre($offre);

        $date = $request->query->get('date');
        $time = $request->query->get('time');

        if ($date && $time) {
            $reservationDateTime = new \DateTimeImmutable($date . ' ' . $time);
            $reservation->setDateReservation($reservationDateTime);
        }

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            $expertEmail = $offre->getExpertComptable()?->getEmail();

            try {
                $email = (new Email())
                    ->from(new Address('aziz2822003@gmail.com', 'Plateforme Experts'))
                    ->to($expertEmail)
                    ->subject('TEST réservation depuis formulaire')
                    ->text(
                        "Nouvelle réservation\n\n" .
                        "Client : " . $reservation->getNomClient() . " " . $reservation->getPrenomClient() . "\n" .
                        "Email : " . $reservation->getEmailClient() . "\n" .
                        "Date : " . $reservation->getDateReservation()?->format('Y-m-d H:i') . "\n" .
                        "Expert : " . $expertEmail
                    );

                $mailer->send($email);

                return new Response('MAIL ENVOYE DEPUIS LE FORMULAIRE à : ' . $expertEmail);
            } catch (\Throwable $e) {
                return new Response('ERREUR ENVOI MAIL : ' . $e->getMessage());
            }
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
            'offre' => $offre,
            'expert' => $offre->getExpertComptable(),
            'selectedDate' => $date,
            'selectedTime' => $time,
        ]);
    }

    #[Route('/reservation/confirm/{token}', name: 'app_reservation_confirm', methods: ['GET'])]
    public function confirm(
        string $token,
        EntityManagerInterface $em,
        MailerInterface $mailer
    ): Response {
        $reservation = $em->getRepository(Reservation::class)->findOneBy([
            'token' => $token,
        ]);

        if (!$reservation) {
            return new Response('Réservation introuvable');
        }

        $reservation->setStatut('confirmee');
        $em->flush();

        try {
            $email = (new Email())
                ->from(new Address('aziz2822003@gmail.com', 'Plateforme Experts'))
                ->to($reservation->getEmailClient())
                ->subject('Réservation confirmée')
                ->html(
                    '<h2>Votre réservation a été confirmée ✅</h2>' .
                    '<p>Votre demande de réservation a été acceptée.</p>' .
                    '<p><strong>Date :</strong> ' . $reservation->getDateReservation()?->format('Y-m-d H:i') . '</p>'
                );

            $mailer->send($email);
        } catch (\Throwable $e) {
        }

        return new Response('<h2>Réservation confirmée avec succès ✅</h2>');
    }

    #[Route('/reservation/refuse/{token}', name: 'app_reservation_refuse', methods: ['GET'])]
    public function refuse(
        string $token,
        EntityManagerInterface $em,
        MailerInterface $mailer
    ): Response {
        $reservation = $em->getRepository(Reservation::class)->findOneBy([
            'token' => $token,
        ]);

        if (!$reservation) {
            return new Response('Réservation introuvable');
        }

        $reservation->setStatut('refusee');
        $em->flush();

        try {
            $email = (new Email())
                ->from(new Address('aziz2822003@gmail.com', 'Plateforme Experts'))
                ->to($reservation->getEmailClient())
                ->subject('Réservation refusée')
                ->html(
                    '<h2>Votre réservation a été refusée ❌</h2>' .
                    '<p>Votre demande de réservation n’a pas été acceptée.</p>' .
                    '<p><strong>Date :</strong> ' . $reservation->getDateReservation()?->format('Y-m-d H:i') . '</p>'
                );

            $mailer->send($email);
        } catch (\Throwable $e) {
        }

        return new Response('<h2>Réservation refusée ❌</h2>');
    }

    #[Route('/test-mail', name: 'app_test_mail', methods: ['GET'])]
    public function testMail(MailerInterface $mailer): Response
    {
        try {
            $email = (new Email())
                ->from(new Address('aziz2822003@gmail.com', 'Test Symfony'))
                ->to('jaffelaziz28@gmail.com')
                ->subject('Test Mail Symfony')
                ->text('Si tu vois ce mail, tout fonctionne.');

            $mailer->send($email);

            return new Response('Mail envoyé sans exception');
        } catch (TransportExceptionInterface $e) {
            return new Response('Erreur transport : ' . $e->getMessage());
        } catch (\Throwable $e) {
            return new Response('Erreur générale : ' . $e->getMessage());
        }
    }

    #[Route('/test-dsn', name: 'app_test_dsn', methods: ['GET'])]
    public function testDsn(): Response
    {
        return new Response($_SERVER['MAILER_DSN'] ?? 'MAILER_DSN introuvable');
    }
}