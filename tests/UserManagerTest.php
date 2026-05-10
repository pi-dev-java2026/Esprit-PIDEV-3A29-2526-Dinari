<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Service\UserManager;
use PHPUnit\Framework\TestCase;

class UserManagerTest extends TestCase
{
    private UserManager $manager;

    protected function setUp(): void
    {
        $this->manager = new UserManager();
    }

    // ✅ Test 1 : Utilisateur valide
    public function testValidUser(): void
    {
        $user = new User();
        $user->setName('Mohamed Aziz');
        $user->setEmail('aziz@gmail.com');
        $user->setPassword('password123');

        $this->assertTrue($this->manager->validate($user));
    }

    // ❌ Test 2 : Nom vide
    public function testUserWithoutName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le nom est obligatoire.');

        $user = new User();
        $user->setName('');
        $user->setEmail('aziz@gmail.com');
        $user->setPassword('password123');

        $this->manager->validate($user);
    }

    // ❌ Test 3 : Nom trop court
    public function testUserWithShortName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le nom doit contenir au moins 4 caractères.');

        $user = new User();
        $user->setName('Ali');
        $user->setEmail('aziz@gmail.com');
        $user->setPassword('password123');

        $this->manager->validate($user);
    }

    // ❌ Test 4 : Email invalide
    public function testUserWithInvalidEmail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Email invalide.');

        $user = new User();
        $user->setName('Mohamed Aziz');
        $user->setEmail('email_invalide');
        $user->setPassword('password123');

        $this->manager->validate($user);
    }

    // ❌ Test 5 : Téléphone invalide (lettres)
    public function testUserWithInvalidPhone(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Numéro de téléphone invalide.');

        $user = new User();
        $user->setName('Mohamed Aziz');
        $user->setEmail('aziz@gmail.com');
        $user->setPassword('password123');
        $user->setPhone('abc12345');

        $this->manager->validate($user);
    }

    // ❌ Test 6 : Mot de passe trop court
    public function testUserWithShortPassword(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins 8 caractères.');

        $user = new User();
        $user->setName('Mohamed Aziz');
        $user->setEmail('aziz@gmail.com');
        $user->setPassword('123');

        $this->manager->validate($user);
    }

    // ❌ Test 7 : Utilisateur bloqué
    public function testBlockedUser(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Cet utilisateur est bloqué par l\'administrateur.');

        $user = new User();
        $user->setName('Mohamed Aziz');
        $user->setEmail('aziz@gmail.com');
        $user->setPassword('password123');
        $user->setIsBlockedByAdmin(true);

        $this->manager->validate($user);
    }
}