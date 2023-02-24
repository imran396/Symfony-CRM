<?php

/* IntranetBundle:CampaignSavingReport:reportTable.html.twig */
class __TwigTemplate_bd47e0b30b1df8541608e5d1b92cd27f91ced02b080f1082cd18d122cd2d0697 extends Twig_Template
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
        echo "<table class=\"table\">
    <tr>
        <th width=\"50%\">Customer Name</th>
        <th width=\"25%\">Total Budget</th>
        <th width=\"25%\">Total Regular Price</th>
    </tr>
";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["_key"] => $context["customer"]) {
            // line 8
            echo " <tr>
    <td>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["customer"], "name", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 10
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["customer"], "totalBudget", array()), 2, ".", ","), "html", null, true);
            echo "</td>
    <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["customer"], "totalPrice", array()), 2, ".", ","), "html", null, true);
            echo "</td>
 </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CampaignSavingReport:reportTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 14,  42 => 11,  38 => 10,  34 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
