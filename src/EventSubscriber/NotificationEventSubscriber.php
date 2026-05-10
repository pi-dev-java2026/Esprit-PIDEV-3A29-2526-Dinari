<?php

namespace App\EventSubscriber;

use App\Event\QuizCompletedEvent;
use App\Event\RecommendationsGeneratedEvent;
use App\Service\ConceptWeaknessService;
use App\Service\NotificationService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listens to domain events and creates in-app notifications accordingly.
 * Also triggers behavioral AI analysis after each quiz completion.
 */
class NotificationEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly NotificationService    $notificationService,
        private readonly ConceptWeaknessService $conceptWeaknessService,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            QuizCompletedEvent::NAME           => 'onQuizCompleted',
            RecommendationsGeneratedEvent::NAME => 'onRecommendationsGenerated',
        ];
    }

    public function onQuizCompleted(QuizCompletedEvent $event): void
    {
        $resultat  = $event->getResultat();
        $sessionId = $event->getSessionId();

        // 1. Notification
        $this->notificationService->notifyQuizResult($resultat, $sessionId);

        // 2. Behavioral AI — concept_answers is always set by saveResult()
        $conceptAnswers = $resultat->getConceptAnswers();
        if (!empty($conceptAnswers)) {
            $this->conceptWeaknessService->recordQuizAnswers($sessionId, $conceptAnswers);
        }
    }

    public function onRecommendationsGenerated(RecommendationsGeneratedEvent $event): void
    {
        $this->notificationService->notifyRecommendationsGenerated(
            $event->getSessionId(),
            $event->getCount()
        );
    }
}
