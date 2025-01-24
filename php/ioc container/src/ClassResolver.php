<?php
declare(strict_types=1);

namespace App\Src;

use ReflectionClass;
use ReflectionException;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ClassResolver
{
    public function __construct(
        protected ContainerInterface $container,
        protected string $namespace,
        protected array $args = []
    ) {
    }

    /**
     * @throws ReflectionException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getInstance(): object
    {
        // check for container entry
        if ($this->container->has($this->namespace)) {
            $binding = $this->container->get($this->namespace);

            //return if there is a container instance / singleton
            if (is_object($binding)) {
                return $binding;
            }

            // set the namespace to the bound container namespace
            $this->namespace = $binding;
        }

        $refClass = new ReflectionClass($this->namespace);

        // get the constructor
        $constructor = $refClass->getConstructor();

        // check constructor exists and is accessible
        if ($constructor && $constructor->isPublic()) {
            // check constructor has parameters and resolve them
            if (count($constructor->getParameters()) > 0) {
                $argumentResolver = new ParametersResolver(
                    $this->container,
                    $constructor->getParameters(),
                    $this->args
                );
                // resolve the constructor arguments
                $this->args = $argumentResolver->getArguments();
            }
            //create the new instance
            return $refClass->newInstanceArgs($this->args);
        }
        //no arguments so create the new instance without calling the constructor
        return $refClass->newInstanceWithoutConstructor();
    }
}