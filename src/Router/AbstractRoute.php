<?php

namespace Framework\Router;

class AbstractRoute
{
    protected $name;

    protected $route;

    protected $method;

    protected $controller;

    protected $action;

    protected $routeSegments;

    protected $urlSegments;

    protected $params;

    /**
     * Check if a specified path and method are a match to this route
     *
     * @param [String] $path - The path of the route (eg. "/home")
     * @param [String] $method - HTTP Method used to hit the application (eg. GET/POST)
     * @return Boolean
     */
    public function match($path, $method)
    {
        /**
         * Build arrays of;
         * - The pieces of the URL requested
         * - The pieces of the route in the config
         * - Key/Val pairs of parameters from the URL
         */
        $this->parseUrlSegments($path);
        $this->parseRouteSegments();
        $this->parseRouteParams($path);

        /**
         * Set up our 3 variables that will be used
         * to signal the match status of the route
         */
        $matchesPath = false;
        $matchesMethod = false;
        $hasParams = false;

        /**
         * If the route is not parameterised, We only need
         * to check that the path matches what was requested
         */
        if(!count($this->getParams()))
        {
            if($this->getRoute() == $path)
            {   
                $matchesPath = true;
            }
        }
        /**
         * If the route IS parameterised, We'll check that the 
         * array of parameters is the correct length
         */
        else
        {
            $hasParams = true;

            if(count($this->getRouteSegments()) == count($this->getUrlSegments()))
            {
                $matchesParams = true;
                $matchesPath = true;
            }
        }

        if($this->getMethod() == $method)
        {
            $matchesMethod = true;
        }

        if($hasParams)
        {
            return $matchesPath != false && $matchesMethod != false;
        }
        else
        {
            return $matchesPath != false && $matchesMethod != false && $matchesParams != false;
        }
    }

    /**
     * Build an array of segments from the route definition
     * 
     * @return void
     */
    public function parseRouteSegments()
    {
        $sections = explode('/', $this->getRoute());
        unset($sections[0]);
        
        foreach($sections as $section)
        {
            $section = str_replace('}', '', str_replace('{', '', $section));
            }
            
            $this->setRouteSegments($sections);
        }
        
    /**
     * Build an array of segments from the URL
     * 
     * @param [String] $path - The requested path in the URL
     * @return void
     */
    public function parseUrlSegments($path)
    {
        $sections = explode('/', $path);
        unset($sections[0]);
        
        $this->setUrlSegments($sections);
    }
        
    /**
     * Build a Key/Val array of the parameters defined in the route
     * and the parameters passed to the application
     * 
     * @return void
     */
    public function parseRouteParams($path)
    {
        $routeSections = $this->getRouteSegments();
        $pathSections = $this->getUrlSegments($path);

        $params = [];
        for($i = 1; $i <= count($routeSections); $i++)
        {
            if(preg_match('/(\{(.*)\})/', $routeSections[$i]))
            {
                $key = $routeSections[$i];
                $key = str_replace('}', '', str_replace('{', '', $key));

                $params[$key] = $pathSections[$i];
            }
        }

        $this->setParams($params);
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setRouteSegments($routeSegments)
    {
        $this->routeSegments = $routeSegments;
        return $this;
    }

    public function getRouteSegments()
    {
        return $this->routeSegments;
    }

    public function setUrlSegments($urlSegments)
    {
        $this->urlSegments = $urlSegments;
        return $this;
    }

    public function getUrlSegments()
    {
        return $this->urlSegments;
    }

    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }
}