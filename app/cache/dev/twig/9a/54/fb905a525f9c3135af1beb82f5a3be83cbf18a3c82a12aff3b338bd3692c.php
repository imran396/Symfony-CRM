<?php

/* IntranetBundle:Campaign:indexRaw.html.twig */
class __TwigTemplate_9a54fb905a525f9c3135af1beb82f5a3be83cbf18a3c82a12aff3b338bd3692c extends Twig_Template
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
        $this->env->loadTemplate("IntranetBundle:Campaign:indexTable.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:indexRaw.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
