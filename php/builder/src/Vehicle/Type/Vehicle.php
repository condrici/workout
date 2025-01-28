<?php
declare(strict_types=1);

namespace App\Src\Vehicle\Type;

abstract class Vehicle
{
    private array $parts;

    final public function setPart (string $key, object $value): void
    {
        $this->parts[$key] = $value;
    }

    final public function getPart (string $key): object
    {
        return $this->parts[$key];
    }
}