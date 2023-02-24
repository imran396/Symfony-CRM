<?php

/* IntranetBundle:BudgetPeriod:show.html.twig */
class __TwigTemplate_ae0f64578a32997b03934061ba1ab1064172c31822fd810f289e21ee1148ad25 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "     ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

     ";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0f976c9_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0f976c9_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/0f976c9_flot_1.css");
            // line 8
            echo "     <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
     ";
        } else {
            // asset "0f976c9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0f976c9") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/0f976c9.css");
            echo "     <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
     ";
        }
        unset($context["asset_url"]);
        // line 10
        echo "
 ";
    }

    // line 14
    public function block_javascripts($context, array $blocks = array())
    {
        // line 15
        echo "         ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

         ";
        // line 17
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c617101_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c617101_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/c617101_jquery.flot_1.js");
            // line 20
            echo "         <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
         ";
            // asset "c617101_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c617101_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/c617101_jquery.flot.pie_2.js");
            echo "         <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
         ";
        } else {
            // asset "c617101"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c617101") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/c617101.js");
            echo "         <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
         ";
        }
        unset($context["asset_url"]);
        // line 22
        echo "

         <script>
             var data = ";
        // line 25
        echo twig_jsonencode_filter($this->getAttribute((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")), 0, array()));
        echo ";


             var placeholder = \$(\"#line-chart\");
             (function (\$) {
                 placeholder.unbind();

                 if (data) {
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

                 function labelFormatter(label, series) {
                     return \"<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>\" + label + \"<br/>\" + Math.round(series.percent) + \"%</div>\";
                 }

             })(jQuery);

         </script>

     ";
    }

    // line 64
    public function block_content($context, array $blocks = array())
    {
        // line 65
        echo "
    <div class=\"row-fluid\">

        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 69
        echo $this->env->getExtension('translator')->getTranslator()->trans("Budget period", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                        <tr>
                            <th>";
        // line 75
        echo $this->env->getExtension('translator')->getTranslator()->trans("Start", array(), "messages");
        echo "</th>
                            <td>";
        // line 76
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 79
        echo $this->env->getExtension('translator')->getTranslator()->trans("End", array(), "messages");
        echo "</th>
                            <td>";
        // line 80
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 83
        echo $this->env->getExtension('translator')->getTranslator()->trans("Budget", array(), "messages");
        echo "</th>
                            <td>";
        // line 84
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "budget", array()), 0, ",", "."), "html", null, true);
        echo " €</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("budgetperiod_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        Edit
                    </a>
                    ";
        // line 94
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
            </div>
        </div>

    </div>
    ";
        // line 100
        if ((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart"))) {
            // line 101
            echo "
        <div class=\"row-fluid\">
            <div class=\"block\">
                <p class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#chart-container\">
                    ";
            // line 105
            echo $this->env->getExtension('translator')->getTranslator()->trans("Budget", array(), "messages");
            echo " ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "start", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo " &ndash; ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "end", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo ": ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "budget", array()), 0, ",", "."), "html", null, true);
            echo " €</p>

                <div id=\"chart_container\" class=\"block-body collapse in\">
                    <div id=\"line-chart\"></div>
                </div>

                ";
            // line 111
            if (($this->getAttribute((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")), 1, array()) < 0)) {
                // line 112
                echo "                    <div style=\"padding: 10px;\"><i style=\"color: red;font-size: 24px; padding-right: 5px;\"
                                                   class=\"icon-warning-sign\"></i>";
                // line 113
                echo $this->env->getExtension('translator')->getTranslator()->trans("Period is over budget by %amount% amount and %percent% percent", array("%amount%" => twig_number_format_filter($this->env, $this->getAttribute(twig_split_filter($this->env, $this->getAttribute((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")), 1, array()), "-"), 1, array(), "array"), 2), "%percent%" => twig_number_format_filter($this->env, (($this->getAttribute(twig_split_filter($this->env, $this->getAttribute((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")), 1, array()), "-"), 1, array(), "array") * 100) / ($this->getAttribute(twig_split_filter($this->env, $this->getAttribute((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")), 1, array()), "-"), 1, array(), "array") + $this->getAttribute($this->getAttribute((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart")), 2, array()), "budget", array()))), 2)), "messages");
                // line 114
                echo "                    </div>
                ";
            }
            // line 116
            echo "
            </div>

        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:BudgetPeriod:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 116,  243 => 114,  241 => 113,  238 => 112,  236 => 111,  217 => 105,  211 => 101,  209 => 100,  200 => 94,  194 => 91,  184 => 84,  180 => 83,  174 => 80,  170 => 79,  164 => 76,  160 => 75,  151 => 69,  145 => 65,  142 => 64,  100 => 25,  95 => 22,  75 => 20,  71 => 17,  65 => 15,  62 => 14,  57 => 10,  43 => 8,  39 => 7,  33 => 5,  30 => 4,);
    }
}
