<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Dispatched after recommendations are computed for a session.
 */
final class RecommendationsGeneratedEvent extends Event
{
    public const NAME = 'recommendations.generated';

    public function __construct(
        private readonly string $sessionId,
        private readonly int    $count,
    ) {}

    public function getSessionId(): string { return $this->sessionId; }
    public function getCount(): int        { return $this->count; }
}
