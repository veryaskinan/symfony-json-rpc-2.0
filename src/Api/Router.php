<?php


namespace App\Api;


class Router
{
    private $routes = [
        "exampleMethod" => "\App\Domain\Services\ExampleService::exampleMethod"
    ];

    function getRoute(string $method)
    {
        $fullMethodExploded = explode("::", $this->routes[$method]);
        $namespace = $fullMethodExploded[0];
        $method = $fullMethodExploded[1];
        return new Route($namespace, $method);
    }
}