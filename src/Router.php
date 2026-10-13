<?php

namespace App;

class Router
{
    private static array $routes = [];

    public static function addRoute($path, $action, $method = 'GET')
    {
        self::$routes[] = new Route($method, $path, $action);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public function __construct(private $path)
    {
    }

    public function match()
    {
        $path = parse_url($this->path, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        foreach (self::$routes as $route) {
            if (
                $route->getPath() === $path &&
                $route->getMethod() === $method
            ) {
                return [
                    'path' => $route->getPath(),
                    'action' => $route->getAction(),
                    'method' => $route->getMethod(),
                ];
            }
        }

        return false;
    }
}