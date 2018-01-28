<?php

namespace Framework\View;

class Reader 
{
    protected $templatePath;

    protected $config;

    public function __construct($templatePath)
    {
        $config = require getcwd() . '/config/app.config.php';
        $this->setConfig($config['views']);
        $this->setTemplatePath(getcwd() . $config['views']['stack_dir'] . '/' . $templatePath);

        return $this->read();
    }

    public function read()
    {
        return $this->convertToString($this->getTemplatePath());
    }

    protected function convertToString()
    {
        return file_get_contents($this->getTemplatePath());
    }

    public function setTemplatePath($templatePath)
    {
        $this->templatePath = $templatePath;
        return $this;
    }

    public function getTemplatePath()
    {
        return $this->templatePath;
    }

    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }
}