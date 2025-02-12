<?php
declare(strict_types=1);

namespace App\Middleware;

abstract class Middleware
{
    private ?Middleware $next = null;

    /**
     * Add next middleware
     */
    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;
        return $next;
    }

    /**
     * Run middleware handler, and pass the request to the next
     */
    public function check(string $email, string $password): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }


}