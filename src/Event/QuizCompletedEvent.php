<?php

namespace App\Event;

use App\Entity\QuizResultat;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Dispatched after a quiz attempt is persisted.
 * Listeners/subscribers can react (e.g. create notifications, update stats).
 */
final class QuizCompletedEvent extends Event
{
    public const NAME = 'quiz.completed';

    public function __construct(
        private readonly QuizResultat $resultat,
        private readonly string       $sessionId,
    ) {}

    public function getResultat(): QuizResultat { return $this->resultat; }
    public function getSessionId(): string      { return $this->sessionId; }
}
