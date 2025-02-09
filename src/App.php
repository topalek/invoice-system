<?php

namespace Invoice;

class App
{
    public function run()
    {
        $router = new Router();
        $request = new Request();
        $routList = new RouterList();
        $routList->configure($router);

        $router->dispatch($request);
    }
}