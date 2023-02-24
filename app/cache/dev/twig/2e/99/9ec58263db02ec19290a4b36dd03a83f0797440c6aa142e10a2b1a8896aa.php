<?php

/* IntranetBundle:Pressrelease:mailDenied.html.twig */
class __TwigTemplate_2e999ec58263db02ec19290a4b36dd03a83f0797440c6aa142e10a2b1a8896aa extends Twig_Template
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
        echo "\" wurde abgelehnt von ";
        echo twig_escape_filter($this->env, (isset($context["denier"]) ? $context["denier"] : $this->getContext($context, "denier")), "html", null, true);
        echo ".

";
        // line 5
        if ((isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason"))) {
            // line 6
            echo "Grund: ";
            echo twig_escape_filter($this->env, (isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason")), "html", null, true);
            echo "
";
        }
        // line 8
        echo "
<a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:mailDenied.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 9,  40 => 8,  34 => 6,  32 => 5,  25 => 3,  19 => 1,);
    }
}
