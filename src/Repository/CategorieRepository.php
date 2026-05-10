<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    /** @return Categorie[] */
    public function findAllOrderedByLabel(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.label', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function labelExiste(string $label, ?int $excludeId = null): bool
    {
        $qb = $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->andWhere('LOWER(c.label) = LOWER(:label)')
            ->setParameter('label', $label);

        if ($excludeId) {
            $qb->andWhere('c.id != :excludeId')->setParameter('excludeId', $excludeId);
        }

        return (int) $qb->getQuery()->getSingleScalarResult() > 0;
    }

    public function countDepenses(int $categorieId): int
    {
        return (int) $this->createQueryBuilder('c')
            ->select('COUNT(d.id)')
            ->join('c.depenses', 'd')
            ->andWhere('c.id = :id')
            ->setParameter('id', $categorieId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
