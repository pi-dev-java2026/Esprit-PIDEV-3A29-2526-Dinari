<?php

namespace App\Repository;

use App\Entity\Paiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

class PaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paiement::class);
    }

    public function findAllWithAbonnement(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.abonnement_id', 'a')
            ->addSelect('a')
            ->leftJoin('a.promotions', 'promo')
            ->addSelect('promo')
            ->orderBy('p.date_paiement', 'DESC')
            ->setMaxResults(50);

        return iterator_to_array(new Paginator($qb, fetchJoinCollection: true));
    }

    public function findByAbonnementId(int $aboId): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.abonnement_id', 'a')
            ->addSelect('a')
            ->andWhere('a.id = :id')
            ->setParameter('id', $aboId)
            ->orderBy('p.date_paiement', 'DESC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }

    public function getTotalRevenus(): float
    {
        $result = $this->createQueryBuilder('p')
            ->select('SUM(p.montant)')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', 'payé')
            ->getQuery()
            ->getSingleScalarResult();

        return (float) ($result ?? 0);
    }
}