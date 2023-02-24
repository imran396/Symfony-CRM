<?php

/* IntranetBundle:SurveyResult:show.html.twig */
class __TwigTemplate_c354f926cfd8eaac2438ad876d982b4d25c536b950f8b1e8989364da7d0b106f extends Twig_Template
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
        echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Survey result", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">

                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                        <tr>
                            <th>";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
        echo "</th>
                            <td><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
        echo "</a></td>
                        </tr>
                        <tr>
                            <th>";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Date", array(), "messages");
        echo "</th>
                            <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "date", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("Time in", array(), "messages");
        echo "</th>
                            <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "timeIn", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("Time out", array(), "messages");
        echo "</th>
                            <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "timeOut", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("Frequency", array(), "messages");
        echo "</th>
                            <td>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "frequency"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 35
        echo $this->env->getExtension('translator')->getTranslator()->trans("Welcome", array(), "messages");
        echo "</th>
                            <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "welcome"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 39
        echo $this->env->getExtension('translator')->getTranslator()->trans("Drinks", array(), "messages");
        echo "</th>
                            <td>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "drinks"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 43
        echo $this->env->getExtension('translator')->getTranslator()->trans("Drinksvalue", array(), "messages");
        echo "</th>
                            <td>";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "drinksValue"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 47
        echo $this->env->getExtension('translator')->getTranslator()->trans("Drinkswait", array(), "messages");
        echo "</th>
                            <td>";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "drinksWait"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 51
        echo $this->env->getExtension('translator')->getTranslator()->trans("Food", array(), "messages");
        echo "</th>
                            <td>";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "food"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 55
        echo $this->env->getExtension('translator')->getTranslator()->trans("Foodvalue", array(), "messages");
        echo "</th>
                            <td>";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "foodValue"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 59
        echo $this->env->getExtension('translator')->getTranslator()->trans("Foodwait", array(), "messages");
        echo "</th>
                            <td>";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "foodWait"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 63
        echo $this->env->getExtension('translator')->getTranslator()->trans("Service", array(), "messages");
        echo "</th>
                            <td>";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "service"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 67
        echo $this->env->getExtension('translator')->getTranslator()->trans("Music", array(), "messages");
        echo "</th>
                            <td>";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "music"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 71
        echo $this->env->getExtension('translator')->getTranslator()->trans("Atmosphere", array(), "messages");
        echo "</th>
                            <td>";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "atmosphere"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>Happyhour</th>
                            <td>";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "happyHour"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>Enchiladahour</th>
                            <td>";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "enchiladaHour"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>Casinomexicano</th>
                            <td>";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "casinoMexicano"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>Ladiesnight</th>
                            <td>";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "ladiesNight"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 91
        echo $this->env->getExtension('translator')->getTranslator()->trans("Overall", array(), "messages");
        echo "</th>
                            <td>";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getLabel", array(0 => "overall"), "method"), "html", null, true);
        echo "</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 100
        echo $this->env->getExtension('routing')->getPath("surveyresult");
        echo "\">
                            ";
        // line 101
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 102
        echo "                        </a>
                    </li>
                    <li>
                        <a href=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("surveyresult_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                            ";
        // line 106
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 107
        echo "                        </a>
                    </li>
                    <li>";
        // line 109
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
                </ul>
            </div>
        </div>


    </div>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SurveyResult:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 109,  259 => 107,  257 => 106,  253 => 105,  248 => 102,  246 => 101,  242 => 100,  231 => 92,  227 => 91,  221 => 88,  214 => 84,  207 => 80,  200 => 76,  193 => 72,  189 => 71,  183 => 68,  179 => 67,  173 => 64,  169 => 63,  163 => 60,  159 => 59,  153 => 56,  149 => 55,  143 => 52,  139 => 51,  133 => 48,  129 => 47,  123 => 44,  119 => 43,  113 => 40,  109 => 39,  103 => 36,  99 => 35,  93 => 32,  89 => 31,  83 => 28,  79 => 27,  73 => 24,  69 => 23,  63 => 20,  59 => 19,  51 => 16,  47 => 15,  37 => 8,  31 => 4,  28 => 3,);
    }
}
