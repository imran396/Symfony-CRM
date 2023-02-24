<?php

/* IntranetBundle:Pressrelease:indexRaw.html.twig */
class __TwigTemplate_1b2257e387a5c925c2a1502888f672aeba81ee28810e2001863435965f3bcf52 extends Twig_Template
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
        $this->env->loadTemplate("IntranetBundle:Pressrelease:indexTable.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:indexRaw.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
