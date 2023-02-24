<?php

/* IntranetBundle:Pressrelease:mailApprove.html.twig */
class __TwigTemplate_ae406ce87b0c3c2669870e474d29571a1346fe71fdffc19fbb7567f7b480c6b4 extends Twig_Template
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

Sie haben eine Pressemitteilung/Imagetext \"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "\" mit der Bitte um Freigabe.

<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>

Bitte erteilen Sie zeitnah die Freigabe oder teilen Sie uns Änderungswünsche mit.

";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true);
        echo "
 
Wie können wir Ihnen helfen?
<a href=\"http://www.beon-support.de/\">www.beon-support.de</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:mailApprove.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 9,  28 => 5,  23 => 3,  19 => 1,);
    }
}
