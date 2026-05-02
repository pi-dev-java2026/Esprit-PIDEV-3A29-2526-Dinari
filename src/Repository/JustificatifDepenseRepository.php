<?php

namespace App\Repository;

use App\Entity\JustificatifDepense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class JustificatifDepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JustificatifDepense::class);
    }

    // Justificatifs liés à une dépense
    public function findByDepense(int $depenseId): array
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.depense = :id')
            ->setParameter('id', $depenseId)
            ->orderBy('j.dateajout', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
