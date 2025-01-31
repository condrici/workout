<?php
declare(strict_types=1);

namespace App\Src\State;

use App\Src\OrderContext;

class StateDone implements  State
{
    public function proceedToNext(OrderContext $context)
    {
        //
    }

    public function toString(): string
    {
        return 'done';
    }

}