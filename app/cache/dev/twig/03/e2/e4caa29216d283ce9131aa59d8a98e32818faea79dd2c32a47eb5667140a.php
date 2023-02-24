<?php

/* IntranetBundle:CpspmReport:reportTable.html.twig */
class __TwigTemplate_03e2e4caa29216d283ce9131aa59d8a98e32818faea79dd2c32a47eb5667140a extends Twig_Template
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
        <th>Campaign ID</th>
        <th>Campaign Title</th>
        <th>Customer Name</th>
        <th>Supplier Name</th>
        ";
        // line 7
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "type", array()) == "cpm")) {
            // line 8
            echo "            <th>CPM</th>
        ";
        } else {
            // line 10
            echo "            <th>CPSPM</th>
        ";
        }
        // line 12
        echo "    </tr>
    ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
            // line 14
            echo "    <tr>
        <td><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute($context["record"], "campaignId", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["record"], "campaignId", array()), "html", null, true);
            echo "</a></td>
        <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["record"], "title", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["record"], "name", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["record"], "supplierName", array()), "html", null, true);
            echo "</td>
        ";
            // line 19
            if (($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "type", array()) == "cpm")) {
                // line 20
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["record"], "cpm", array()), 4, ",", "."), "html", null, true);
                echo "</td>
        ";
            } else {
                // line 22
                echo "            <td>";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["record"], "cpspm", array()), 4, ",", "."), "html", null, true);
                echo "</td>
        ";
            }
            // line 24
            echo "    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CpspmReport:reportTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 26,  79 => 24,  73 => 22,  67 => 20,  65 => 19,  61 => 18,  57 => 17,  53 => 16,  47 => 15,  44 => 14,  40 => 13,  37 => 12,  33 => 10,  29 => 8,  27 => 7,  19 => 1,);
    }
}
