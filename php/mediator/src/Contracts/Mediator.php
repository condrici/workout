<?php
declare(strict_types=1);

namespace App\Src\Contracts;

use App\src\Models\User\User;

interface Mediator
{
    public function getUser(int $id): User;
}