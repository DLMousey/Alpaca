<?php

namespace Framework\Router;

use Exception;

class Router 
{
    protected $routes = [];

    public function register(AbstractRoute $route)
    {
        return $this->addRoute($route);
    }

    public function dispatch($path = null)
    {
        if(is_null($path)) {
            $path = $_SERVER['REQUEST_URI'];
        }

        $method = $_SERVER['REQUEST_METHOD'];
        $route = RouteMatcher::match($path, $method, $this->getRoutes());

        $controller = $route->getController();
        $method = $route->getAction();

        return $controller->$method();
    }

    public function setRoutes($routes)
    {
        $this->routes = $routes;
        return $this;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function addRoute($route)
    {
        $this->routes[] = $route;
        return $this;
    }
}