<?php
declare(strict_types = 1);

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use App\Src\ConcreteFactory2;
use App\Src\ConcreteProductA2;
use App\Src\ConcreteProductB2;

#[CoversClass(ConcreteFactory2::class)]
class ConcreteFactory2Test extends TestCase
{
    public function testCanCreateObject()
    {
        $factory = new ConcreteFactory2();

        $this->assertInstanceOf(
            ConcreteProductA2::class,
            $factory->createProductA()
        );

        $this->assertInstanceOf(
            ConcreteProductB2::class,
            $factory->createProductB()
        );
    }
}