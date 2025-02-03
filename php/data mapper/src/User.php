<?php
declare(strict_types=1);

namespace App\src;

class User
{
    public static function fromState(array $state): User
    {
        // validate state before accessing keys
        return new self(
            $state['username'],
            $state['email']
        );
    }

    public function __construct(public string $username, public string $email)
    {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}