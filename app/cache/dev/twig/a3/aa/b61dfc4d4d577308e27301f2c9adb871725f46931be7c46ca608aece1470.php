<?php

/* IntranetBundle:Task:indexRaw.html.twig */
class __TwigTemplate_a3aab61dfc4d4d577308e27301f2c9adb871725f46931be7c46ca608aece1470 extends Twig_Template
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
        $this->env->loadTemplate("IntranetBundle:Task:indexTable.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:indexRaw.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
