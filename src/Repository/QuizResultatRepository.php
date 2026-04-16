<?php

namespace App\Repository;

use App\Entity\QuizResultat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<QuizResultat> */
class QuizResultatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizResultat::class);
    }

    /**
     * Returns all quiz results for a given session, with quiz and cours eagerly loaded.
     *
     * @return QuizResultat[]
     */
    public function findBySession(string $sessionId): array
    {
        return $this->createQueryBuilder('r')
            ->join('r.quiz', 'q')
            ->leftJoin('q.cours', 'c')
            ->addSelect('q', 'c')
            ->where('r.sessionId = :sid')
            ->setParameter('sid', $sessionId)
            ->orderBy('r.datePassage', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Returns the IDs of courses whose quizzes the session has already attempted.
     *
     * @return int[]
     */
    public function findAttemptedCoursIds(string $sessionId): array
    {
        $rows = $this->createQueryBuilder('r')
            ->select('DISTINCT IDENTITY(q.cours) AS coursId')
            ->join('r.quiz', 'q')
            ->where('r.sessionId = :sid')
            ->andWhere('q.cours IS NOT NULL')
            ->setParameter('sid', $sessionId)
            ->getQuery()
            ->getScalarResult();

        return array_filter(array_column($rows, 'coursId'));
    }

    /**
     * Returns the average score percentage for a session across all attempts.
     */
    public function getAverageScore(string $sessionId): float
    {
        $results = $this->findBySession($sessionId);
        if (empty($results)) return 0.0;

        $total = array_sum(array_map(fn($r) => $r->getScorePourcentage(), $results));
        return round($total / count($results), 1);
    }

    /**
     * Total number of quiz attempts across all sessions.
     */
    public function countAll(): int
    {
        return (int) $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Global average score across all sessions.
     */
    public function getGlobalAverageScore(): float
    {
        $results = $this->findAll();
        if (empty($results)) return 0.0;
        $total = array_sum(array_map(fn($r) => $r->getScorePourcentage(), $results));
        return round($total / count($results), 1);
    }

    /**
     * Returns the most common weak topics across all sessions.
     * Returns array of ['topic' => string, 'count' => int] sorted by count desc.
     *
     * @return array<array{topic: string, count: int}>
     */
    public function findGlobalWeakTopics(float $threshold = 50.0): array
    {
        $results     = $this->findAll();
        $topicScores = [];

        foreach ($results as $result) {
            $quiz = $result->getQuiz();
            if (!$quiz) continue;

            $keywords = $quiz->getThemeKeywords();
            if ($quiz->getCours()) {
                $keywords = array_merge($keywords, $quiz->getCours()->getThemeKeywords());
            }
            $keywords = array_unique($keywords);

            foreach ($keywords as $kw) {
                if (!isset($topicScores[$kw])) {
                    $topicScores[$kw] = ['total' => 0, 'count' => 0];
                }
                $topicScores[$kw]['total'] += $result->getScorePourcentage();
                $topicScores[$kw]['count']++;
            }
        }

        $weak = [];
        foreach ($topicScores as $kw => $data) {
            $avg = $data['total'] / $data['count'];
            if ($avg < $threshold) {
                $weak[] = ['topic' => $kw, 'count' => $data['count']];
            }
        }

        usort($weak, fn($a, $b) => $b['count'] <=> $a['count']);
        return $weak;
    }

    /**
     * Returns weak topic keywords (themes where average score < $threshold%).
     *
     * @return string[]
     */
    public function findWeakTopics(string $sessionId, float $threshold = 50.0): array
    {
        $results = $this->findBySession($sessionId);
        $topicScores = [];

        foreach ($results as $result) {
            $quiz = $result->getQuiz();
            if (!$quiz) continue;

            $keywords = $quiz->getThemeKeywords();
            // Also inherit themes from the linked course
            if ($quiz->getCours()) {
                $keywords = array_merge($keywords, $quiz->getCours()->getThemeKeywords());
            }
            $keywords = array_unique($keywords);

            foreach ($keywords as $kw) {
                if (!isset($topicScores[$kw])) {
                    $topicScores[$kw] = ['total' => 0, 'count' => 0];
                }
                $topicScores[$kw]['total'] += $result->getScorePourcentage();
                $topicScores[$kw]['count']++;
            }
        }

        $weak = [];
        foreach ($topicScores as $kw => $data) {
            $avg = $data['total'] / $data['count'];
            if ($avg < $threshold) {
                $weak[] = $kw;
            }
        }

        return $weak;
    }
}
