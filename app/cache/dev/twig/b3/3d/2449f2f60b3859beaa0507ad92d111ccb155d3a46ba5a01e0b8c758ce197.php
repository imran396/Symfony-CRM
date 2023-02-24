<?php

/* IntranetBundle:Timetracking:indexTable.html.twig */
class __TwigTemplate_b33d2449f2f60b3859beaa0507ad92d111ccb155d3a46ba5a01e0b8c758ce197 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("User Name", array(), "messages");
        echo "</th>
                <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Day", array(), "messages");
        echo "</th>
                <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Hours", array(), "messages");
        echo "</th>
                <th>";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo " / ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
        echo "</th>
                <th>";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 14
            echo "            <tr>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, sprintf("TT%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute($context["entity"], "user", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 17
            if ($this->getAttribute($context["entity"], "day", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "day", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "hours", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, (($this->getAttribute($context["entity"], "task", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["entity"], "task", array()), $this->getAttribute($context["entity"], "customer", array()))) : ($this->getAttribute($context["entity"], "customer", array()))), "html", null, true);
            echo "</td>
                <td>
\t\t<div class=\"inline-forms\">
\t\t\t    <a  class=\"btn btn-table-actions\"  href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("timetracking_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
\t\t\t    <a  class=\"btn btn-table-actions\"  href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("timetracking_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>

\t\t</div>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        </tbody>
    </table>


";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Timetracking:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 29,  92 => 23,  86 => 22,  80 => 19,  76 => 18,  70 => 17,  64 => 16,  60 => 15,  57 => 14,  53 => 13,  46 => 9,  40 => 8,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
