<?php

/* IntranetBundle:Campaign:mailDenied.html.twig */
class __TwigTemplate_b21c346e22820f227231786263325b6ad79c39c4d947c8ea2c5692c519ca016e extends Twig_Template
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

die Kampagne \"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
        echo "\" wurde von ";
        echo twig_escape_filter($this->env, (isset($context["denier"]) ? $context["denier"] : $this->getContext($context, "denier")), "html", null, true);
        echo " ablehnt:

";
        // line 5
        if ((isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason"))) {
            // line 6
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
        return "IntranetBundle:Campaign:mailDenied.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  39 => 8,  34 => 6,  32 => 5,  25 => 3,  19 => 1,);
    }
}
