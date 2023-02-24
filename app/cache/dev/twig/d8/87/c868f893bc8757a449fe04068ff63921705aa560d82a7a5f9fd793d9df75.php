<?php

/* IntranetBundle:Complaint:mailNotify.html.twig */
class __TwigTemplate_d887c868f893bc8757a449fe04068ff63921705aa560d82a7a5f9fd793d9df75 extends Twig_Template
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

für Sie wurde eine Beschwerde in EMAT angelegt.

";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "subject", array()), "html", null, true);
        echo "

";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "body", array()), "html", null, true);
        echo "


Bitte setzen Sie sich mit ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "html", null, true);
        echo " in Verbindung, wenn Sie auf diese Beschwerde reagieren möchten.


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
        return "IntranetBundle:Complaint:mailNotify.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 13,  36 => 10,  30 => 7,  25 => 5,  19 => 1,);
    }
}
