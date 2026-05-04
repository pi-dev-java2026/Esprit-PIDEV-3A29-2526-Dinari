<?php

namespace App\Repository;

use App\Entity\ExpertComptable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpertComptable>
 */
class ExpertComptableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpertComptable::class);
    }
    /**
    * @return ExpertComptable[]
    */

    public function findByFilters(?string $search, ?string $specialite, ?string $tri): array
    {
        $qb = $this->createQueryBuilder('e');

        if (!empty($search)) {
            $qb->andWhere(
                'e.nom LIKE :search
                OR e.prenom LIKE :search
                OR e.specialite LIKE :search
                OR e.description LIKE :search'
            )
            ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($specialite)) {
            $qb->andWhere('e.specialite = :specialite')
               ->setParameter('specialite', $specialite);
        }

        if ($tri === 'experience_desc') {
            $qb->orderBy('e.experience', 'DESC');
        } elseif ($tri === 'experience_asc') {
            $qb->orderBy('e.experience', 'ASC');
        } else {
            $qb->orderBy('e.id', 'DESC');
        }

        return $qb->getQuery()->getResult();
    }
    /**
    * @return ExpertComptable[]
    */

    public function findByAdminFilters(?string $search, ?string $specialite): array
    {
        $qb = $this->createQueryBuilder('e');

        if (!empty($search)) {
            $qb->andWhere(
                'e.nom LIKE :search
                OR e.prenom LIKE :search
                OR e.email LIKE :search
                OR e.specialite LIKE :search'
            )
            ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($specialite)) {
            $qb->andWhere('e.specialite = :specialite')
               ->setParameter('specialite', $specialite);
        }

        return $qb->orderBy('e.id', 'DESC')
                  ->getQuery()
                  ->getResult();
    }
    /**
    * @return array<int, array<string, mixed>>
    */
    public function getExpertsStatistics(): array
{
    return $this->createQueryBuilder('e')
        ->leftJoin('e.offres', 'o')
        ->leftJoin('App\Entity\Reservation', 'r', 'WITH', 'r.offre = o')
        ->select('
            e.id AS id,
            e.nom AS nom,
            e.prenom AS prenom,
            e.email AS email,
            e.specialite AS specialite,
            COUNT(DISTINCT o.id) AS nombreOffres,
            COUNT(r.id) AS nombreReservations,
            SUM(CASE WHEN r.statut = :confirmee THEN 1 ELSE 0 END) AS reservationsConfirmees,
            SUM(CASE WHEN r.statut = :enAttente THEN 1 ELSE 0 END) AS reservationsEnAttente,
            SUM(CASE WHEN r.statut = :refusee THEN 1 ELSE 0 END) AS reservationsRefusees
        ')
        ->setParameter('confirmee', 'confirmee')
        ->setParameter('enAttente', 'en_attente')
        ->setParameter('refusee', 'refusee')
        ->groupBy('e.id')
        ->orderBy('nombreReservations', 'DESC')
        ->getQuery()
        ->getResult();
}
}