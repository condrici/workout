<?php
declare(strict_types=1);

namespace App\Src\State;

use App\Src\OrderContext;

class StateShipped implements State
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setState(new StateDone());
    }

    public function toString(): string
    {
        return 'shipped';
    }

}