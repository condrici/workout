<?php
declare(strict_types=1);

namespace App\Strategy;

use App\Contracts\JsonStrategyInterface;

class DefaultJsonStrategy implements JsonStrategyInterface
{
    public function serialize(mixed $data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function deserialize(string $data): mixed
    {
        return json_decode($data, true);
    }
}