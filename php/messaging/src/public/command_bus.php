<?php
declare(strict_types=1);

require_once (__DIR__ ."/../vendor/autoload.php");

use App\CommandBus\CommandBus;
use App\CommandBus\Commands\EchoCommand;
use App\CommandBus\Middleware\HandleCommandMiddleware;
use App\CommandBus\Middleware\LogCommandBusMiddleware;
use App\CommandBus\Middleware\ValidationCommandBusMiddleware;
use App\CommandBus\Service\GlobalExceptionService;
use App\CommandBus\Service\InMemoryLogger;

// Global
$exceptionHandler = new GlobalExceptionService();
$exceptionHandler->handleExceptions();

// Commands
$echoCommand      = new EchoCommand();
$inMemoryLogger   = new InMemoryLogger();

$logMiddleware    = new LogCommandBusMiddleware($inMemoryLogger);
$handleMiddleware = new HandleCommandMiddleware();
$validationMiddleware = new ValidationCommandBusMiddleware();

$commandBus = new CommandBus($logMiddleware, $validationMiddleware, $handleMiddleware);

$commandBus($echoCommand);