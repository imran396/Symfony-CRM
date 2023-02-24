<?php

/* IntranetBundle:Dashboard:_budget.html.twig */
class __TwigTemplate_39f910ca5a5f6bd533bfbd40c42274cf9ce2911909bb985d7b59facb7e970d27 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["budgets"]) ? $context["budgets"] : $this->getContext($context, "budgets")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 2
            echo "    <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("budgetperiod_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">
        ";
            // line 3
            if ($this->getAttribute($context["entity"], "start", array())) {
                // line 4
                echo "            ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                echo "
        ";
            }
            // line 6
            echo "        &ndash;

        ";
            // line 8
            if ($this->getAttribute($context["entity"], "end", array())) {
                // line 9
                echo "            ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                echo "
        ";
            }
            // line 11
            echo "    </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Dashboard:_budget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  48 => 11,  42 => 9,  40 => 8,  36 => 6,  30 => 4,  28 => 3,  23 => 2,  19 => 1,);
    }
}
