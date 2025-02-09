<?php
declare(strict_types=1);

namespace App\Core;

use Exception;

class Router
{
    protected array $routes;

    /**
     * Add HTTP GET Route
     * to the list of routes
     */
    public function get($route, $controller, $action): void
    {
        $this->addRoute("GET", $route, $controller, $action);
    }

    /**
     * Add HTTP POST Route
     * to the list of routes
     */
    public function post($route, $controller, $action): void
    {
        $this->addRoute("POST", $route, $controller, $action);
    }

    /**
     * Dispatch Route
     * If the requested HTTP URL+METHOD exists,
     * the controller method will be executed
     *
     * @throws Exception
     */
    public function dispatch(): void
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller;
            $controller->$action();
        } else {
            throw new Exception("No route found for URI: $uri");
        }
    }

    private function addRoute(
        string $method,             // HTTP Method          GET, POST, etc.
        string $route,              // URL Route            /path/to/target
        string $controller,         // Controller           class name
        string $action              // Controller Method    class method
    ): void
    {
        $this->routes[$method][$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }
}