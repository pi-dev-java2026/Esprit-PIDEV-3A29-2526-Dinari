<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\ReservationManager;
use App\Entity\Reservation;
use App\Entity\Offre;

class ReservationManagerTest extends TestCase
{
    private ReservationManager $manager;

    protected function setUp(): void
    {
        $this->manager = new ReservationManager();
    }

    public function testReservationValide(): void
    {
        $reservation = new Reservation();
        $reservation->setEmailClient('test@mail.com');
        $reservation->setDateReservation(new \DateTimeImmutable('+1 day'));

        $offre = new Offre();
        $reservation->setOffre($offre);

        $this->assertTrue($this->manager->validate($reservation));
    }

    public function testEmailInvalide(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $reservation = new Reservation();
        $reservation->setEmailClient('email_invalide');
        $reservation->setDateReservation(new \DateTimeImmutable('+1 day'));

        $offre = new Offre();
        $reservation->setOffre($offre);

        $this->manager->validate($reservation);
    }

    public function testDateDansLePasse(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $reservation = new Reservation();
        $reservation->setEmailClient('test@mail.com');
        $reservation->setDateReservation(new \DateTimeImmutable('-1 day'));

        $offre = new Offre();
        $reservation->setOffre($offre);

        $this->manager->validate($reservation);
    }

    public function testDateMaintenant(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $reservation = new Reservation();
        $reservation->setEmailClient('test@mail.com');
        $reservation->setDateReservation(new \DateTimeImmutable());

        $offre = new Offre();
        $reservation->setOffre($offre);

        $this->manager->validate($reservation);
    }

    public function testEmailVide(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $reservation = new Reservation();
        $reservation->setEmailClient('');
        $reservation->setDateReservation(new \DateTimeImmutable('+1 day'));

        $offre = new Offre();
        $reservation->setOffre($offre);

        $this->manager->validate($reservation);
    }
}