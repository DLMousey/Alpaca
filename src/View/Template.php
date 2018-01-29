<?php

namespace Framework\View;

/**
 * Class to represent a template
 * that will be returned as a response
 */
class Template extends AbstractTemplate
{
    protected $extends;

    protected $template;

    protected $data = [];

    public function __construct($template)
    {
        $templatePath = $this->getTemplateDirectory() . '/' . $template;

        $this->setTemplate($templatePath);
    }

    public function setExtends($extends)
    {
        $this->extends = $extends;
        return $this;
    }

    public function getExtends()
    {
        return $this->extends;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setData($data)
    {
        $this->data = $ata;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function render()
    {
        $this->content = file_get_contents($this->getTemplate());

        ob_start();
            include $this->getExtends();
        $rendered = ob_get_clean();
        
        return printf($rendered);
    }

    public function __toString()
    {
        echo file_get_contents($this->getTemplate());
    }
}