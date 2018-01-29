<?php

namespace Framework\View;

class Reader 
{
    protected $templateDirectory;

    protected $masterTemplate;

    protected $content;

    public function __construct($template)
    {
        $config = require getcwd() . "/config/app.config.php";

        $this->setTemplateDirectory(getcwd() . $config['views']['stack_dir']);
        $this->setMasterTemplate(getcwd() . $config['views']['stack_dir'] . '/' . $config['views']['layout']);

        // die(dump($config));
        $parent = getcwd() . "{$this->getTemplateDirectory()}/{$this->getMasterTemplate()}.tpl.php";

        $this->setContent(file_get_contents($this->getTemplateDirectory() . '/' . $template));

        return $this;
    }

    public function setTemplateDirectory($templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
        return $this;
    }

    public function getTemplateDirectory()
    {
        return $this->templateDirectory;
    }

    public function setMasterTemplate($masterTemplate)
    {
        $this->masterTemplate = $masterTemplate . '.tpl.php';
        return $this;
    }

    public function getMasterTemplate()
    {
        return $this->masterTemplate;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }
    // protected $templatePath;

    // protected $config;

    // public function __construct($templatePath)
    // {
    //     $config = require getcwd() . '/config/app.config.php';
    //     $this->setConfig($config['views']);
    //     $this->setTemplatePath(getcwd() . $config['views']['stack_dir'] . '/' . $templatePath);

    //     return $this->read();
    // }

    // public function read()
    // {
    //     return $this->convertToString($this->getTemplatePath());
    // }

    // protected function convertToString()
    // {
    //     return file_get_contents($this->getTemplatePath());
    // }

    // public function setTemplatePath($templatePath)
    // {
    //     $this->templatePath = $templatePath;
    //     return $this;
    // }

    // public function getTemplatePath()
    // {
    //     return $this->templatePath;
    // }

    // public function setConfig($config)
    // {
    //     $this->config = $config;
    //     return $this;
    // }

    // public function getConfig()
    // {
    //     return $this->config;
    // }
}