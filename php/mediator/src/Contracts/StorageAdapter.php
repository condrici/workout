<?php
declare(strict_types=1);

namespace App\Src\Contracts;

interface StorageAdapter
{
    public function find(int $id): ?array;
}