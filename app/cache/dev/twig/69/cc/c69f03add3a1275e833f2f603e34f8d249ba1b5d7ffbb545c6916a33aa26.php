<?php

/* IntranetBundle:City:indexTable.html.twig */
class __TwigTemplate_69ccc69f03add3a1275e833f2f603e34f8d249ba1b5d7ffbb545c6916a33aa26 extends Twig_Template
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
        echo "
<table id=\"indexTable\" class=\"table\">
        <thead>
            <tr>
                <th> ";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
                <th> ";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
                <th> ";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Population", array(), "messages");
        echo "</th>
                <th> ";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 13
            echo "            <tr>
                <td>";
            // line 14
            echo twig_escape_filter($this->env, sprintf("CT%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["entity"], "population", array()), 0, ","), "html", null, true);
            echo "</td>
                <td>
                 <div class=\"inline-forms\">
                        <a  class=\"btn btn-table-actions\"  href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("city_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                        <a  class=\"btn btn-table-actions\"  href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("city_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                </div>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "        </tbody>
    </table>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:City:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 25,  71 => 20,  65 => 19,  59 => 16,  55 => 15,  51 => 14,  48 => 13,  44 => 12,  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
