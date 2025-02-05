<?php
declare(strict_types=1);

namespace App\src;

use App\src\Contracts\Role;
use App\src\Contracts\VisitorRole;

class User implements Role
{
    private array $visited = [];

    public function __construct(public string $name)
    {
    }

    public function accept(VisitorRole $visitor)
    {
        $visitor->visitUser($this);
    }

    public function getName(): string
    {
        return $this->name;
    }
}