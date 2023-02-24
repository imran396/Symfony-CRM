<?php

/* IntranetBundle:MonitoredUrl:logList.html.twig */
class __TwigTemplate_acf076f8caf99f408a88b247cebb5676aa37c83d5b89cbb0bf1b26cfe29563bb extends Twig_Template
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
        echo "<div class=\"row-fluid\" id=\"indexTable\">
    <div class=\"block span12\">
    <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("Logs", array(), "messages");
        echo "</div>
        <div id=\"widget1container\" class=\"block-body collapse in\">
            <div id=\"tablewidget\" class=\"block-body collapse in\">
                <table class=\"table table-bordered\" >
                  <thead>
                    <tr>
                        <th>";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Date/Time", array(), "messages");
        echo "</th>
                        <th>";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("User Name", array(), "messages");
        echo "</th>
                    </tr>
                  </thead>
                  <tbody>
                  ";
        // line 14
        if ((!twig_test_empty((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs"))))) {
            // line 15
            echo "                      ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 16
                echo "                        <tr>
                            <td>";
                // line 17
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["log"], "createdAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
                echo "</td>
                            <td>";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "user", array()), "html", null, true);
                echo "</td>
                        </tr>
                       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "                   ";
        } else {
            // line 22
            echo "                    <tr>
                        <td colspan=\"2\">No records found.</td>
                    </tr>
                   ";
        }
        // line 26
        echo "                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:MonitoredUrl:logList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 26,  69 => 22,  66 => 21,  57 => 18,  53 => 17,  50 => 16,  45 => 15,  43 => 14,  36 => 10,  32 => 9,  23 => 3,  19 => 1,);
    }
}
