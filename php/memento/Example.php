<?php
declare(strict_types=1);

namespace App;

use App\Src\CloseTicketCommand;
use App\Src\Invoker;
use App\Src\Ticket\Ticket;

require_once ("vendor/autoload.php");

$ticket = new Ticket();
$command = new CloseTicketCommand($ticket);

$invoker = new Invoker();
$invoker->setCommand($command);
$invoker->run();

/**
 * Run command
 */

print_r($ticket->getState());

/**
 * Undo command
 */

$command->undo();

print_r($ticket->getState());