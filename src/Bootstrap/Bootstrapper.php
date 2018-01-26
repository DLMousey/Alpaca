<?php

namespace Framework\Bootstrap;

use Framework\Router;

class Bootstrapper
{
    protected $router;

    /**
     * Construct a new Application Bootstrapper class,
     * This process will read the routes from the user's application
     * config and register them with the router.
     */
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

    /**
     * Bootstrap the Application
     *
     * @return ControllerResponse
     */
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