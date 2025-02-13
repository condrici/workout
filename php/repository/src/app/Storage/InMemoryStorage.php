<?php
declare(strict_types=1);

namespace App\Storage;

use OutOfBoundsException;

class InMemoryStorage implements GenericStorage
{
    private array $data = [];
    private int $lastId = 0;

    public function create(array $data): array
    {
        $this->generateId();
        $this->data[$this->lastId] = $data;

        return $this->data[$this->lastId];
    }

    public function retrieve(int $id): ?array
    {
        if (!isset($this->data[$id])) {
            return null;
        }

        return $this->data[$id];
    }

    /**
     * @throws OutOfBoundsException
     */
    public function delete(int $id): bool
    {
        if (!isset($this->data[$id])) {
            throw new OutOfBoundsException("Record does not exist");
        }

        unset($this->data[$id]);
        return true;
    }

    private function generateId(): void
    {
        ksort($this->data);
        $this->lastId = array_key_last($this->data) + 1;
    }
}