<?php
declare(strict_types=1);

namespace App\src;

readonly class StorageAdapter
{
    public function __construct(private array $data)
    {
    }

    public function find(int $id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }
}