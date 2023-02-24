<?php

/* IntranetBundle::simplePaginatorBlock.html.twig */
class __TwigTemplate_4d886ab1c97c7d2c5c3a7884e5891d1f087a00dc5d30b54c47c5a939378d503d extends Twig_Template
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
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 2
        echo $context["paginator"]->getpager((isset($context["pagesCount"]) ? $context["pagesCount"] : $this->getContext($context, "pagesCount")));
        echo "
";
        // line 3
        $this->env->loadTemplate("IntranetBundle::paginatorForSimpleContent.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle::simplePaginatorBlock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  21 => 2,  19 => 1,);
    }
}
