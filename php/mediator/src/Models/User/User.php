<?php
declare(strict_types=1);

namespace App\src\Models\User;

class User
{
    private int $uniqueId;
    private string $firstName;
    private string $lastName;

    public function getUniqueId(): int
    {
        return $this->uniqueId;
    }

    public function setUniqueId(int $uniqueId): void
    {
        $this->uniqueId = $uniqueId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
}