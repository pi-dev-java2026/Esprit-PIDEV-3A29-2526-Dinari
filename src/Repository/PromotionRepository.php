<?php

namespace App\Repository;

use App\Entity\Abonnement;
use App\Entity\Promotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PromotionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Promotion::class);
    }

    public function find($id, $lockMode = null, $lockVersion = null): ?Promotion
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

    /**
     * Retourne les promotions actives pour un abonnement donné,
     * dont la date de début est passée et la date de fin n'est pas encore atteinte.
     *
     * @return Promotion[]
     */
    public function findActiveByAbonnement(Abonnement $abonnement): array
    {
        $today = new \DateTime('today');

        return $this->createQueryBuilder('p')
            ->where('p.abonnement = :abo')
            ->andWhere('p.actif = :actif')
            ->andWhere('p.date_debut <= :today OR p.date_debut IS NULL')
            ->andWhere('p.date_fin >= :today OR p.date_fin IS NULL')
            ->setParameter('abo',   $abonnement)
            ->setParameter('actif', true)
            ->setParameter('today', $today)
            ->orderBy('p.reduction_pct', 'DESC')
            ->getQuery()
            ->getResult();
    }
}