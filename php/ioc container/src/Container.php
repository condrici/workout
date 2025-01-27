<?php
declare(strict_types=1);

namespace App\Src;

Use ReflectionException;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

use App\Src\Exception\ServiceNotFoundException;

class Container implements ContainerInterface
{
    protected array $bindings;

    public function bind(string $id, string $namespace): Container
    {
        $this->bindings[$id] = $namespace;
        return $this;
    }

    public function singleton(string $id, object $instance): Container
    {
        $this->bindings[$id] = $instance;
        return $this;
    }

    public static function instance(): static
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ReflectionException
     */
    public function resolveClass(string $namespace, array $args = []): object
    {
        return (new ClassResolver($this, $namespace, $args))->getInstance();
    }

    /**
     * @throws ReflectionException
     */
    public function resolveMethod(object $instance, string $method, array $args = [])
    {
        return (new MethodResolver($this, $instance, $method, $args))->getValue();
    }

    public function get(string $id)
    {
        if ($this->has($id)) {
            return $this->bindings[$id];
        }

        throw new ServiceNotFoundException("Container entry not found for: " . $id);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->bindings);
    }
}
