<?php
declare(strict_types=1);

require_once (__DIR__ ."/../vendor/autoload.php");

use App\CommandBus\Commands\EchoCommand;
use App\CommandBus\Service\InMemoryLogger;
use App\CommandBus\CommandBus;
use App\CommandBus\Middleware\LogCommandBusMiddleware;
use App\CommandBus\Middleware\HandleCommandMiddleware;

// Commands
$echoCommand      = new EchoCommand();
$inMemoryLogger   = new InMemoryLogger();

$logMiddleware    = new LogCommandBusMiddleware($inMemoryLogger);
$handleMiddleware = new HandleCommandMiddleware();

$commandBus = new CommandBus($logMiddleware, $handleMiddleware);
$commandBus($echoCommand);

// Check that middlewares worked
var_dump($inMemoryLogger->getLog());