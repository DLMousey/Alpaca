<?php

namespace Framework\Controller;

use Framework\View;
use Framework\Router\Controller;

class BaseController extends Controller
{
    public function view($templatePath)
    {
        $templateReader = new View\Reader($templatePath);

        die(dump($templateReader->read()));
    }
}