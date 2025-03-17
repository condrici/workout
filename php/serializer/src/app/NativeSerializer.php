<?php
declare(strict_types=1);

namespace App;

use App\Contracts\SerializerInterface;

class NativeSerializer implements SerializerInterface
{
    public function serialize(mixed $data): string
    {
        return serialize($data);
    }

    public function deserialize(string $data): mixed
    {
        return unserialize($data);
    }

}