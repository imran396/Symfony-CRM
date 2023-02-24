<?php

/* IntranetBundle:Pressrelease:mailApproved.html.twig */
class __TwigTemplate_d49a10a7e4bd7742aa88e1305185a6e914413ac7df1ae1a7bb991ee2f516d957 extends Twig_Template
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
        echo "Hi ";
        echo twig_escape_filter($this->env, (isset($context["recipient"]) ? $context["recipient"] : $this->getContext($context, "recipient")), "html", null, true);
        echo ", 

die Pressemitteilung \"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "\" wurde freigegeben von ";
        echo twig_escape_filter($this->env, (isset($context["approver"]) ? $context["approver"] : $this->getContext($context, "approver")), "html", null, true);
        echo ".

<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:mailApproved.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 5,  25 => 3,  19 => 1,);
    }
}
