<?php
declare(strict_types=1);

namespace App\Src;

use ReflectionException;
use ReflectionMethod;

use Psr\Container\ContainerInterface;

class MethodResolver
{
    public function __construct(
        protected ContainerInterface $container,
        protected object $instance,
        protected string $method,
        protected array $args = []
    ) {
    }

    /**
     * @return mixed
     * @throws ReflectionException
     */
    public function getValue(): mixed
    {
        // get the class method reflection class
        $method = new ReflectionMethod(
            $this->instance,
            $this->method
        );

        // find and resolve the method arguments
        $argumentResolver = new ParametersResolver(
            $this->container,
            $method->getParameters(),
            $this->args
        );

        // call the method with the injected arguments
        return $method->invokeArgs(
            $this->instance,
            $argumentResolver->getArguments()
        );
    }
}