<?php
declare(strict_types=1);

namespace App\Src;

use SplObserver;
use SplSubject;

class UserObserver implements SplObserver
{
    /** @var array SplSubject */
    private array $changedUsers = [];

    public function update(SplSubject $subject): void
    {
        $this->changedUsers[] = clone $subject;
    }

    public function getChangedUsers()
    {
        return $this->changedUsers;
    }
}