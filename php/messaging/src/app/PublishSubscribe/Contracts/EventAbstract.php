<?php
declare(strict_types=1);

namespace App\PublishSubscribe\Contracts;

abstract class EventAbstract
{
    public function __construct(
        public readonly string $resourceName,           // publisher name
        public readonly string $eventName,              // event name
        public readonly ?array $data = null             // data being emitted
    )
    {
    }
}