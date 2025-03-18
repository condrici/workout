<?php
declare(strict_types=1);

namespace App;

use App\Contracts\JsonStrategyInterface;
use App\Contracts\SerializerInterface;

class JsonSerializer implements SerializerInterface
{
    public function __construct(public JsonStrategyInterface $strategy)
    {
    }

    public function serialize(mixed $data): string
    {
        return $this->strategy->serialize($data);
    }

    public function deserialize(string $data): mixed
    {
        return $this->strategy->deserialize($data);
    }
}