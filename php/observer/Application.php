<?php

namespace App;

use App\Src\User;
use App\Src\UserObserver;

require_once ("vendor/autoload.php");

class Application
{
    public function renameUserEmail(User $user, string $newEmail): void
    {
        $user->changeEmail($newEmail);
    }
}

/** Test $app */

$observer = new UserObserver();
$user = new User();
$user->attach($observer);

$app = new Application();
$app->renameUserEmail($user, 'test@test.com');

print_r($observer->getChangedUsers());