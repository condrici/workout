<?php
declare(strict_types=1);

namespace App\Middleware;

use App\Server;

class UserExistsMiddleware extends Middleware
{
    public function __construct(private readonly Server $server)
    {
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: " . "This email is not registered\n";
            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: " . "Wrong password!\n";
            return false;
        }

        return parent::check($email, $password);
    }
}