<?php

namespace App\EventSubscriber;

use App\Event\QuizCompletedEvent;
use App\Event\RecommendationsGeneratedEvent;
use App\Service\NotificationService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listens to domain events and creates in-app notifications accordingly.
 */
class NotificationEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly NotificationService $notificationService,
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
        $this->notificationService->notifyQuizResult(
            $event->getResultat(),
            $event->getSessionId()
        );
    }

    public function onRecommendationsGenerated(RecommendationsGeneratedEvent $event): void
    {
        $this->notificationService->notifyRecommendationsGenerated(
            $event->getSessionId(),
            $event->getCount()
        );
    }
}
