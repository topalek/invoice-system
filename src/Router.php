<?php

namespace Invoice;

class Router
{
    public function dispatch(Request $request)
    {
        $path = $request->getPath();
        $routes = [
            '/' => function () {
                echo 'Home page';
            },
            '/invoices' => function () {
                echo 'Invoices page';
            },
            '/settings' => function () {
                echo 'Settings page';
            },
        ];

        if (array_key_exists($path, $routes)) {
            call_user_func($routes[$path]);
        }
    }
}