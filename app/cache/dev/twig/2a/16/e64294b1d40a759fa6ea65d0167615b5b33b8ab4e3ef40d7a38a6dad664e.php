<?php

/* IntranetBundle:Dashboard:index.html.twig */
class __TwigTemplate_2a16e64294b1d40a759fa6ea65d0167615b5b33b8ab4e3ef40d7a38a6dad664e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'customerDashboard' => array($this, 'block_customerDashboard'),
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

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "     ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
     ";
        // line 5
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0f976c9_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0f976c9_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/0f976c9_flot_1.css");
            // line 6
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
    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        // line 11
        echo "     ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
     ";
        // line 12
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5e68e1a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5e68e1a_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/5e68e1a_jquery.flot_1.js");
            // line 17
            echo "     <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
     ";
            // asset "5e68e1a_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5e68e1a_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/5e68e1a_jquery.flot.pie_2.js");
            echo "     <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
     ";
            // asset "5e68e1a_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5e68e1a_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/5e68e1a_jquery.flot.time_3.js");
            echo "     <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
     ";
            // asset "5e68e1a_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5e68e1a_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/5e68e1a_jquery.flot.dashes_4.js");
            echo "     <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
     ";
        } else {
            // asset "5e68e1a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5e68e1a") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/5e68e1a.js");
            echo "     <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
     ";
        }
        unset($context["asset_url"]);
        // line 19
        echo "
     <script type=\"text/javascript\">

         \$(function () {
             var fblogdata = ";
        // line 23
        echo ((array_key_exists("fblog", $context)) ? ((isset($context["fblog"]) ? $context["fblog"] : $this->getContext($context, "fblog"))) : ("[]"));
        echo ";

             \$.plot(\"#facebookLog\", fblogdata, {
                 xaxis: { mode: \"time\" },
                 legend: { position: \"nw\" }
             });
         });

     </script>
";
    }

    // line 34
    public function block_customerDashboard($context, array $blocks = array())
    {
        // line 35
        echo "  ";
        if ((isset($context["customerName"]) ? $context["customerName"] : $this->getContext($context, "customerName"))) {
            // line 36
            echo "    ";
            if ($this->env->getExtension('security')->isGranted("ROLE_BUDGETCHART")) {
                // line 37
                echo "        <div class=\"row-fluid\">
            ";
                // line 38
                if ((isset($context["piechart"]) ? $context["piechart"] : $this->getContext($context, "piechart"))) {
                    // line 39
                    echo "                ";
                    $this->env->loadTemplate("IntranetBundle:BudgetPeriod:_budgetpiechart.html.twig")->display($context);
                    // line 40
                    echo "            ";
                }
                // line 41
                echo "
            ";
                // line 42
                if ((isset($context["budgets"]) ? $context["budgets"] : $this->getContext($context, "budgets"))) {
                    // line 43
                    echo "                ";
                    $this->env->loadTemplate("IntranetBundle:Dashboard:_budget.html.twig")->display($context);
                    // line 44
                    echo "            ";
                }
                // line 45
                echo "        </div>
    ";
            }
            // line 47
            echo "
    ";
            // line 48
            $this->env->loadTemplate("IntranetBundle:Customer:dateNotesRow.html.twig")->display($context);
            // line 49
            echo "
    ";
            // line 50
            if ((isset($context["unifiedData"]) ? $context["unifiedData"] : $this->getContext($context, "unifiedData"))) {
                // line 51
                echo "        <div class=\"row-fluid\">
            ";
                // line 52
                $this->env->loadTemplate("IntranetBundle:Dashboard:_unifiedlist.html.twig")->display($context);
                // line 53
                echo "        </div>
    ";
            }
            // line 55
            echo "
    ";
            // line 56
            if (((isset($context["fblog"]) ? $context["fblog"] : $this->getContext($context, "fblog")) != "[]")) {
                // line 57
                echo "        <div class=\"row-fluid\">
            ";
                // line 58
                $this->env->loadTemplate("IntranetBundle:Dashboard:_fblog.html.twig")->display($context);
                // line 59
                echo "        </div>
    ";
            }
            // line 61
            echo "  ";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Dashboard:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 61,  186 => 59,  184 => 58,  181 => 57,  179 => 56,  176 => 55,  172 => 53,  170 => 52,  167 => 51,  165 => 50,  162 => 49,  160 => 48,  157 => 47,  153 => 45,  150 => 44,  147 => 43,  145 => 42,  142 => 41,  139 => 40,  136 => 39,  134 => 38,  131 => 37,  128 => 36,  125 => 35,  122 => 34,  108 => 23,  102 => 19,  70 => 17,  66 => 12,  61 => 11,  58 => 10,  42 => 6,  38 => 5,  33 => 4,  30 => 3,);
    }
}
