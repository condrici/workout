<?php
declare(strict_types=1);

require_once (__DIR__ ."/../vendor/autoload.php");

use App\CommandBus\Commands\EchoCommand;
use App\CommandBus\Service\InMemoryLogger;
use App\CommandBus\CommandBus;
use App\CommandBus\Middleware\LogCommandBusMiddleware;
use App\CommandBus\Middleware\HandleCommandMiddleware;
use App\CommandBus\Middleware\ValidationCommandBusMiddleware;
use App\CommandBus\Exception\GlobalExceptionHandler;

// Global
$exceptionHandler = new GlobalExceptionHandler();
$exceptionHandler->handleExceptions();

// Commands
$echoCommand      = new EchoCommand();
$inMemoryLogger   = new InMemoryLogger();

$logMiddleware    = new LogCommandBusMiddleware($inMemoryLogger);
$handleMiddleware = new HandleCommandMiddleware();
$validationMiddleware = new ValidationCommandBusMiddleware();

$commandBus = new CommandBus($logMiddleware, $validationMiddleware, $handleMiddleware);

$commandBus($echoCommand);