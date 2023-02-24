<?php

/* IntranetBundle:SurveyResult:indexTable.html.twig */
class __TwigTemplate_53c3436020bd15215baac245a5df4af9a17f2516ba60c48669d4b7a26be1f0f1 extends Twig_Template
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
        echo "<table id=\"indexTable\" class=\"table\">
    <thead>
    <tr>
        <th>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Date", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
        echo "</th>
        <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 12
            echo "        <tr>
            <td>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 14
            if ($this->getAttribute($context["entity"], "date", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "date", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "customer", array()), "name", array()), "html", null, true);
            echo "</td>
            <td>
               <a class=\"btn btn-table-actions\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("surveyresult_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
               <a class=\"btn btn-table-actions\" href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("surveyresult_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SurveyResult:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 22,  71 => 18,  65 => 17,  60 => 15,  54 => 14,  50 => 13,  47 => 12,  43 => 11,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
