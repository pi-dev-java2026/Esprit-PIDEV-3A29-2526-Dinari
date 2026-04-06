<?php

namespace App\Repository;

use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

    public function findBySearch(?string $search, ?string $userEmail = null, string $sort = 'recent'): array
    {
        $qb = $this->createQueryBuilder('r');

        if ($search) {
            $qb->where('(r.email LIKE :search OR r.subject LIKE :search OR r.description LIKE :search)')
               ->setParameter('search', '%' . $search . '%');
        }

        if ($userEmail) {
            $qb->andWhere('r.email = :userEmail')
               ->setParameter('userEmail', $userEmail);
        }

        switch ($sort) {
            case 'oldest':  $qb->orderBy('r.id_reclamation', 'ASC'); break;
            case 'attente': $qb->orderBy('r.statut', 'ASC'); break;
            case 'recent':
            default:        $qb->orderBy('r.id_reclamation', 'DESC'); break;
        }

        return $qb->getQuery()->getResult();
    }
}
