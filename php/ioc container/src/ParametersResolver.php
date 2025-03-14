<?php
declare(strict_types=1);

namespace App\Src;

use ReflectionException;
use ReflectionParameter;

use Psr\Container\ContainerInterface;

class ParametersResolver
{
    public function __construct(
        protected ContainerInterface $container,
        protected array $parameters,
        protected array $args = []
    ) {
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function getArguments(): array
    {
        // loop through the parameters
        return array_map(
            function (ReflectionParameter $param) {
                // if an additional arg that was passed in return that value
                if (array_key_exists($param->getName(), $this->args)) {
                    return $this->args[$param->getName()];
                }
                // if the parameter is a class, resolve it and return it
                // otherwise return the default value
                return $param->getType() && !$param->getType()->isBuiltin()
                    ? $this->getClassInstance($param->getType()->getName())
                    : $param->getDefaultValue();
            },
            $this->parameters
        );
    }

    protected function getClassInstance(string $namespace): object
    {
        return (new ClassResolver($this->container, $namespace))->getInstance();
    }
}