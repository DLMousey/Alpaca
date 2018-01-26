<?php

namespace Framework\Router;

class AbstractRoute
{
    protected $name;

    protected $route;

    protected $method;

    protected $controller;

    protected $action;

    public function match($path, $method)
    {
        $matchesPath = false;
        $matchesMethod = false;

        if($this->getRoute() == $path)
        {   
            $matchesPath = true;
        }

        if($this->getMethod() == $method)
        {
            $matchesMethod = true;
        }

        return $matchesPath != false && $matchesMethod != false;
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
}