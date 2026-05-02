<?php

namespace App\Repository;

use App\Entity\ModePaiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ModePaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModePaiement::class);
    }

    public function findAllOrderedByLabel(): array
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.label', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function labelExiste(string $label, ?int $excludeId = null): bool
    {
        $qb = $this->createQueryBuilder('m')
            ->select('COUNT(m.id)')
            ->andWhere('LOWER(m.label) = LOWER(:label)')
            ->setParameter('label', $label);

        if ($excludeId) {
            $qb->andWhere('m.id != :excludeId')->setParameter('excludeId', $excludeId);
        }

        return (int) $qb->getQuery()->getSingleScalarResult() > 0;
    }

    public function countDepenses(int $modeId): int
    {
        return (int) $this->createQueryBuilder('m')
            ->select('COUNT(d.id)')
            ->join('m.depenses', 'd')
            ->andWhere('m.id = :id')
            ->setParameter('id', $modeId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
