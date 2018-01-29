<?php

namespace Framework\View;

/**
 * Common abstract implementation for template objects
 * to extend, Provides access to common data attributes
 */
class AbstractTemplate
{
    protected $templateDirectory;

    protected $defaultMaster;

    protected $config;

    public function setTemplateDirectory($templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
        return $this;
    }

    public function getTemplateDirectory()
    {
        return $this->templateDirectory;
    }

    public function setDefaultMaster($defaultMaster)
    {
        $this->defaultMaster = $defaultMaster;
        return $this;
    }

    public function getDefaultMaster()
    {
        return $this->defaultMaster;
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