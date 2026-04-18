<?php

namespace App\Repository;

use App\Entity\Messages;
use App\Entity\Conversations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository pour l'entité Messages.
 * Fournit des méthodes de requête personnalisées.
 */
class MessagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Messages::class);
    }

    /**
     * Récupère les N derniers messages d'une conversation, triés par date.
     *
     * @param Conversations $conversation La conversation cible
     * @param int           $limit        Nombre max de messages à récupérer
     * @return Messages[]
     */
    public function findLastByConversation(Conversations $conversation, int $limit = 10): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.conversation_id = :conv')
            ->setParameter('conv', $conversation)
            ->orderBy('m.date_message', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
