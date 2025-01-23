<?php
declare(strict_types = 1);

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use App\Src\ConcreteFactory1;
use App\Src\ConcreteProductA1;
use App\Src\ConcreteProductB1;

#[CoversClass(ConcreteFactory1::class)]
class ConcreteFactory1Test extends TestCase
{
    public function testCanCreateObject()
    {
        $factory = new ConcreteFactory1();

        $this->assertInstanceOf(
            ConcreteProductA1::class,
            $factory->createProductA()
        );

        $this->assertInstanceOf(
            ConcreteProductB1::class,
            $factory->createProductB()
        );
    }
}