<?php declare(strict_types=1);

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use App\Src\Container;

#[CoversClass(Container::class)]
class ContainerTest extends TestCase
{

    public function testCanBindAndRetrieveServices()
    {
        $container = new Container();
        $containerId = 'some random service id';
        $container->bind($containerId, $container);

        $this->assertTrue(
            $container->has($containerId),
            'Object bound to container was found by using its id'
        );

        $this->assertInstanceOf(
            Container::class,
            $container->get($containerId),
            'Object bound to container has the expected instance'
        );

        $this->assertSame(
            $container,
            $container->get($containerId),
            'Object bound to container is exactly the same as the one that was set'
        );
    }

}