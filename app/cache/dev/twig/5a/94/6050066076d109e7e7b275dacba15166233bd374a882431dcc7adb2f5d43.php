<?php

/* IntranetBundle:Complaint:indexRaw.html.twig */
class __TwigTemplate_5a946050066076d109e7e7b275dacba15166233bd374a882431dcc7adb2f5d43 extends Twig_Template
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
        $this->env->loadTemplate("IntranetBundle:Complaint:indexTable.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:indexRaw.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
