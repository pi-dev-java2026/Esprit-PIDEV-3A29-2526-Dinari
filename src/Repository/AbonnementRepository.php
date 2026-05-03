<?php

namespace App\Repository;

use App\Entity\Abonnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

class AbonnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abonnement::class);
    }

    /**
     * @return Abonnement[]
     */
    public function findActifs(): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.actif = :actif')
            ->setParameter('actif', true)
            ->orderBy('a.created_at', 'DESC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Abonnement[]
     */
    public function findForAdmin(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.promotions', 'promo')
            ->addSelect('promo')
            ->orderBy('a.created_at', 'DESC')
            ->setMaxResults(50);

        return iterator_to_array(new Paginator($qb, fetchJoinCollection: true));
    }

    /**
     * @return Abonnement[]
     */
    public function search(
        string $q          = '',
        string $tier       = '',
        string $statut     = '',
        string $cat        = '',
        bool   $clientOnly = false
    ): array {
        $qb = $this->createQueryBuilder('a');

        if ($q !== '') {
            $qb->andWhere(
                $qb->expr()->orX(
                    'a.nom         LIKE :q',
                    'a.categorie   LIKE :q',
                    'a.description LIKE :q'
                )
            )->setParameter('q', '%' . $q . '%');
        }

        if ($tier !== '') {
            $qb->andWhere('a.tier = :tier')
               ->setParameter('tier', $tier);
        }

        if ($statut !== '') {
            $qb->andWhere('a.actif = :actif')
               ->setParameter('actif', $statut === 'actif');
        }

        if ($cat !== '') {
            $qb->andWhere('a.categorie = :cat')
               ->setParameter('cat', $cat);
        }

        if ($clientOnly) {
            $qb->andWhere('a.actif = :forceActif')
               ->setParameter('forceActif', true);
        }

        $qb->orderBy('a.created_at', 'DESC');

        return $qb->getQuery()->getResult();
    }

    /**
     * @return array<string, Abonnement[]>
     */
    public function findGroupedByNom(): array
    {
        $abonnements = $this->findActifs();
        $grouped     = [];
        foreach ($abonnements as $abo) {
            $grouped[$abo->getNom()][] = $abo;
        }
        return $grouped;
    }

    /**
     * @return Abonnement[]
     */
    public function findPlansByService(string $nomService, int $excludeId = 0): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.nom LIKE :prefix')
            ->andWhere('a.actif = :actif')
            ->andWhere('a.id != :excludeId')
            ->setParameter('prefix', $nomService . ' %')
            ->setParameter('actif', true)
            ->setParameter('excludeId', $excludeId)
            ->orderBy('a.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function find($id, $lockMode = null, $lockVersion = null): ?Abonnement
    {
        return parent::find($id, $lockMode, $lockVersion);
    }
}