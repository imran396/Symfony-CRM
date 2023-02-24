<?php

/* IntranetBundle:Complaint:edit.html.twig */
class __TwigTemplate_0c2ebd4b6480cf65241726bd74cec3c72f28219918c34e60847c6b7027f90c9c extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "        ";
        $context["view"] = $this->env->loadTemplate("IntranetBundle:Macroses:standardViewsMacro.html.twig");
        // line 6
        echo "         ";
        $context["editPath"] = $this->env->getExtension('routing')->getPath("complaint_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())));
        // line 7
        echo "        ";
        echo $context["view"]->getedit((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "complaint", "Complaint edit", (isset($context["editPath"]) ? $context["editPath"] : $this->getContext($context, "editPath")));
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
