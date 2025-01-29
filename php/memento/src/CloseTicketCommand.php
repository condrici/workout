<?php
declare(strict_types=1);

namespace App\Src;

use App\Src\Ticket\TicketStateMemento;
use App\Src\Ticket\Ticket;

class CloseTicketCommand implements Command
{
    private TicketStateMemento $memento;

    public function __construct(public Ticket $receiver)
    {
    }

    public function execute(): void
    {
        $memento = $this->receiver->saveToMemento();
        $this->receiver->close();
        $this->memento = $memento;
    }

    public function undo(): void
    {
        $this->receiver->restoreFromMemento($this->memento);
    }

}