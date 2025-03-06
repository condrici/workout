<?php
declare(strict_types=1);

namespace App\CommandBus\Middleware;

use App\CommandBus\Contracts\CommandBusMiddlewareInterface;
use App\CommandBus\Contracts\CommandInterface;

class HandleCommandMiddleware implements CommandBusMiddlewareInterface
{
    public function __invoke(CommandInterface $command, ?callable $next = null): void
    {
        $command->__invoke();
    }
}