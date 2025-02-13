<?php
declare(strict_types=1);

namespace App\Storage;

/**
 * Universal storage, which does not take into consideration
 * models, just plain data
 */

interface GenericStorage
{
    public function retrieve(int $id): ?array;

    public function delete(int $id): bool;
}