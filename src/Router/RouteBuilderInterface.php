<?php

namespace Framework\Router;

interface RouteBuilderInterface
{
    public function build($name, $data);
}