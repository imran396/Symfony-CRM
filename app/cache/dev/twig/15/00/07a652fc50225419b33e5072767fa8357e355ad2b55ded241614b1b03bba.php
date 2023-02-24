<?php

/* IntranetBundle:ConfigValue:index.html.twig */
class __TwigTemplate_150007a652fc50225419b33e5072767fa8357e355ad2b55ded241614b1b03bba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Config", array(), "messages");
        echo "</h1>

    <div class=\"well\">


   ";
        // line 9
        $this->env->loadTemplate("IntranetBundle:ConfigValue:indexTable.html.twig")->display($context);
        // line 10
        echo "
    </div>
    ";
        // line 12
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:ConfigValue:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 12,  42 => 10,  40 => 9,  31 => 4,  28 => 3,);
    }
}
