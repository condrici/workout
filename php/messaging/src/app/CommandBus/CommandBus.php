<?php
declare(strict_types=1);

namespace App\CommandBus;

use App\CommandBus\Contracts\CommandBusMiddlewareInterface;
use App\CommandBus\Contracts\CommandInterface;

class CommandBus implements CommandBusMiddlewareInterface
{
    protected array $commandBusMiddlewareSet = [];
    public function __construct(CommandBusMiddlewareInterface ...$commandBusMiddlewareSet)
    {
        $this->commandBusMiddlewareSet = $commandBusMiddlewareSet;
    }

    public function __invoke(CommandInterface $command, ?callable $next = null)
    {
        $middlewares = $this->commandBusMiddlewareSet;
        $total = count($middlewares);

        // One middleware
        if ($total === 1) {
            $middlewares[array_key_first($middlewares)]->__invoke($command);
            return;
        }

        // Multiple middlewares
        for ($i=0; $i<=$total-1; $i++) {
            $currentMiddleware = $middlewares[$i];
            $nextMiddleware = $middlewares[$i+1] ?? null;

            if ($nextMiddleware === null) {
                return;
            }

            $nextMiddlewareCallback = function($command) use ($nextMiddleware) {
                return $nextMiddleware($command);
            };

            $currentMiddleware->__invoke($command, $nextMiddlewareCallback);
        }
    }
}