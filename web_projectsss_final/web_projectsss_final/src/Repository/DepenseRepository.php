<?php

namespace App\Repository;

use App\Entity\Depense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Depense>
 */
class DepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Depense::class);
    }

    /**
     * Toutes les dépenses d'un utilisateur — paginées, zéro N+1.
     *
     * @param int $userId  Filtre par utilisateur
     * @param int $limit   Taille de page (défaut 20)
     * @param int $offset  Décalage — passer ($page - 1) * $limit (défaut 0)
     * @return Depense[]
     */
    public function findByUtilisateur(int $userId, int $limit = 20, int $offset = 0): array
    {
        $qb = $this->createQueryBuilder('d')
            ->addSelect('c', 'mp')
            ->leftJoin('d.categorie', 'c')
            ->leftJoin('d.modePaiement', 'mp')
            ->addSelect('j')
            ->leftJoin('d.justificatifs', 'j')
            ->andWhere('d.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('d.dateDepense', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        $paginator = new Paginator($qb->getQuery(), fetchJoinCollection: true);

        return iterator_to_array($paginator, false);
    }

    /**
     * Total des dépenses par catégorie pour un utilisateur.
     * @return array<int, array<string, mixed>>
     */
    public function totalParCategorie(int $userId): array
    {
        return $this->createQueryBuilder('d')
            ->join('d.categorie', 'c')
            ->select('c.label AS categorie, SUM(d.montant) AS total')
            ->andWhere('d.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->groupBy('c.id')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getTotalParUtilisateur(int $userId): float
    {
        $result = $this->createQueryBuilder('d')
            ->select('SUM(d.montant) AS total')
            ->andWhere('d.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->getQuery()
            ->getSingleScalarResult();

        return (float) ($result ?? 0);
    }

    /**
     * Dépenses du mois en cours.
     * @return Depense[]
     */
    public function findDuMois(int $userId, int $limit = 100): array
    {
        $debut = new \DateTime('first day of this month');
        $fin   = new \DateTime('last day of this month');

        return $this->createQueryBuilder('d')
            ->addSelect('c', 'mp')
            ->leftJoin('d.categorie', 'c')
            ->leftJoin('d.modePaiement', 'mp')
            ->andWhere('d.utilisateurId = :uid')
            ->andWhere('d.dateDepense BETWEEN :debut AND :fin')
            ->setParameter('uid', $userId)
            ->setParameter('debut', $debut)
            ->setParameter('fin', $fin)
            ->orderBy('d.dateDepense', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
