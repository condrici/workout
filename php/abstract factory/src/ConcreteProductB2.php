<?php
declare(strict_types=1);

namespace App\Src;

class ConcreteProductB2 implements AbstractProductB
{
    public function usefulFunctionB(): string
    {
        return "This is Product B2";
    }

}