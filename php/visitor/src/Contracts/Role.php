<?php
declare(strict_types=1);

namespace App\src\Contracts;

interface Role
{
    public function accept(VisitorRole $visitor);
}