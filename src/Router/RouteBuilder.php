<?php

namespace Framework\Router;

use Exception;

class RouteBuilder implements RouteBuilderInterface
{
    /**
     * Create a new AbstractRoute object from the route config
     * passed from the Bootstrapper
     *
     * @param [string] $name - The name of the route
     * @param [string] $data - The route data (eg. Controller to execute)
     * @return Framework\Router\AbstractRoute
     */
    public function build($name, $data)
    {
        $controller = $data['namespace'] . '\\' . $data['controller'];

        $routeObject = new AbstractRoute();
        $routeObject->setName($name);
        $routeObject->setRoute($data['route']);
        $routeObject->setMethod($data['method']);
        $routeObject->setController($this->findController($controller));
        $routeObject->setAction($data['action']);

        return $routeObject;
    }

    /**
     * Locate the matching controller and instantiate a new instance
     *
     * @param [Controller] $controller
     * @return Controller
     */
    protected function findController($controller)
    {
        if(class_exists($controller)) {
            $instance = new $controller();
        } else {
            throw new Exception('Unable to locate controller class, Is it properly autoloaded or included beforehand?');
        }

        return $instance;
    }
}