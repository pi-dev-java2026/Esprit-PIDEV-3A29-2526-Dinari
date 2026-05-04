<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Service\BrevoEmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ReservationController extends AbstractController
{
    #[Route('/reservation/offre/{id}/calendar', name: 'app_reservation_calendar', methods: ['GET'])]
    public function calendar(
        Offre $offre,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $selectedDate = $request->query->get('date');
        $expert = $offre->getExpertComptable();

        if ($expert === null) {
            throw $this->createNotFoundException('Expert introuvable pour cette offre.');
        }

        $timeSlots = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00'];
        $reservedSlots = [];

        if (is_string($selectedDate) && $selectedDate !== '') {
            $startOfDay = new \DateTimeImmutable($selectedDate . ' 00:00:00');
            $endOfDay = new \DateTimeImmutable($selectedDate . ' 23:59:59');

            $reservations = $entityManager->getRepository(Reservation::class)
                ->createQueryBuilder('r')
                ->join('r.offre', 'o')
                ->where('o.expertComptable = :expert')
                ->andWhere('r.dateReservation BETWEEN :start AND :end')
                ->andWhere('r.statut NOT IN (:statuts)')
                ->setParameter('expert', $expert)
                ->setParameter('start', $startOfDay)
                ->setParameter('end', $endOfDay)
                ->setParameter('statuts', ['refusee', 'annulee'])
                ->getQuery()
                ->getResult();

            foreach ($reservations as $reservation) {
                if ($reservation instanceof Reservation) {
                    $reservedSlots[] = $reservation->getDateReservation()->format('H:i');
                }
            }
        }

        return $this->render('reservation/calendar.html.twig', [
            'offre' => $offre,
            'expert' => $expert,
            'selectedDate' => $selectedDate,
            'timeSlots' => $timeSlots,
            'reservedSlots' => $reservedSlots,
        ]);
    }

    #[Route('/reservation/offre/{id}', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(
        Offre $offre,
        Request $request,
        EntityManagerInterface $entityManager,
        BrevoEmailService $brevoEmailService,
        HttpClientInterface $httpClient
    ): Response {
        $expert = $offre->getExpertComptable();

        if ($expert === null) {
            throw $this->createNotFoundException('Expert introuvable pour cette offre.');
        }

        $reservation = new Reservation();
        $reservation->setOffre($offre);

        $date = $request->query->get('date');
        $time = $request->query->get('time');

        if (is_string($date) && is_string($time) && $date !== '' && $time !== '') {
            $reservation->setDateReservation(new \DateTimeImmutable($date . ' ' . $time));
        }

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dateReservation = $reservation->getDateReservation();


            if ($reservation->getMode() === 'en_ligne') {
                $reservation->setRoomName('reservation-' . $offre->getId() . '-' . uniqid());
            } else {
                $reservation->setRoomName(null);
            }

            $existingReservation = $entityManager->getRepository(Reservation::class)
                ->createQueryBuilder('r')
                ->join('r.offre', 'o')
                ->where('o.expertComptable = :expert')
                ->andWhere('r.dateReservation = :dateReservation')
                ->andWhere('r.statut NOT IN (:statuts)')
                ->setParameter('expert', $expert)
                ->setParameter('dateReservation', $dateReservation)
                ->setParameter('statuts', ['refusee', 'annulee'])
                ->getQuery()
                ->getOneOrNullResult();

            if ($existingReservation !== null) {
                $this->addFlash('danger', 'Ce créneau est déjà réservé pour cet expert.');

                return $this->redirectToRoute('app_reservation_calendar', [
                    'id' => $offre->getId(),
                    'date' => $dateReservation->format('Y-m-d'),
                ]);
            }

            if (!$reservation->getToken()) {
                $reservation->setToken(bin2hex(random_bytes(32)));
            }

            if (!$reservation->getStatut()) {
                $reservation->setStatut('en_attente');
            }

            $entityManager->persist($reservation);
            $entityManager->flush();

            $expertEmail = $expert->getEmail();

            if ($expertEmail && $reservation->getMode() === 'en_ligne') {
                $risqueAnnulation = 'Non calculé';
                $probabiliteAnnulation = 0;

                try {
                    $clientReservations = $entityManager
                        ->getRepository(Reservation::class)
                        ->findBy(['emailClient' => $reservation->getEmailClient()]);

                    $nbReservations = count($clientReservations);
                    $nbAnnulations = 0;

                    foreach ($clientReservations as $clientReservation) {
                        if ($clientReservation->getStatut() === 'annulee') {
                            $nbAnnulations++;
                        }
                    }

                    $today = new \DateTimeImmutable();
                    $joursAvantRdv = max(0, $today->diff($dateReservation)->days);

                    $response = $httpClient->request('POST', 'http://127.0.0.1:8000/predict-annulation', [
                        'json' => [
                            'nb_reservations' => $nbReservations,
                            'nb_annulations' => $nbAnnulations,
                            'prix' => (float) $offre->getPrix(),
                            'duree' => (int) $offre->getDuree(),
                            'jours_avant_rdv' => $joursAvantRdv,
                            'mode' => 1,
                        ],
                    ]);

                    $result = $response->toArray();

                    $risqueAnnulation = is_string($result['niveau'] ?? null)
                        ? $result['niveau']
                        : 'Non calculé';

                    $probabiliteAnnulation = isset($result['probabilite'])
                        ? (int) round((float) $result['probabilite'] * 100)
                        : 0;
                } catch (\Throwable) {
                    $risqueAnnulation = 'Non disponible';
                    $probabiliteAnnulation = 0;
                }

                $confirmUrl = $this->generateUrl(
                    'app_reservation_confirm',
                    ['token' => $reservation->getToken()],
                    UrlGeneratorInterface::ABSOLUTE_URL
                );

                $refuseUrl = $this->generateUrl(
                    'app_reservation_refuse',
                    ['token' => $reservation->getToken()],
                    UrlGeneratorInterface::ABSOLUTE_URL
                );

                $html = '
                    <h2>Nouvelle demande de réservation en ligne</h2>
                    <p><strong>Client :</strong> ' . $reservation->getNomClient() . ' ' . $reservation->getPrenomClient() . '</p>
                    <p><strong>Email :</strong> ' . $reservation->getEmailClient() . '</p>
                    <p><strong>Téléphone :</strong> ' . $reservation->getTelephoneClient() . '</p>
                    <p><strong>Offre :</strong> ' . $offre->getTitre() . '</p>
                    <p><strong>Date :</strong> ' . $dateReservation->format('d/m/Y H:i') . '</p>
                    <p><strong>Mode :</strong> En ligne</p>
                    <p><strong>Risque d’annulation :</strong> ' . $risqueAnnulation . ' (' . $probabiliteAnnulation . '%)</p>

                    <div style="margin-top: 25px;">
                        <a href="' . $confirmUrl . '" style="padding:12px 18px;background:#28a745;color:white;text-decoration:none;border-radius:8px;font-weight:bold;margin-right:10px;">Confirmer</a>
                        <a href="' . $refuseUrl . '" style="padding:12px 18px;background:#dc3545;color:white;text-decoration:none;border-radius:8px;font-weight:bold;">Refuser</a>
                    </div>
                ';

                try {
                    $brevoEmailService->sendEmail(
                        $expertEmail,
                        'Nouvelle demande de réservation en ligne',
                        $html
                    );
                } catch (\Throwable) {
                }
            }

            return $this->redirectToRoute('app_mes_reservations');
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
            'offre' => $offre,
            'expert' => $expert,
            'selectedDate' => $date,
            'selectedTime' => $time,
        ]);
    }

    #[Route('/reservation/confirm/{token}', name: 'app_reservation_confirm', methods: ['GET'])]
    public function confirm(
        string $token,
        EntityManagerInterface $entityManager,
        BrevoEmailService $brevoEmailService
    ): Response {
        $reservation = $entityManager->getRepository(Reservation::class)->findOneBy(['token' => $token]);

        if (!$reservation instanceof Reservation) {
            return new Response('Réservation introuvable.');
        }

        $offre = $reservation->getOffre();

        if ($offre === null) {
            return new Response('Offre introuvable pour cette réservation.');
        }

        $expert = $offre->getExpertComptable();

        if ($expert === null) {
            return new Response('Expert introuvable pour cette réservation.');
        }

        $dateReservation = $reservation->getDateReservation();


        $reservation->setStatut('confirmee');

        if (!$reservation->getRoomName()) {
            $reservation->setRoomName('reservation-' . $reservation->getId() . '-' . uniqid());
        }

        $entityManager->flush();

        $expertEmail = $expert->getEmail();
        $clientEmail = $reservation->getEmailClient();
        $clientName = trim($reservation->getNomClient() . ' ' . $reservation->getPrenomClient());

        $meetUrl = $this->generateUrl(
            'app_reservation_meet',
            ['token' => $reservation->getToken()],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $htmlExpert = '
            <h2>Réservation confirmée</h2>
            <p>La réservation du client <strong>' . $clientName . '</strong> a bien été confirmée.</p>
            <p><strong>Date :</strong> ' . $dateReservation->format('d/m/Y H:i') . '</p>
            <p><a href="' . $meetUrl . '">Joindre la réunion</a></p>
        ';

        if ($expertEmail && $reservation->getMode() === 'en_ligne') {
            try {
                $brevoEmailService->sendEmail(
                    $expertEmail,
                    'Réservation confirmée - Joindre la réunion',
                    $htmlExpert
                );
            } catch (\Throwable) {
            }
        }

        $htmlClient = '
            <h2>Votre réservation est acceptée ✅</h2>
            <p>Bonjour <strong>' . $clientName . '</strong>,</p>
            <p>Votre réunion avec l\'expert a été <strong>acceptée</strong>.</p>
            <p><strong>Date :</strong> ' . $dateReservation->format('d/m/Y H:i') . '</p>
            <p><strong>Offre :</strong> ' . $offre->getTitre() . '</p>
            <p><a href="' . $meetUrl . '">Rejoindre la réunion</a></p>
        ';

        if ($clientEmail && $reservation->getMode() === 'en_ligne') {
            try {
                $brevoEmailService->sendEmail(
                    $clientEmail,
                    'Votre réservation a été acceptée',
                    $htmlClient
                );
            } catch (\Throwable) {
            }
        }

        return new Response('<h2>Réservation confirmée avec succès</h2><p>Un deuxième email contenant le lien de la réunion a été envoyé.</p>');
    }

    #[Route('/reservation/refuse/{token}', name: 'app_reservation_refuse', methods: ['GET'])]
    public function refuse(
        string $token,
        EntityManagerInterface $entityManager,
        BrevoEmailService $brevoEmailService
    ): Response {
        $reservation = $entityManager->getRepository(Reservation::class)->findOneBy(['token' => $token]);

        if (!$reservation instanceof Reservation) {
            return new Response('Réservation introuvable.');
        }

        $reservation->setStatut('refusee');
        $entityManager->flush();

        $clientEmail = $reservation->getEmailClient();
        $clientName = trim($reservation->getNomClient() . ' ' . $reservation->getPrenomClient());

        $htmlClient = '
            <h2>Votre réservation a été refusée ❌</h2>
            <p>Bonjour <strong>' . $clientName . '</strong>,</p>
            <p>Votre demande de réunion a été <strong>refusée</strong>.</p>
            <p>Vous pouvez choisir une autre date ou une autre offre.</p>
        ';

        if ($clientEmail) {
            try {
                $brevoEmailService->sendEmail(
                    $clientEmail,
                    'Votre réservation a été refusée',
                    $htmlClient
                );
            } catch (\Throwable) {
            }
        }

        return new Response('<h2>Réservation refusée</h2><p>Email envoyé au client.</p>');
    }

    #[Route('/mes-reservations', name: 'app_mes_reservations', methods: ['GET'])]
    public function mesReservations(EntityManagerInterface $entityManager): Response
    {
        $reservations = $entityManager->getRepository(Reservation::class)->findBy([], [
            'dateReservation' => 'DESC',
        ]);

        return $this->render('reservation/mes_reservations.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    #[Route('/reservation/meet/{token}', name: 'app_reservation_meet', methods: ['GET'])]
    public function meet(
        string $token,
        EntityManagerInterface $entityManager
    ): Response {
        $reservation = $entityManager->getRepository(Reservation::class)->findOneBy(['token' => $token]);

        if (
            !$reservation instanceof Reservation ||
            $reservation->getMode() !== 'en_ligne' ||
            !$reservation->getRoomName() ||
            $reservation->getStatut() !== 'confirmee'
        ) {
            throw $this->createNotFoundException('Réunion non disponible.');
        }

        return $this->render('reservation/meet.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/reservation/annuler/{id}', name: 'app_reservation_cancel', methods: ['POST'])]
    public function cancel(
        Reservation $reservation,
        EntityManagerInterface $entityManager,
        BrevoEmailService $brevoEmailService,
        Request $request
    ): Response {
        $token = $request->request->get('_token');
        $token = is_string($token) ? $token : null;

        if (!$this->isCsrfTokenValid('cancel_reservation_' . $reservation->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        if (in_array($reservation->getStatut(), ['refusee', 'annulee'], true)) {
            $this->addFlash('warning', 'Cette réservation ne peut plus être annulée.');

            return $this->redirectToRoute('app_mes_reservations');
        }

        $offre = $reservation->getOffre();

        if ($offre === null) {
            $this->addFlash('danger', 'Offre introuvable pour cette réservation.');

            return $this->redirectToRoute('app_mes_reservations');
        }

        $expert = $offre->getExpertComptable();

        if ($expert === null) {
            $this->addFlash('danger', 'Expert introuvable pour cette réservation.');

            return $this->redirectToRoute('app_mes_reservations');
        }

        $dateReservation = $reservation->getDateReservation();

        

        $reservation->setStatut('annulee');
        $entityManager->flush();

        $expertEmail = $expert->getEmail();
        $expertName = trim($expert->getNom() . ' ' . $expert->getPrenom());
        $clientName = trim($reservation->getNomClient() . ' ' . $reservation->getPrenomClient());

        $htmlExpert = '
            <h2>Réservation annulée</h2>
            <p>Bonjour <strong>' . $expertName . '</strong>,</p>
            <p>Le client <strong>' . $clientName . '</strong> a annulé sa réservation.</p>
            <p><strong>Offre :</strong> ' . $offre->getTitre() . '</p>
            <p><strong>Date :</strong> ' . $dateReservation->format('d/m/Y H:i') . '</p>
            <p><strong>Mode :</strong> ' . $reservation->getMode() . '</p>
        ';

        if ($expertEmail) {
            try {
                $brevoEmailService->sendEmail(
                    $expertEmail,
                    'Réservation annulée par le client',
                    $htmlExpert
                );
            } catch (\Throwable) {
            }
        }

        $this->addFlash('success', 'Votre réservation a été annulée avec succès.');

        return $this->redirectToRoute('app_mes_reservations');
    }
}