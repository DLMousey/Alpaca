<?php

namespace Framework\Router;

use Exception;

class RouteBuilder implements RouteBuilderInterface
{
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