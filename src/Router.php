<?php

namespace App;

class Router
{
    private static array $routes = [];

    public static function addRoute(string $method, string $path, callable|array $action)
    {
        self::$routes[] = new Route($method, $path, $action);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public function __construct(private $path, private $method)
    {
        $this->path = parse_url($path, PHP_URL_PATH);
    }

    public function match()
    {
        foreach (self::$routes as $route) {
            if ($route->getPath() === $this->path && $route->getMethod() === $this->method) {
                return $route;
            }
        }

        return false;
    }
}
