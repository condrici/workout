<?php
declare(strict_types=1);

namespace App\CommandBus\Contracts;

interface CommandBusMiddlewareInterface
{
    public function __invoke(CommandInterface $command, ?callable $next = null);
}