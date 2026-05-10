<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Reservation;
use App\Entity\User;
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
                ->setParameter('expert', $offre->getExpertComptable())
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
            'expert' => $offre->getExpertComptable(),
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
        $reservation = new Reservation();
        $reservation->setOffre($offre);

        $user = $this->getUser();
        if ($user instanceof User) {
            $reservation->setUser($user);
        }

        $date = $request->query->get('date');
        $time = $request->query->get('time');

        if (is_string($date) && is_string($time) && $date !== '' && $time !== '') {
            $reservation->setDateReservation(new \DateTimeImmutable($date . ' ' . $time));
        }

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($reservation->getMode() === 'en_ligne') {
                $roomName = 'reservation-' . $offre->getId() . '-' . uniqid();
                $reservation->setRoomName($roomName);
            } else {
                $reservation->setRoomName(null);
            }

            $existingReservation = $entityManager->getRepository(Reservation::class)
                ->createQueryBuilder('r')
                ->join('r.offre', 'o')
                ->where('o.expertComptable = :expert')
                ->andWhere('r.dateReservation = :dateReservation')
                ->andWhere('r.statut NOT IN (:statuts)')
                ->setParameter('expert', $offre->getExpertComptable())
                ->setParameter('dateReservation', $reservation->getDateReservation())
                ->setParameter('statuts', ['refusee', 'annulee'])
                ->getQuery()
                ->getOneOrNullResult();

            if ($existingReservation instanceof Reservation) {
                $this->addFlash('danger', 'Ce créneau est déjà réservé pour cet expert.');

                return $this->redirectToRoute('app_reservation_calendar', [
                    'id' => $offre->getId(),
                    'date' => $reservation->getDateReservation()->format('Y-m-d'),
                ]);
            }

            $entityManager->persist($reservation);
            $entityManager->flush();

            $expert = $offre->getExpertComptable();
            $expertEmail = $expert->getEmail();
            $expertName = trim($expert->getNom() . ' ' . $expert->getPrenom());

            if ($expertEmail !== null && $expertEmail !== '' && $reservation->getMode() === 'en_ligne') {
                $risqueAnnulation = 'Non calculé';
                $probabiliteAnnulation = 0;

                try {
                    $clientReservations = [];

                    if ($user instanceof User) {
                        $clientReservations = $entityManager
                            ->getRepository(Reservation::class)
                            ->findBy(['user' => $user]);
                    }

                    $nbReservations = count($clientReservations);
                    $nbAnnulations = 0;

                    foreach ($clientReservations as $clientReservation) {
                        if ($clientReservation instanceof Reservation && $clientReservation->getStatut() === 'annulee') {
                            $nbAnnulations++;
                        }
                    }

                    $today = new \DateTimeImmutable();
                    $joursAvantRdv = max(0, $today->diff($reservation->getDateReservation())->days);

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

                    if (isset($result['niveau']) && is_string($result['niveau'])) {
                        $risqueAnnulation = $result['niveau'];
                    }

                    if (isset($result['probabilite']) && is_numeric($result['probabilite'])) {
                        $probabiliteAnnulation = (int) round((float) $result['probabilite'] * 100);
                    }
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
                    <p><strong>Date :</strong> ' . $reservation->getDateReservation()->format('d/m/Y H:i') . '</p>
                    <p><strong>Mode :</strong> En ligne</p>

                    <p>
                        <strong>Risque d’annulation :</strong>
                        <span style="display:inline-block;padding:8px 12px;border-radius:8px;background:#fff3cd;color:#856404;font-weight:bold;">
                            ' . $risqueAnnulation . ' (' . $probabiliteAnnulation . '%)
                        </span>
                    </p>

                    <p>
                        <a href="' . $confirmUrl . '" style="display:inline-block;padding:12px 18px;background:#16a34a;color:white;text-decoration:none;border-radius:8px;font-weight:bold;">
                            Confirmer
                        </a>

                        <a href="' . $refuseUrl . '" style="display:inline-block;padding:12px 18px;background:#dc2626;color:white;text-decoration:none;border-radius:8px;font-weight:bold;margin-left:10px;">
                            Refuser
                        </a>
                    </p>
                ';

                try {
                    $brevoEmailService->sendEmail(
                        $expertEmail,
                        $expertName,
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
            'expert' => $offre->getExpertComptable(),
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

        $reservation->setStatut('confirmee');
        $entityManager->flush();

        $offre = $reservation->getOffre();
        $expert = $offre->getExpertComptable();

        $expertEmail = $expert->getEmail();
        $expertName = trim($expert->getNom() . ' ' . $expert->getPrenom());

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
            <p><strong>Date :</strong> ' . $reservation->getDateReservation()->format('d/m/Y H:i') . '</p>
            <div style="margin-top: 25px;">
                <a href="' . $meetUrl . '" style="display:inline-block;padding:12px 18px;background:#1f6fbe;color:white;text-decoration:none;border-radius:8px;font-weight:bold;">
                    Joindre la réunion
                </a>
            </div>
        ';

        if ($expertEmail !== null && $expertEmail !== '' && $reservation->getMode() === 'en_ligne') {
            try {
                $brevoEmailService->sendEmail(
                    $expertEmail,
                    $expertName,
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
            <p><strong>Date :</strong> ' . $reservation->getDateReservation()->format('d/m/Y H:i') . '</p>
            <p><strong>Offre :</strong> ' . $offre->getTitre() . '</p>
            <div style="margin-top: 25px;">
                <a href="' . $meetUrl . '" style="display:inline-block;padding:12px 18px;background:#28a745;color:white;text-decoration:none;border-radius:8px;font-weight:bold;">
                    Rejoindre la réunion
                </a>
            </div>
        ';

        if ($clientEmail !== null && $clientEmail !== '' && $reservation->getMode() === 'en_ligne') {
            try {
                $brevoEmailService->sendEmail(
                    $clientEmail,
                    $clientName,
                    'Votre réservation a été acceptée',
                    $htmlClient
                );
            } catch (\Throwable) {
            }
        }

        return new Response('<h2>Réservation confirmée avec succès</h2><p>Un email contenant le lien de la réunion a été envoyé.</p>');
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

        if ($clientEmail !== '') {
            try {
                $brevoEmailService->sendEmail(
                    $clientEmail,
                    $clientName,
                    'Votre réservation a été refusée',
                    $htmlClient
                );
            } catch (\Throwable) {
            }
        }

        return new Response('<h2>Réservation refusée</h2><p>Email envoyé au client.</p>');
    }

    #[Route('/mes-reservations', name: 'app_mes_reservations')]
    public function mesReservations(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        $reservations = [];

        if ($user instanceof User) {
            $reservations = $entityManager->getRepository(Reservation::class)->findBy([
                'user' => $user,
            ]);
        }

        return $this->render('client/mes_reservations.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    #[Route('/reservation/meet/{token}', name: 'app_reservation_meet')]
    public function meet(
        string $token,
        EntityManagerInterface $entityManager
    ): Response {
        $reservation = $entityManager->getRepository(Reservation::class)->findOneBy(['token' => $token]);

        if (
            !$reservation instanceof Reservation ||
            $reservation->getMode() !== 'en_ligne' ||
            $reservation->getRoomName() === null ||
            $reservation->getRoomName() === '' ||
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
        $user = $this->getUser();

        if (!$user instanceof User || $reservation->getUser() !== $user) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas annuler cette réservation.');
        }

        $csrfToken = $request->request->get('_token');

        if (!is_string($csrfToken) || !$this->isCsrfTokenValid('cancel_reservation_' . $reservation->getId(), $csrfToken)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        if (in_array($reservation->getStatut(), ['refusee', 'annulee'], true)) {
            $this->addFlash('warning', 'Cette réservation ne peut plus être annulée.');

            return $this->redirectToRoute('app_mes_reservations');
        }

        $reservation->setStatut('annulee');
        $entityManager->flush();

        $offre = $reservation->getOffre();
        $expert = $offre->getExpertComptable();

        $expertEmail = $expert->getEmail();
        $expertName = trim($expert->getNom() . ' ' . $expert->getPrenom());

        $clientName = trim($reservation->getNomClient() . ' ' . $reservation->getPrenomClient());

        $htmlExpert = '
            <h2>Réservation annulée</h2>
            <p>Bonjour <strong>' . $expertName . '</strong>,</p>
            <p>Le client <strong>' . $clientName . '</strong> a annulé sa réservation.</p>
            <p><strong>Offre :</strong> ' . $offre->getTitre() . '</p>
            <p><strong>Date :</strong> ' . $reservation->getDateReservation()->format('d/m/Y H:i') . '</p>
            <p><strong>Mode :</strong> ' . $reservation->getMode() . '</p>
        ';

        if ($expertEmail !== ''){
            try {
                $brevoEmailService->sendEmail(
                    $expertEmail,
                    $expertName,
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