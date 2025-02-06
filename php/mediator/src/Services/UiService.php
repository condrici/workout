<?php
declare(strict_types=1);

namespace App\Src\Services;

use App\Src\Contracts\Colleague;

class UiService extends Colleague
{
    public function outputUserInfo(int $id): string
    {
        $user = $this->mediator->getUser($id);
        return $user->getFirstName() . ' ' . $user->getLastName();
    }
}