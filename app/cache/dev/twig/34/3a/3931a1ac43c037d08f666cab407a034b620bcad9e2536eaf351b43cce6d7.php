<?php

/* IntranetBundle:Timetracking:show.html.twig */
class __TwigTemplate_343a3931a1ac43c037d08f666cab407a034b620bcad9e2536eaf351b43cce6d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("timetracking_new");
        echo "\" class=\"btn\"><i class=\"icon-plus\"></i>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New time tracking entry", array(), "messages");
        echo "</a>
    </div>

    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("Time Tracking", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                      <tbody>
                        <tr>
                            <th>";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
                            <td>";
        // line 18
        echo twig_escape_filter($this->env, sprintf("TT%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Day", array(), "messages");
        echo "</th>
                            <td>";
        // line 23
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "day", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 26
        echo $this->env->getExtension('translator')->getTranslator()->trans("Hours/Price", array(), "messages");
        echo "</th>
                            <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->ttCalcPriceFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "hours", array()), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tariff", array())), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 30
        echo $this->env->getExtension('translator')->getTranslator()->trans("Note", array(), "messages");
        echo "</th>
                            <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "note", array()), "html", null, true);
        echo "</td>
                        </tr>

                        ";
        // line 34
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array())))) {
            // line 35
            echo "                            <tr>
                                <th>";
            // line 36
            echo $this->env->getExtension('translator')->getTranslator()->trans("Username", array(), "messages");
            echo "</th>
                                <td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "html", null, true);
            echo "</a>
                                </td>
                            </tr>
                        ";
        }
        // line 41
        echo "
                        ";
        // line 42
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())))) {
            // line 43
            echo "                            <tr>
                                <th>";
            // line 44
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
            echo "</th>
                                <td>
                                    <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
            echo "</a>
                                </td>
                            </tr>
                        ";
        }
        // line 50
        echo "
                        ";
        // line 51
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", array())))) {
            // line 52
            echo "                            <tr>
                                <th>";
            // line 53
            echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
            echo "</th>
                                <td>
                                    <a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", array()), "html", null, true);
            echo "</a>
                                </td>
                            </tr>
                        ";
        }
        // line 59
        echo "
                        ";
        // line 60
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array())))) {
            // line 61
            echo "                            <tr>
                                <th>";
            // line 62
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
            echo "</th>
                                <td>
                                    <a href=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "html", null, true);
            echo "</a>
                                </td>
                            </tr>
                        ";
        }
        // line 68
        echo "
                        </tbody>
                    </table>
                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("timetracking_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 75
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 76
        echo "                    </a>
                    ";
        // line 77
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
            </div>
        </div>


    </div>


";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Timetracking:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 77,  193 => 76,  191 => 75,  187 => 74,  179 => 68,  170 => 64,  165 => 62,  162 => 61,  160 => 60,  157 => 59,  148 => 55,  143 => 53,  140 => 52,  138 => 51,  135 => 50,  126 => 46,  121 => 44,  118 => 43,  116 => 42,  113 => 41,  104 => 37,  100 => 36,  97 => 35,  95 => 34,  89 => 31,  85 => 30,  79 => 27,  75 => 26,  69 => 23,  65 => 22,  58 => 18,  54 => 17,  45 => 11,  34 => 5,  31 => 4,  28 => 3,);
    }
}
