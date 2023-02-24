<?php

/* IntranetBundle:Dashboard:_campaignpiechart.html.twig */
class __TwigTemplate_30806baf91ac46b8d88442ca8fe401fac20cfceec7f6b52ec3455ca1038ad619 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")));
        foreach ($context['_seq'] as $context["key"] => $context["currentBudget"]) {
            // line 2
            echo "
    <div class=\"block\">
        <p class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#chart-container1\">
           ";
            // line 5
            echo $this->env->getExtension('translator')->getTranslator()->trans("Budget", array(), "messages");
            echo " ";
            if ($this->getAttribute($this->getAttribute($context["currentBudget"], 2, array()), "start", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["currentBudget"], 2, array()), "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo " &ndash; ";
            if ($this->getAttribute($this->getAttribute($context["currentBudget"], 2, array()), "end", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["currentBudget"], 2, array()), "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo ": ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($context["currentBudget"], 2, array()), "budget", array()), 0, "", "."), "html", null, true);
            echo "</p>


        <div class=\"chart_container1\" class=\"block-body collapse in\">
            <div id=\"piecontainer";
            // line 9
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" class=\"line-chart \"></div>
 ";
            // line 10
            if (($this->getAttribute($context["currentBudget"], 1, array()) < 0)) {
                // line 11
                echo "
         <div style=\"padding: 10px;\"> <i style=\"color: red;font-size: 24px; padding-right: 5px;\" class=\"icon-warning-sign\"></i>";
                // line 12
                echo $this->env->getExtension('translator')->getTranslator()->trans("Period is over budget by", array(), "messages");
                echo " ";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(twig_split_filter($this->env, $this->getAttribute($context["currentBudget"], 1, array()), "-"), 1, array(), "array"), 0, "", "."), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute(twig_split_filter($this->env, $this->getAttribute($context["currentBudget"], 1, array()), "-"), 1, array(), "array") * 100) / ($this->getAttribute(twig_split_filter($this->env, $this->getAttribute($context["currentBudget"], 1, array()), "-"), 1, array(), "array") + $this->getAttribute($this->getAttribute($context["currentBudget"], 2, array()), "budget", array()))), 2), "html", null, true);
                echo " %)</div>
";
            }
            // line 14
            echo "        </div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['currentBudget'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
<script>


    \$(document).ready(function () {

        var data = new Array();

        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")));
        foreach ($context['_seq'] as $context["key"] => $context["currentBudget"]) {
            // line 26
            echo "
            data[";
            // line 27
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "] = ";
            echo twig_jsonencode_filter($this->getAttribute($context["currentBudget"], 0, array()));
            echo ";

            getPieChart(data[";
            // line 29
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "], \$(\"#piecontainer";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"));

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['currentBudget'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
    });

    function getPieChart(data, placeholder) {
        if (data) {

            placeholder.unbind();
            \$.plot(placeholder, data, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 3 / 4,
                            formatter: labelFormatter,
                            background: {
                                opacity: 0.8
                            }
                        }
                    }
                },
                legend: {
                    show: true
                }
            });
        }
    }

    function labelFormatter(label, series) {
        return \"<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>\" + label + \"<br/>\" + Math.round(series.percent) + \"%</div>\";
    }

</script>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Dashboard:_campaignpiechart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 32,  95 => 29,  88 => 27,  85 => 26,  81 => 25,  71 => 17,  63 => 14,  54 => 12,  51 => 11,  49 => 10,  45 => 9,  28 => 5,  23 => 2,  19 => 1,);
    }
}
