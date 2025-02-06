<?php
declare(strict_types=1);

namespace App\Src\Repository;

use App\Src\Contracts\Colleague;
use App\Src\Models\User\User;
use App\Src\Models\User\UserMapper;

class UserRepository extends Colleague
{
    public function __construct(public UserMapper $userMapper)
    {
    }

    public function findById(int $id): User
    {
        return $this->userMapper->findOrThrow($id);
    }
}