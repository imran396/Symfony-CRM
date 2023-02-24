<?php

/* IntranetBundle:Upload:notification.html.twig */
class __TwigTemplate_18fd30347e443a71c5775d76c4955cbb2455ad807ba1b52503980b1453f5c377 extends Twig_Template
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

für \"<a href=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
        echo "</a>\" wurde eine Rechnung bereitgestellt.

";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["uploads"]) ? $context["uploads"] : $this->getContext($context, "uploads")));
        foreach ($context['_seq'] as $context["_key"] => $context["upload"]) {
            // line 6
            echo "    Download: <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["upload"], "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["upload"], "name", array()), "html", null, true);
            echo "</a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upload'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "

Wie können wir Ihnen helfen?
<a href=\"http://www.beon-support.de/\">www.beon-support.de</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Upload:notification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 8,  34 => 6,  30 => 5,  23 => 3,  19 => 1,);
    }
}
