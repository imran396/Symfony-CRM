<?php

/* IntranetBundle:Customer:indexRaw.html.twig */
class __TwigTemplate_19d8e7264d34decc6fcbc0ae5c450bf4031e198dfb5008e52244082f567ab67d extends Twig_Template
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
        $context["macro"] = $this->env->loadTemplate("IntranetBundle:Customer:entitiesMacro.html.twig");
        // line 2
        echo $context["macro"]->getentitiesIndex((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), (isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")));
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:indexRaw.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
