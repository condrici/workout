<?php
declare(strict_types=1);

namespace App\Core;

readonly class Entrypoint
{

    private const CONTROLLER_NAMESPACE_PREFIX = '\App\Controllers';
    
    public function __construct(private array $routes)
    {
    }

    public function handleRequest(): void
    {
        /**
         * Extract the URL path, needed to determine the route
         * i.e. the route would be: /path/index.php,
         * not the full url: http://www.website.com/path/index.php
         */
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            $namespace = self::CONTROLLER_NAMESPACE_PREFIX . '\\' . $route['controller'];

            $controller = new $namespace;
            $method = $route['method'];

            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                $this->sendResponse(500, "Method not found.");
            }
        } else {
            $this->sendResponse(404, "Page not found.");
        }
    }

    private function sendResponse(int $statusCode, string $message): void
    {
        http_response_code($statusCode);
        echo $message;
    }
}