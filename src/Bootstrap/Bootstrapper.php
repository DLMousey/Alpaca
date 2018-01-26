<?php

namespace Framework\Bootstrap;

use Framework\Router;

class Bootstrapper
{
    protected $router;

    public function __construct()
    {
        $router = new Router\Router();
        $this->setRouter($router);

        $routeBuilder = new Router\RouteBuilder();
        $routes = require getcwd() . '/config/routes.config.php';

        foreach($routes as $key => $val)
        {
            $routeObject = $routeBuilder->build($key, $val);
            $this->getRouter()->register($routeObject);
        }   
    }

    public function bootstrap()
    {
        $this->getRouter()->dispatch();
    }

    public function setRouter(Router\Router $router)
    {
        $this->router = $router;
        return $this;
    }

    public function getRouter()
    {
        return $this->router;
    }
}