<?php

/* IntranetBundle:Task:mailApproveInternal.html.twig */
class __TwigTemplate_d388cb83346f4a393be33a96a3d7972edd875cbcd34ba48ce96ea5f2b77a385a extends Twig_Template
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
        echo "Hallo,

der Grafik-Auftrag \"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
        echo "\" wurde bearbeitet und liegt zur Freigabe vor.

<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>

";
        // line 7
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array())) {
            // line 8
            echo "    Der Auftrag gehört zur Kampagne \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "html", null, true);
            echo "\".
";
        }
        // line 10
        echo "
";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:mailApproveInternal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 11,  43 => 10,  37 => 8,  35 => 7,  28 => 5,  23 => 3,  19 => 1,);
    }
}
