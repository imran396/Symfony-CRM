<?php

/* IntranetBundle:Pressrelease:mailPressSubmit.html.twig */
class __TwigTemplate_7b88ceede98c01dc5d3dc89d97f7806e0c005187d36f2bbb3e68e8b84438ff39 extends Twig_Template
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
        echo "Sehr geehrte Damen und Herren,

in der Anlage senden wir Ihnen die Pressemitteilung \"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "\" mit der Bitte um Veröffentlichung zu.

Am Ende der Pressemitteilung finden Sie Links zu Bildern, Logo und Flyern. Bei Fragen oder Wünschen stehen wir Ihnen gerne zur Verfügung.

Wir freuen uns immer, wenn Sie uns einen Link der Veröffentlichung zusenden, gerne per Email an info@beon-communications.de

Vielen Dank!

";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:mailPressSubmit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  23 => 3,  19 => 1,);
    }
}
