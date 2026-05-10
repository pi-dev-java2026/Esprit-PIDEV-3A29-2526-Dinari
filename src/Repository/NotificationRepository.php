<?php

namespace App\Repository;

use App\Entity\Notification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<Notification> */
class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }

    /** @return Notification[] */
    public function findBySession(string $sessionId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.sessionId = :sid')
            ->setParameter('sid', $sessionId)
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function countUnread(string $sessionId): int
    {
        return (int) $this->createQueryBuilder('n')
            ->select('COUNT(n.id)')
            ->where('n.sessionId = :sid')
            ->andWhere('n.isRead = false')
            ->setParameter('sid', $sessionId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function markAllRead(string $sessionId): void
    {
        $this->createQueryBuilder('n')
            ->update()
            ->set('n.isRead', 'true')
            ->where('n.sessionId = :sid')
            ->setParameter('sid', $sessionId)
            ->getQuery()
            ->execute();
    }
}
