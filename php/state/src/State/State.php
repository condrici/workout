<?php
declare(strict_types=1);

namespace App\Src\State;

use App\Src\OrderContext;

interface State
{
    public function proceedToNext(OrderContext $context);
    public function toString(): string;
}