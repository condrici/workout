<?php
declare(strict_types=1);

namespace App\src\Strategy;

class ConcreteStrategyMultiply implements Strategy
{
    public function execute(int $a, int $b): int
    {
        return $a * $b;
    }

}