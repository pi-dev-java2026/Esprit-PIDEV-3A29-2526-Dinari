<?php

namespace App\Tests;

use App\Entity\Abonnement;
use App\Service\AbonnementValidatorService;
use PHPUnit\Framework\TestCase;

class AbonnementValidatorServiceTest extends TestCase
{
    private AbonnementValidatorService $validator;

    protected function setUp(): void
    {
        $this->validator = new AbonnementValidatorService();
    }

    // TEST 1 : Abonnement valide
    public function testAbonnementValide(): void
    {
        $abonnement = new Abonnement();
        $abonnement->setNom('Spotify Premium');
        $abonnement->setPrix(9.99);
        $abonnement->setPrixMarche(12.99);
        $abonnement->setFrequence('mensuel');
        $abonnement->setTier('Gold');
        $abonnement->setCategorie('musique');

        $result = $this->validator->validate($abonnement);
        $this->assertTrue($result);
    }

    // TEST 2 : Prix négatif
    public function testPrixNegatifLanceException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $abonnement = new Abonnement();
        $abonnement->setNom('Netflix Basic');
        $abonnement->setPrix(-5.00);
        $abonnement->setFrequence('mensuel');
        $abonnement->setTier('Normal');
        $abonnement->setCategorie('streaming');

        $this->validator->validate($abonnement);
    }

    // TEST 3 : Prix zéro
    public function testPrixZeroLanceException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $abonnement = new Abonnement();
        $abonnement->setNom('Netflix Basic');
        $abonnement->setPrix(0);
        $abonnement->setFrequence('mensuel');
        $abonnement->setTier('Normal');
        $abonnement->setCategorie('streaming');

        $this->validator->validate($abonnement);
    }

    // TEST 4 : Nom vide
    public function testNomVideLanceException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $abonnement = new Abonnement();
        $abonnement->setNom('');
        $abonnement->setPrix(9.99);
        $abonnement->setFrequence('mensuel');
        $abonnement->setTier('Normal');
        $abonnement->setCategorie('streaming');

        $this->validator->validate($abonnement);
    }

    // TEST 5 : Tier invalide
    public function testTierInvalideLanceException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $abonnement = new Abonnement();
        $abonnement->setNom('Disney Plus');
        $abonnement->setPrix(7.99);
        $abonnement->setFrequence('mensuel');
        $abonnement->setTier('Diamond');
        $abonnement->setCategorie('streaming');

        $this->validator->validate($abonnement);
    }

    // TEST 6 : Catégorie vide
    public function testCategorieVideLanceException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $abonnement = new Abonnement();
        $abonnement->setNom('YouTube Premium');
        $abonnement->setPrix(11.99);
        $abonnement->setFrequence('mensuel');
        $abonnement->setTier('Gold');
        $abonnement->setCategorie('');

        $this->validator->validate($abonnement);
    }
}