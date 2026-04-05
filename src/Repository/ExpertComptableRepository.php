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
}