<?php
declare(strict_types=1);

namespace App\Src\Ticket;

class TicketStateMemento
{
    public function __construct(private TicketState $state)
    {
    }

    public function getState(): TicketState
    {
        return $this->state;
    }
}