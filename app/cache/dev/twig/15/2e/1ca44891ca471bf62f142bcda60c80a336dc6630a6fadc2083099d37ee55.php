<?php

/* IntranetBundle:Customer:indexTable.html.twig */
class __TwigTemplate_152e1ca44891ca471bf62f142bcda60c80a336dc6630a6fadc2083099d37ee55 extends Twig_Template
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
        echo "<table class=\"table\">
        <thead>
        <tr>
            <th>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
            <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
            <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Address", array(), "messages");
        echo "</th>
            <th>";
        // line 7
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
                <td style=\"width: 80px;\">";
            // line 14
            echo twig_escape_filter($this->env, sprintf("KU%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "address", array()), "html", null, true);
            echo "</td>

                <td>
                    <a class=\"btn btn-table-actions\"
                       href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 24,  66 => 20,  59 => 16,  55 => 15,  51 => 14,  48 => 13,  44 => 12,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
