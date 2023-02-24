<?php

/* IntranetBundle:Timetracking:listChunk.html.twig */
class __TwigTemplate_e4f8f28723f438131406cd91060f9e28a5af0fccebf452ae87cdce4a2a020a77 extends Twig_Template
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
        if (twig_length_filter($this->env, (isset($context["timetrackingEntities"]) ? $context["timetrackingEntities"] : $this->getContext($context, "timetrackingEntities")))) {
            // line 2
            echo "\t<div class=\"clear\">&nbsp;</div>
\t<div class=\"row-fluid\">
\t\t<div class=\"block span12\">
\t\t\t<div class=\"block-heading\">
\t\t\t      ";
            // line 6
            echo $this->env->getExtension('translator')->getTranslator()->trans("Time Tracking", array(), "messages");
            // line 7
            echo "\t\t\t</div>
\t\t\t<table id=\"indexTable\" class=\"table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 12
            echo $this->env->getExtension('translator')->getTranslator()->trans("User Name", array(), "messages");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 13
            echo $this->env->getExtension('translator')->getTranslator()->trans("Day", array(), "messages");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 14
            echo $this->env->getExtension('translator')->getTranslator()->trans("Hours", array(), "messages");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 15
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
            echo " / ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 16
            echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
            echo "</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["timetrackingEntities"]) ? $context["timetrackingEntities"] : $this->getContext($context, "timetrackingEntities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 21
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 22
                echo twig_escape_filter($this->env, sprintf("TT%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td><a href=\"";
                // line 23
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute($context["entity"], "user", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 24
                if ($this->getAttribute($context["entity"], "day", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "day", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                }
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "hours", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 26
                echo twig_escape_filter($this->env, (($this->getAttribute($context["entity"], "task", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["entity"], "task", array()), $this->getAttribute($context["entity"], "customer", array()))) : ($this->getAttribute($context["entity"], "customer", array()))), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div class=\"inline-forms\">
\t\t\t\t\t\t\t\t<a  class=\"btn btn-table-actions\"  href=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("timetracking_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                echo "</a>
\t\t\t\t\t\t\t\t<a  class=\"btn btn-table-actions\"  href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("timetracking_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
                echo "</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Timetracking:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 35,  103 => 30,  97 => 29,  91 => 26,  87 => 25,  81 => 24,  75 => 23,  71 => 22,  68 => 21,  64 => 20,  57 => 16,  51 => 15,  47 => 14,  43 => 13,  39 => 12,  35 => 11,  29 => 7,  27 => 6,  21 => 2,  19 => 1,);
    }
}
