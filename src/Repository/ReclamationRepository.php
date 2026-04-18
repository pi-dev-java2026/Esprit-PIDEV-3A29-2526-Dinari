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

    public function findByUser(string $email): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.email = :email')
            ->setParameter('email', $email)
            ->orderBy('r.id_reclamation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByType(string $type): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.subject LIKE :type') // le type/mot-clé dans le sujet
            ->setParameter('type', '%' . $type . '%')
            ->orderBy('r.id_reclamation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function updateReclamationsByType(string $type, string $reponse): int
    {
        return $this->createQueryBuilder('r')
            ->update()
            ->set('r.reponse', ':reponse')
            ->set('r.statut', ':statut')
            ->andWhere('r.subject LIKE :type')
            ->setParameter('reponse', $reponse)
            ->setParameter('statut', 'Traitée')
            ->setParameter('type', '%' . $type . '%')
            ->getQuery()
            ->execute();
    }
}
