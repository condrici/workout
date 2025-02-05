<?php
declare(strict_types=1);

namespace App\src;

use App\src\Contracts\Role;
use App\src\Contracts\VisitorRole;

class Group implements Role
{
    public function accept(VisitorRole $visitor)
    {
        $visitor->visitGroup($this);
    }
}