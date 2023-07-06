<?php

namespace Invoice;

class App
{
    public function run()
    {
        $router = new Router();
        $request = new Request();
        $router->dispatch($request);
    }
}