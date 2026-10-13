<?php

namespace App;

class Route
{
    public function __construct(
        private string $method,
        private string $path,
        private $action
    ) {
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getAction()
    {
        return $this->action;
    }

    public static function get(string $path, $action): void
    {
        Router::addRoute($path, $action, 'GET');
    }

    public static function post(string $path, $action): void
    {
        Router::addRoute($path, $action, 'POST');
    }
}