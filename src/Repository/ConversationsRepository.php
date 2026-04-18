<?php

namespace App\Repository;

use App\Entity\Conversations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository pour l'entité Conversations.
 * Fournit des méthodes de requête personnalisées.
 */
class ConversationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conversations::class);
    }

    /**
     * Trouve la dernière conversation d'un utilisateur par email.
     */
    public function findLastByUserEmail(string $email): ?Conversations
    {
        return $this->createQueryBuilder('c')
            ->where('c.user_email = :email')
            ->setParameter('email', $email)
            ->orderBy('c.date_creation', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
