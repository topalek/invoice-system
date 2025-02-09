<?php

namespace Invoice;

class Request
{
    private array $server;
    private array $post;
    private array $get;
    private array $files;

    public function __construct()
    {
        $this->server = $_SERVER;
        $this->post = $_POST;
        $this->get = $_GET;
        $this->files = $_FILES;
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

    public function getMethod(): string
    {
        return $this->getServer("REQUEST_METHOD");
    }

    public function get($key = null)
    {
        return $key ? $this->get[$key] ?? null : $this->get;
    }

    public function post($key = null)
    {
        return $key ? $this->post[$key] ?? null : $this->post;
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'POST';
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'GET';
    }

}