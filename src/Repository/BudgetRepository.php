<?php

namespace App\Repository;

use App\Entity\Budget;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Budget>
 */
class BudgetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Budget::class);
    }

    /**
     * Tous les budgets d'un utilisateur, triés par année/mois DESC.
     * @return Budget[]
     */
    public function findByUtilisateur(int $userId): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('b.annee', 'DESC')
            ->addOrderBy('b.mois', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBudgetDuMois(int $userId, int $mois, int $annee): ?Budget
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.utilisateurId = :uid')
            ->andWhere('b.mois = :mois')
            ->andWhere('b.annee = :annee')
            ->setParameter('uid', $userId)
            ->setParameter('mois', $mois)
            ->setParameter('annee', $annee)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function existePourMois(int $userId, int $mois, int $annee, ?int $excludeId = null): bool
    {
        $qb = $this->createQueryBuilder('b')
            ->select('COUNT(b.id)')
            ->andWhere('b.utilisateurId = :uid')
            ->andWhere('b.mois = :mois')
            ->andWhere('b.annee = :annee')
            ->setParameter('uid', $userId)
            ->setParameter('mois', $mois)
            ->setParameter('annee', $annee);

        if ($excludeId) {
            $qb->andWhere('b.id != :excludeId')->setParameter('excludeId', $excludeId);
        }

        return (int) $qb->getQuery()->getSingleScalarResult() > 0;
    }

    public function getTotalDepenses(int $userId, int $mois, int $annee): float
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT COALESCE(SUM(montant), 0) as total
            FROM depense
            WHERE utilisateur_id = :uid
              AND MONTH(date_depense) = :mois
              AND YEAR(date_depense)  = :annee
        ';

        $result = $conn->executeQuery($sql, [
            'uid'   => $userId,
            'mois'  => $mois,
            'annee' => $annee,
        ]);

        return (float) $result->fetchOne();
    }

    /**
     * Retourne budget + total dépenses + pourcentage pour un mois.
     * @return array<string, mixed>|null
     */
    public function getBudgetAvecConsommation(int $userId, int $mois, int $annee): ?array
    {
        $budget = $this->findBudgetDuMois($userId, $mois, $annee);
        if (!$budget) {
            return null;
        }

        $totalDepenses = $this->getTotalDepenses($userId, $mois, $annee);
        $limite        = (float) $budget->getMontantLimite();
        $pourcentage   = $limite > 0 ? min(round(($totalDepenses / $limite) * 100, 1), 100) : 0;
        $depasse       = $totalDepenses > $limite;
        $restant       = max($limite - $totalDepenses, 0);

        return [
            'budget'        => $budget,
            'totalDepenses' => $totalDepenses,
            'limite'        => $limite,
            'pourcentage'   => $pourcentage,
            'depasse'       => $depasse,
            'restant'       => $restant,
        ];
    }
}
