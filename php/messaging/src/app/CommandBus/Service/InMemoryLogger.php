<?php
declare(strict_types=1);

namespace App\CommandBus\Service;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class InMemoryLogger implements LoggerInterface
{
    use LoggerTrait;

    public array $log = [];

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $count = count($this->log);
        $this->log[$count] = [
            'level' => $level,
            'message' => $message,
            'context' => $context
        ];
    }

    public function getLog(): array
    {
        return $this->log;
    }
}