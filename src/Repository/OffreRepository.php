<?php

namespace App\Repository;

use App\Entity\Offre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\ExpertComptable;


/**
 * @extends ServiceEntityRepository<Offre>
 */
class OffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offre::class);
    }
    /**
     * @return Offre[]
     */
    public function findByFilters(ExpertComptable $expert, ?string $search, ?string $prixMax, ?string $dureeMax, ?string $tri): array
{
    $qb = $this->createQueryBuilder('o')
        ->andWhere('o.expertComptable = :expert')
        ->setParameter('expert', $expert);

    if (!empty($search)) {
        $qb->andWhere('o.titre LIKE :search OR o.description LIKE :search')
           ->setParameter('search', '%' . $search . '%');
    }

    if (!empty($prixMax)) {
        $qb->andWhere('o.prix <= :prixMax')
           ->setParameter('prixMax', $prixMax);
    }

    if (!empty($dureeMax)) {
        $qb->andWhere('o.duree <= :dureeMax')
           ->setParameter('dureeMax', $dureeMax);
    }

    if ($tri === 'prix_asc') {
        $qb->orderBy('o.prix', 'ASC');
    } elseif ($tri === 'prix_desc') {
        $qb->orderBy('o.prix', 'DESC');
    } elseif ($tri === 'duree_asc') {
        $qb->orderBy('o.duree', 'ASC');
    } elseif ($tri === 'duree_desc') {
        $qb->orderBy('o.duree', 'DESC');
    } else {
        $qb->orderBy('o.id', 'DESC');
    }

    return $qb->getQuery()->getResult();
}

    //    /**
    //     * @return Offre[] Returns an array of Offre objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Offre
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
