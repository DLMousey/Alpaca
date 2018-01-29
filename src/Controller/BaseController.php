<?php

namespace Framework\Controller;

use Framework\View;
use Framework\Router\Controller;

class BaseController extends Controller
{
    public $content;

    public function view($templatePath)
    {
        $config = require getcwd() . '/config/app.config.php';

        $viewDir = getcwd() . $config['views']['stack_dir'];

        $template = new View\Template($templatePath);
        $template->setTemplateDirectory($viewDir);
        $template->setDefaultMaster($viewDir . '/' . $config['views']['layout'] . '.tpl.php');
        $template->setTemplate($viewDir . '/' . $templatePath);
        $template->setConfig($config['views']);
        $template->setExtends($template->getDefaultMaster());

        return $template->render();
    }
}