<?php
declare(strict_types=1);

namespace App\Middleware;

class RoleCheckMiddleware extends Middleware
{
    public function check(string $email, string $password): bool
    {
        if ($email === 'admin@example.com') {
            echo "RoleCheckMiddleware: This is an admin account\n";
        }

        echo "RoleCheckMiddleware: This is a regular user account\n";

        return parent::check($email, $password);
    }
}