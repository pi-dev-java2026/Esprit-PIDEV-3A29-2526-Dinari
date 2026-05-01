<?php

namespace App\Repository;

use App\Entity\UserConceptProgress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<UserConceptProgress> */
class UserConceptProgressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserConceptProgress::class);
    }

    /**
     * Returns all concept progress records for a session, ordered by level severity.
     *
     * @return UserConceptProgress[]
     */
    public function findBySession(string $sessionId): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.sessionId = :sid')
            ->setParameter('sid', $sessionId)
            ->orderBy('p.wrongCount', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Finds or creates a progress record for a given session + concept pair.
     */
    public function findOrCreate(string $sessionId, string $concept): UserConceptProgress
    {
        $existing = $this->findOneBy(['sessionId' => $sessionId, 'concept' => $concept]);
        if ($existing) {
            return $existing;
        }

        $progress = new UserConceptProgress();
        $progress->setSessionId($sessionId);
        $progress->setConcept($concept);
        return $progress;
    }

    /**
     * Returns only weak/critical concepts for a session.
     *
     * @return UserConceptProgress[]
     */
    public function findWeakConcepts(string $sessionId): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.sessionId = :sid')
            ->andWhere('p.level IN (:levels)')
            ->setParameter('sid', $sessionId)
            ->setParameter('levels', [UserConceptProgress::LEVEL_WEAK, UserConceptProgress::LEVEL_CRITICAL])
            ->orderBy('p.wrongCount', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Returns concepts flagged as repeated weaknesses.
     *
     * @return UserConceptProgress[]
     */
    public function findRepeatedWeaknesses(string $sessionId): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.sessionId = :sid')
            ->andWhere('p.isRepeatedWeakness = true')
            ->setParameter('sid', $sessionId)
            ->orderBy('p.weakQuizStreak', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Returns concept names (strings) for weak/critical concepts — used by RecommendationService.
     *
     * @return string[]
     */
    public function findWeakConceptNames(string $sessionId): array
    {
        $rows = $this->createQueryBuilder('p')
            ->select('p.concept')
            ->where('p.sessionId = :sid')
            ->andWhere('p.level IN (:levels)')
            ->setParameter('sid', $sessionId)
            ->setParameter('levels', [UserConceptProgress::LEVEL_WEAK, UserConceptProgress::LEVEL_CRITICAL])
            ->getQuery()
            ->getScalarResult();

        return array_column($rows, 'concept');
    }
}
