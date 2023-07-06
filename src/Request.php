<?php

namespace Invoice;

class Request
{
    private array $server;

    public function __construct()
    {
        $this->server = $_SERVER;
    }

    public function getPath(): string
    {
        return $this->getUri()['path'];
    }

    public function getUri(): array
    {
        return parse_url($this->getServer('REQUEST_URI'));
    }

    public function getServer(string $name): ?string
    {
        return $this->server[$name] ?? null;
    }

}