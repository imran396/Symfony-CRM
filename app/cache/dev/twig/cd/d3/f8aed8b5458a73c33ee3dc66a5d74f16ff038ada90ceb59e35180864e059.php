<?php

/* IntranetBundle:Task:mailDenied.html.twig */
class __TwigTemplate_cdd3f8aed8b5458a73c33ee3dc66a5d74f16ff038ada90ceb59e35180864e059 extends Twig_Template
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

der Auftrag ";
        // line 3
        echo twig_escape_filter($this->env, sprintf("AG%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "\" ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())) {
            echo "von ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "name", array()), "html", null, true);
            echo " ";
        }
        echo "hat durch ";
        echo twig_escape_filter($this->env, (isset($context["denier"]) ? $context["denier"] : $this->getContext($context, "denier")), "html", null, true);
        echo " folgende Änderungswünsche:

";
        // line 5
        if ((isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason"))) {
            // line 6
            echo twig_escape_filter($this->env, (isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason")), "html", null, true);
            echo "
";
        } else {
            // line 8
            echo "(keine Eingabe)
";
        }
        // line 10
        echo " 
<a href=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:mailDenied.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  51 => 10,  47 => 8,  42 => 6,  40 => 5,  25 => 3,  19 => 1,);
    }
}
