<?php

/* IntranetBundle:Task:mailApprove.html.twig */
class __TwigTemplate_a6e22ed0e3ecf9e5c648abf38716dda8453b9dce883543e5e7191563ecb3db29 extends Twig_Template
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
        echo "Sehr geehrter Kunde,

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
Bitte erteilen Sie zeitnah die Freigabe oder teilen Sie uns Änderungswünsche mit.

";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true);
        echo "

Wie können wir Ihnen helfen?
<a href=\"http://www.beon-support.de/\">www.beon-support.de</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:mailApprove.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 13,  43 => 10,  37 => 8,  35 => 7,  28 => 5,  23 => 3,  19 => 1,);
    }
}
