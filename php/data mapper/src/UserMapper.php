<?php
declare(strict_types=1);

namespace App\src;

use \InvalidArgumentException;

class UserMapper
{
    public function __construct(private StorageAdapter $adapter)
    {
    }

    public function findById(int $id): User
    {
        $result = $this->adapter->find($id);
        if ($result === null)
        {
            throw new InvalidArgumentException("User $id not found");
        }

        return $this->mapRowToUser($result);
    }

    private function mapRowToUser(array $row): User
    {
        return User::fromState($row);
    }
}