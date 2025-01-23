<?php
declare(strict_types=1);

namespace App\Src;

class ConcreteProductB1 implements AbstractProductB
{
    public function usefulFunctionB(): string
    {
        return "This is Product B1";
    }

}