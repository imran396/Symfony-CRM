<?php

/* IntranetBundle:Macroses:budgetPeriodMacro.html.twig */
class __TwigTemplate_cf5d18bb369812dd847396e2c32b0b5e8aa64014ab51e081755e548a28474ac1 extends Twig_Template
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
    }

    // line 1
    public function getbudgetList($__entities__ = null, $__showActions__ = null, $__addBudgetWithForm__ = null, $__span__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "showActions" => $__showActions__,
            "addBudgetWithForm" => $__addBudgetWithForm__,
            "span" => $__span__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"block ";
            // line 3
            echo twig_escape_filter($this->env, (isset($context["span"]) ? $context["span"] : $this->getContext($context, "span")), "html", null, true);
            echo "\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
            // line 4
            echo $this->env->getExtension('translator')->getTranslator()->trans("Budget periods", array(), "messages");
            echo "</div>
        <div class=\"block-body\">

            <table class=\"table\">
                <thead>
                <tr>

                    <th>";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("Start", array(), "messages");
            echo "</th>
                    <th>";
            // line 12
            echo $this->env->getExtension('translator')->getTranslator()->trans("End", array(), "messages");
            echo "</th>
                    <th>";
            // line 13
            echo $this->env->getExtension('translator')->getTranslator()->trans("Budget", array(), "messages");
            echo "</th>
                    <th>";
            // line 14
            echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
            echo "</th>
                </tr>
                </thead>
                <tbody>

                ";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 20
                echo "                    <tr>
                        <td>";
                // line 21
                if ($this->getAttribute($context["entity"], "start", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                }
                echo "</td>
                        <td>";
                // line 22
                if ($this->getAttribute($context["entity"], "end", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                }
                echo "</td>
                        <td>";
                // line 23
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["entity"], "budget", array()), 0, "", "."), "html", null, true);
                echo " €</td>
                        <td>

                            <a class=\"btn btn-table-actions\"
                               href=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("budgetperiod_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                echo "</a>

                            ";
                // line 29
                if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
                    // line 30
                    echo "                                <a class=\"btn btn-table-actions\"
                                   href=\"";
                    // line 31
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("budgetperiod_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
                    echo "</a>
                            ";
                }
                // line 33
                echo "
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                </tbody>
            </table>
           ";
            // line 39
            if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
                // line 40
                echo "            ";
                if ((isset($context["addBudgetWithForm"]) ? $context["addBudgetWithForm"] : $this->getContext($context, "addBudgetWithForm"))) {
                    // line 41
                    echo "                ";
                    echo                     $this->env->getExtension('form')->renderer->renderBlock((isset($context["addBudgetWithForm"]) ? $context["addBudgetWithForm"] : $this->getContext($context, "addBudgetWithForm")), 'form');
                    echo "
            ";
                }
                // line 43
                echo "           ";
            }
            // line 44
            echo "
        </div>
    </div>

";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:budgetPeriodMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 44,  141 => 43,  135 => 41,  132 => 40,  130 => 39,  126 => 37,  117 => 33,  110 => 31,  107 => 30,  105 => 29,  98 => 27,  91 => 23,  85 => 22,  79 => 21,  76 => 20,  72 => 19,  64 => 14,  60 => 13,  56 => 12,  52 => 11,  42 => 4,  38 => 3,  35 => 2,  21 => 1,);
    }
}
