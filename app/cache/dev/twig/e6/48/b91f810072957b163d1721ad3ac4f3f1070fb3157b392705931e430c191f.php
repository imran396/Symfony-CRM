<?php

/* IntranetBundle:Campaign:mailApprove.html.twig */
class __TwigTemplate_e648b91f810072957b163d1721ad3ac4f3f1070fb3157b392705931e430c191f extends Twig_Template
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

eine neue Kampagne \"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
        echo "\" liegt zur Freigabe vor.

<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>

";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true);
        echo "

Wie können wir Ihnen helfen?
<a href=\"http://www.beon-support.de/\">www.beon-support.de</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:mailApprove.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 7,  28 => 5,  23 => 3,  19 => 1,);
    }
}
