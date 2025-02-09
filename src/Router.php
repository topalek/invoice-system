<?php

namespace Invoice;

class Router
{
    public function __construct(private array $routes = []) {}

    public function add($method, $uri, $controller)
    {
        $this->routes[$method][$uri] = $controller;
    }

    public function get(string $uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function dispatch(Request $request)
    {
        $path = $request->getPath();
        $method = $request->getMethod();

        $callback = $this->routes[$method][$path] ?? null;
        if (!$callback) {
            throw new \Exception('Not found.', 404);
        }
        [$instance, $methodName] = $callback;
        $instance = new $instance();
        return call_user_func_array([$instance, $methodName]);
    }

}