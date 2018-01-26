<?php

namespace Framework\Router;

use Exception;

class RouteMatcher
{
    public static function match($path, $method, $routeCollection)
    {
        foreach($routeCollection as $route)
        {
            if($route->match($path, $method))
            {
                return $route;
            }
        }

        throw new Exception('Could not find matching route');
    }
}