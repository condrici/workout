<?php
declare(strict_types=1);

namespace App\CommandBus\Middleware;

use App\CommandBus\Contracts\CommandBusMiddlewareInterface;
use App\CommandBus\Contracts\CommandInterface;
use Psr\Log\LoggerInterface;

class LogCommandBusMiddleware implements CommandBusMiddlewareInterface
{
    public function __construct(protected LoggerInterface $logger)
    {
    }

    public function __invoke(CommandInterface $command, ?callable $next = null): void
    {
        try {
            $this->preCommandLog($command);
            if (isset($next)) {
                $next($command);
            }
            $this->postCommandLog($command);
        } catch (\Exception $e) {
            $this->logException($command);
        }
    }

    protected function preCommandLog(CommandInterface $command)
    {
        $this->logger->info(sprintf("Starting %s handling.", get_class($command)));
    }

    protected function postCommandLog(CommandInterface $command)
    {
        $this->logger->info(sprintf("Finished %s handling.", get_class($command)));
    }

    protected function logException(CommandInterface $command)
    {
        $this->logger->alert(sprintf("Something went wrong with %s handling.", get_class($command)));
    }
}