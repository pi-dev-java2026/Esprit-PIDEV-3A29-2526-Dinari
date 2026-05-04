<?php

namespace App\Repository;

use App\Entity\HistoriqueDepense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HistoriqueDepense>
 */
class HistoriqueDepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueDepense::class);
    }

    /**
     * Historique client : filtré par utilisateur + optionnellement action/type.
     * @return HistoriqueDepense[]
     */
    public function findForUser(int $userId, ?string $action = null, ?string $type = null): array
    {
        $qb = $this->createQueryBuilder('h')
            ->andWhere('h.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('h.dateAction', 'DESC');

        if ($action) {
            $qb->andWhere('h.action = :action')->setParameter('action', $action);
        }
        if ($type) {
            $qb->andWhere('h.typeRessource = :type')->setParameter('type', $type);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Historique admin global : tous les utilisateurs.
     * @return HistoriqueDepense[]
     */
    public function findFiltered(?string $action = null, ?string $type = null): array
    {
        $qb = $this->createQueryBuilder('h')
            ->orderBy('h.dateAction', 'DESC');

        if ($action) {
            $qb->andWhere('h.action = :action')->setParameter('action', $action);
        }
        if ($type) {
            $qb->andWhere('h.typeRessource = :type')->setParameter('type', $type);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Widget dashboard admin — N dernières entrées toutes ressources.
     * @return HistoriqueDepense[]
     */
    public function findDernieres(int $limit = 5): array
    {
        return $this->createQueryBuilder('h')
            ->orderBy('h.dateAction', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Widget dashboard client — N dernières entrées d'un utilisateur.
     * @return HistoriqueDepense[]
     */
    public function findDernieresForUser(int $userId, int $limit = 5): array
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('h.dateAction', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
