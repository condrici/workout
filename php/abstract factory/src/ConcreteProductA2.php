<?php
declare(strict_types=1);

namespace App\Src;

class ConcreteProductA2 implements AbstractProductA
{
    public function usefulFunctionA(): string
    {
        return "This is Product A2";
    }
}