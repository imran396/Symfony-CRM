<?php

/* IntranetBundle:Task:mailOverdue.html.twig */
class __TwigTemplate_4869620c5d00c45818dac6057f285e4a3ac7d69b10e5ccf0eb8415431a913b3f extends Twig_Template
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
        echo "Guten Tag, 

der Auftrag ";
        // line 3
        echo twig_escape_filter($this->env, sprintf("AG%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "\" wurde Ihnen zugewiesen und ist überfällig.

Fälligkeitsdatum: ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dueDate", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "
 
<a href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:mailOverdue.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 7,  30 => 5,  23 => 3,  19 => 1,);
    }
}
