<?php

/* IntranetBundle:EnumValue:indexTable.html.twig */
class __TwigTemplate_8fc9dd60c2a42050c503b0e670d058d920052a4b65ce87c120189b163821960d extends Twig_Template
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
                <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Classname", array(), "messages");
        echo "</th>
                <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Value", array(), "messages");
        echo "</th>
                <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Reusable", array(), "messages");
        echo "</th>
                <th>";
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
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "className", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "value", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->boolFilter($this->getAttribute($context["entity"], "reusable", array())), "html", null, true);
            echo "</td>
                <td>
                    <a class=\"btn btn-table-actions\" href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enumvalue_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">edit</a>
                    <a class=\"btn btn-table-actions\" href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enumvalue_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">show</a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        </tbody>
    </table>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:EnumValue:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 23,  68 => 19,  64 => 18,  59 => 16,  55 => 15,  51 => 14,  48 => 13,  44 => 12,  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
