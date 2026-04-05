<?php

namespace App\Repository;

use App\Entity\Quiz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Quiz>
 */
class QuizRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quiz::class);
    }

    /** @return Quiz[] grouped with cours eagerly loaded */
    public function findAllWithCours(): array
    {
        return $this->createQueryBuilder('q')
            ->leftJoin('q.cours', 'c')
            ->addSelect('c')
            ->orderBy('c.nomCours', 'ASC')
            ->addOrderBy('q.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
