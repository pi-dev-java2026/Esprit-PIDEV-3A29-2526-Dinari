<?php

namespace App\Repository;

use App\Entity\Depense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Depense::class);
    }

    // Toutes les dépenses d'un utilisateur
    public function findByUtilisateur(int $userId): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.utilisateurId = :uid')
            ->setParameter('uid', $userId)
            ->orderBy('d.dateDepense', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // Total des dépenses par catégorie pour un utilisateur
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

    // Total SUM(montant) pour un utilisateur
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

    // Dépenses du mois en cours
    public function findDuMois(int $userId): array
    {
        $debut = new \DateTime('first day of this month');
        $fin   = new \DateTime('last day of this month');

        return $this->createQueryBuilder('d')
            ->andWhere('d.utilisateurId = :uid')
            ->andWhere('d.dateDepense BETWEEN :debut AND :fin')
            ->setParameter('uid', $userId)
            ->setParameter('debut', $debut)
            ->setParameter('fin', $fin)
            ->orderBy('d.dateDepense', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
