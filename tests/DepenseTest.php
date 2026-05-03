<?php

namespace App\Tests\Service;

use App\Entity\Depense;
use App\Service\DepenseManager;
use PHPUnit\Framework\TestCase;

class DepenseTest extends TestCase
{
    public function testValidDepense()
    {
        $depense = new Depense();
        $depense->setMontant('150');
        $depense->setDescription('Achat nourriture');

        $manager = new DepenseManager();

        $this->assertTrue($manager->validate($depense));
    }

    public function testDepenseWithoutMontant()
    {
        $this->expectException(\InvalidArgumentException::class);

        $depense = new Depense();
        $depense->setDescription('Test description');

        $manager = new DepenseManager();
        $manager->validate($depense);
    }

    public function testDepenseWithNegativeMontant()
    {
        $this->expectException(\InvalidArgumentException::class);

        $depense = new Depense();
        $depense->setMontant('-50');
        $depense->setDescription('Test');

        $manager = new DepenseManager();
        $manager->validate($depense);
    }

    public function testDepenseWithoutDescription()
    {
        $this->expectException(\InvalidArgumentException::class);

        $depense = new Depense();
        $depense->setMontant('100');

        $manager = new DepenseManager();
        $manager->validate($depense);
    }
}