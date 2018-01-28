<?php

namespace Framework\Router;

use Exception;

class Router 
{
    protected $routes = [];

    /**
     * Register a new route with the application
     *
     * @param AbstractRoute $route
     * @return self
     */
    public function register(AbstractRoute $route)
    {
        return $this->addRoute($route);
    }

    /**
     * Execute the controller action assosciated with a matched route
     *
     * @param [String] $path
     * @return ControllerResponse
     */
    public function dispatch($path = null)
    {
        /**
         * If we weren't given a specific path to dispatch,
         * Get the current request from the server super global
         */
        if(is_null($path)) {
            $path = $_SERVER['REQUEST_URI'];
        }

        /**
         * Get the request method from the server super global,
         * Take our path and locate a matching route for it
         */
        $method = $_SERVER['REQUEST_METHOD'];
        $route = RouteMatcher::match($path, $method, $this->getRoutes());

        /**
         * Get the controller from the route definition,
         * Call the configured action and pass it the extracted parameters.
         */
        return $route->getController()
                     ->callAction($route->getAction(), $route->getParams());
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