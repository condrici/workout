<?php
declare(strict_types=1);

namespace App\Src\Ticket;

use InvalidArgumentException;

class TicketState
{
    public const STATE_CREATED = 'created';
    public const STATE_OPENED = 'opened';
    public const STATE_ASSIGNED = 'assigned';
    public const STATE_CLOSED = 'closed';

    private array $validStates = [
        self::STATE_CREATED,
        self::STATE_OPENED,
        self::STATE_ASSIGNED,
        self::STATE_CLOSED
    ];

    protected string $state;

    public function __construct(string $state)
    {
        $this->ensuresValidState($state);
        $this->state = $state;
    }

    private function ensuresValidState(string $state): void
    {
        if(!in_array($state, $this->validStates)) {
            throw new InvalidArgumentException('Invalid state given');
        }
    }

    public function __toString(): string
    {
        return $this->state;
    }
}