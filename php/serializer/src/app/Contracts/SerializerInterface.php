<?php
declare(strict_types=1);

namespace App\Contracts;

interface SerializerInterface
{
    public function serialize(mixed $data): string;

    public function deserialize(string $data): mixed;
}