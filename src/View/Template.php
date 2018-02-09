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

    protected $varCache = [];

    public function __construct($template)
    {
        $templatePath = $this->getTemplateDirectory() . '/' . $template;

        $this->setTemplate($templatePath);
    }

    public function render($data = null)
    {
        if($data != null)
        {
            foreach($data as $key => $val)
            {
                $$key = $val;
            }
        }

        /**
         * Buffer the output so we can render the contents
         * of the child view without returning anything or 
         */
        ob_start();
        $content = include $this->getTemplate();

        /**
         * Store the contents of the cleaned buffer in the 
         * content class property, This should be picked up by
         * our layout file which echoes this property
         */
        $this->content = ob_get_clean();
        
        /**
         * Return a boggo standard PHP Include statement for the 
         * template file that the child view extends from.
         * 
         * @todo allow rendering of child templates that don't
         * extend a parent template
         */
        return include $this->getExtends();
    }

    /**
     * @deprecated
     */
    public function __toString()
    {
        echo file_get_contents($this->getTemplate());
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

    public function setVarCache($varCache)
    {
        $this->varCache = $varCache;
        return $this;
    }

    public function addCachedVar($key, $val)
    {
        $this->varCache[$key] = $val;
        return $this;
    }

    public function removeCachedVar($key)
    {
        unset($this->varCache[$key]);
        return $this;
    }

    public function getVarCache()
    {
        return $this->varCache;
    }
}