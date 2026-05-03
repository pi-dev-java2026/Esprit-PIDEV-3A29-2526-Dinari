<?php

namespace App\Repository;

use App\Entity\Depense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

class DepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Depense::class);
    }

    /**
     * Toutes les dépenses d'un utilisateur — paginées, zéro N+1.
     *
     * Relations chargées en une seule passe :
     *   - d.categorie    (ManyToOne) → addSelect + leftJoin
     *   - d.modePaiement (ManyToOne) → addSelect + leftJoin
     *   - d.justificatifs (OneToMany) → addSelect + leftJoin via Paginator
     *
     * Pourquoi Paginator(fetchJoinCollection: true) ?
     *   Un JOIN sur une collection OneToMany multiplie les lignes SQL
     *   (1 ligne par paire Depense × Justificatif). Un LIMIT brut couperait
     *   au milieu d'une collection. Paginator résout ça en deux requêtes :
     *     1. Sous-requête qui applique LIMIT/OFFSET sur les IDs de Depense.
     *     2. Requête principale qui charge toutes les données pour ces IDs.
     *
     * @param int $userId  Filtre par utilisateur
     * @param int $limit   Taille de page (défaut 20)
     * @param int $offset  Décalage — passer ($page - 1) * $limit (défaut 0)
     * @return Depense[]
     */
    public function findByUtilisateur(int $userId, int $limit = 20, int $offset = 0): array
    {
        $qb = $this->createQueryBuilder('d')
            // ── ManyToOne : chargés en JOIN simple (pas de collection → pas de doublon) ──
            ->addSelect('c', 'mp')
            ->leftJoin('d.categorie', 'c')
            ->leftJoin('d.modePaiement', 'mp')
            // ── OneToMany : géré par Paginator pour éviter le LIMIT incorrect ──
            ->addSelect('j')
            ->leftJoin('d.justificatifs', 'j')
            ->andWhere('d.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('d.dateDepense', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        // fetchJoinCollection: true → active la stratégie deux-requêtes de Paginator
        // pour que LIMIT s'applique sur Depense et non sur les lignes jointes.
        $paginator = new Paginator($qb->getQuery(), fetchJoinCollection: true);

        return iterator_to_array($paginator, false);
    }

    /**
     * Total des dépenses par catégorie pour un utilisateur.
     * Requête d'agrégation pure — pas de collection, pas de N+1 possible.
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

    /**
     * Total SUM(montant) pour un utilisateur.
     */
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
     * Dépenses du mois en cours — relations ManyToOne chargées en JOIN,
     * LIMIT ajouté pour éviter le warning "ORDER BY sans LIMIT".
     *
     * Pas de Paginator ici car il n'y a pas de JOIN sur une collection
     * OneToMany : un LIMIT direct est correct et suffisant.
     *
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
