<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Avis>
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    /**
     * Récupère les avis approuvés, triés par date décroissante
     */
    public function findApprovesOrderByDate(int $limit = null)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.approuve = true')
            ->orderBy('a.date_cretion', 'DESC');
        
        if ($limit) {
            $qb->setMaxResults($limit);
        }
        
        return $qb->getQuery()->getResult();
    }

    /**
     * Récupère les avis pour un abonnement spécifique
     */
    public function findByAbonnement($abonnement, int $limit = null)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.abonnement = :abonnement')
            ->andWhere('a.approuve = true')
            ->setParameter('abonnement', $abonnement)
            ->orderBy('a.date_cretion', 'DESC');
        
        if ($limit) {
            $qb->setMaxResults($limit);
        }
        
        return $qb->getQuery()->getResult();
    }

    /**
     * Récupère les avis non approuvés (modération)
     */
    public function findNotApproved()
    {
        return $this->createQueryBuilder('a')
            ->where('a.approuve = false')
            ->orderBy('a.date_cretion', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
