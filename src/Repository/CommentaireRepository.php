<?php

namespace App\Repository;

use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commentaire>
 */
class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }

    /**
     * @return Commentaire[]
     */
    public function findBySlug(string $slug): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.coursSlug = :slug')
            ->setParameter('slug', $slug)
            ->orderBy('c.dateCreation', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
    }
}
