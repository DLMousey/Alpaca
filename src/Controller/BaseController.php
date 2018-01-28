<?php

namespace Framework\Controller;

use Framework\View;
use Framework\Router\Controller;

class BaseController extends Controller
{
    public function view($templatePath)
    {
        $templateReader = new View\Reader();
        die(dump('called view method', $templateReader));
    }
    //..
}