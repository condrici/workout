<?php
declare(strict_types=1);

namespace App\Src\Database;

use App\Src\Contracts\StorageAdapter;

class BaseStorageAdapter implements StorageAdapter
{
    public function __construct(public array $data)
    {
    }

    /**
     * @return array[]|null
     */
    public function find(int $id): ?array
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }
}