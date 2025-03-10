<?php
declare(strict_types=1);

namespace App\CommandBus\Middleware;

use App\CommandBus\Contracts\CommandBusMiddlewareInterface;
use App\CommandBus\Contracts\CommandInterface;
use Psr\Log\LoggerInterface;

class ValidationCommandBusMiddleware implements CommandBusMiddlewareInterface
{
    public function __invoke(CommandInterface $command, ?callable $next = null): void
    {
        throw new \Exception("Something went wrong");
    }

}