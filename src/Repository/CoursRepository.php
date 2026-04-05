<?php

namespace App\Repository;

use App\Entity\Cours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cours>
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cours::class);
    }

    /** @return Cours[] */
    public function search(string $q): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.nomCours LIKE :q')
            ->setParameter('q', '%' . $q . '%')
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /** @return Cours[] with chapitres + taches eagerly loaded */
    public function findAllWithTree(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.chapitres', 'ch')
            ->leftJoin('ch.taches', 't')
            ->addSelect('ch', 't')
            ->orderBy('c.id', 'DESC')
            ->addOrderBy('ch.position', 'ASC')
            ->addOrderBy('t.position', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
