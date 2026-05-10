<?php

namespace App\Service;

use App\Entity\Reservation;

class ReservationManager
{
    public function validate(Reservation $reservation): bool
    {
        // 1. Email valide
        if (
            !$reservation->getEmailClient() ||
            !filter_var($reservation->getEmailClient(), FILTER_VALIDATE_EMAIL)
        ) {
            throw new \InvalidArgumentException('Email invalide');
        }

        // 2. Date obligatoire
        if (!$reservation->getDateReservation()) {
            throw new \InvalidArgumentException('Date obligatoire');
        }

        // 3. Date doit être future
        if ($reservation->getDateReservation() <= new \DateTimeImmutable()) {
            throw new \InvalidArgumentException('La date doit être dans le futur');
        }

        // 4. Offre obligatoire (même si normalement toujours présente)
        if (!$reservation->getOffre()) {
            throw new \InvalidArgumentException('Offre obligatoire');
        }

        return true;
    }
}