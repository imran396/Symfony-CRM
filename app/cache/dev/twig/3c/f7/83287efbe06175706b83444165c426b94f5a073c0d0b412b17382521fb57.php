<?php

/* IntranetBundle:MonitoredUrl:indexRaw.html.twig */
class __TwigTemplate_3cf783287efbe06175706b83444165c426b94f5a073c0d0b412b17382521fb57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->loadTemplate("IntranetBundle:MonitoredUrl:indexTable.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:MonitoredUrl:indexRaw.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
