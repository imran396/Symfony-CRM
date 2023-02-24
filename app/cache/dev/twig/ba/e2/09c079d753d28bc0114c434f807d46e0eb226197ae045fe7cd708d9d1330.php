<?php

/* IntranetBundle:Task:mailSubmitFiles.html.twig */
class __TwigTemplate_bae209c079d753d28bc0114c434f807d46e0eb226197ae045fe7cd708d9d1330 extends Twig_Template
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

hiermit senden wir Ihnen die Links zu den Druckunterlagen zur Bestellung ";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "campaign", array()), "id", array()), "html", null, true);
        echo " von ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "campaign", array()), "customer", array()), "name", array()), "html", null, true);
        echo ".

";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : $this->getContext($context, "links")));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 6
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "href", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "filename", array()), "html", null, true);
            echo "</a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "
Falls die Druckunterlagen nicht den gewünschten Bedingungen entsprechen senden Sie uns bitte umgehend eine Email an info@beon-communications.de.


Vielen Dank.

";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:mailSubmitFiles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 14,  45 => 8,  34 => 6,  30 => 5,  23 => 3,  19 => 1,);
    }
}
