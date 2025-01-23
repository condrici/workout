<?php
declare(strict_types=1);

namespace App\Src;

class ConcreteProductA1 implements AbstractProductA
{
    public function usefulFunctionA(): string
    {
        return "This is Product A1";
    }
}