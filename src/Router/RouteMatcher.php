<?php

namespace Framework\Router;

use Exception;

class RouteMatcher
{
    /**
     * Find a match for a given path and method
     *
     * @param [String] $path
     * @param [String] $method
     * @param [Array] $routeCollection
     * @return AbstractRoute
     * @throws Exception
     */
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