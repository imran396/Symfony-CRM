<?php

/* IntranetBundle:Complaint:new.html.twig */
class __TwigTemplate_3e2ce56c497752de3e8d8dd2293b7327c46fd24e798f3bee471c6875aae9c2ee extends Twig_Template
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
        echo "\t";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "        ";
        $context["view"] = $this->env->loadTemplate("IntranetBundle:Macroses:standardViewsMacro.html.twig");
        // line 6
        echo "        ";
        echo $context["view"]->getnew((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "complaint", "Complaint creation");
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
