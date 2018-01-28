<?php

namespace Framework\Router;

use Exception;

abstract class Controller 
{
    protected $middleware = [];

    public function callAction($method, $params)
    {
        return call_user_func_array([$this, $method], $params);
    }

    public function setMiddleware($middleware)
    {
        $this->middleware = $middleware;
        return $this;
    }

    public function getMiddleware()
    {
        return $this->middleware;
    }
}