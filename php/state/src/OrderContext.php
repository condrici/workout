<?php

namespace App\Src;

use App\Src\State\State;
use App\Src\State\StateCreated;

class OrderContext
{
    private State $state;

    public function __construct()
    {
        // Initial state
        $this->state = new StateCreated();
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function proceedToNext(): void
    {
        $this->state->proceedToNext($this);
    }

    public function toString(): string
    {
        return $this->state->toString();
    }
}