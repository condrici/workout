<?php
declare(strict_types=1);

namespace App\Src;

use SplSubject;
use SplObjectStorage;
use SplObserver;

class User implements SplSubject
{
    private SplObjectStorage $observers;

    private string $email;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function changeEmail(string $email): void
    {
        $this->email = $email;
        $this->notify();
    }

    public function getEmail(string $email): string
    {
        return $this->email;
    }

}