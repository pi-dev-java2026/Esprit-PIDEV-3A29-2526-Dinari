<?php

namespace App\Service;

use App\Entity\Notification;
use App\Entity\QuizResultat;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;

class NotificationService
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly CoursRepository        $coursRepository,
    ) {}

    public function notifyQuizResult(QuizResultat $resultat, string $sessionId): void
    {
        $pct = $resultat->getScorePourcentage();

        if ($pct < 50) {
            $quiz   = $resultat->getQuiz();
            $topics = $quiz ? implode(', ', $quiz->getThemeKeywords()) : '';
            $msg    = sprintf(
                '⚠️ Score de %.0f%% sur "%s". Nous vous recommandons de revoir %s.',
                $pct,
                $quiz?->getTitre() ?? 'ce quiz',
                $topics ?: 'les notions de base'
            );
            $this->create($sessionId, $msg, Notification::TYPE_WARNING);
        } elseif ($pct >= 80) {
            $msg = sprintf(
                '🎉 Excellent ! %.0f%% sur "%s". Passez au niveau supérieur !',
                $pct,
                $resultat->getQuiz()?->getTitre() ?? 'ce quiz'
            );
            $this->create($sessionId, $msg, Notification::TYPE_SUCCESS);
        }
    }

    public function notifyRecommendationsGenerated(string $sessionId, int $count): void
    {
        $msg = sprintf('🎯 %d recommandation(s) personnalisée(s) générée(s) pour vous.', $count);
        $this->create($sessionId, $msg, Notification::TYPE_INFO);
    }

    public function create(string $sessionId, string $message, string $type = Notification::TYPE_INFO): Notification
    {
        $notif = new Notification();
        $notif->setSessionId($sessionId);
        $notif->setMessage($message);
        $notif->setType($type);

        $this->em->persist($notif);
        $this->em->flush();

        return $notif;
    }
}
