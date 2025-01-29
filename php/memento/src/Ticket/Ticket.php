<?php
declare(strict_types=1);

namespace App\Src\Ticket;

class Ticket
{
    protected TicketState $currentState;

    public function __construct()
    {
        $this->currentState = new TicketState(TicketState::STATE_CREATED);
    }

    public function open(): void
    {
        $this->currentState = new TicketState(TicketState::STATE_OPENED);
    }

    public function assign(): void
    {
        $this->currentState = new TicketState(TicketState::STATE_ASSIGNED);
    }

    public function close(): void
    {
        $this->currentState = new TicketState(TicketState::STATE_CLOSED);
    }

    public function saveToMemento(): TicketStateMemento
    {
        return new TicketStateMemento(clone $this->currentState);
    }

    public function restoreFromMemento(TicketStateMemento $memento): void
    {
        $this->currentState = $memento->getState();
    }

    public function getState(): TicketState
    {
        return $this->currentState;
    }


}