<?php

/* IntranetBundle:User:indexTable.html.twig */
class __TwigTemplate_03d9fa9075109524251cb086f1f44592c904834f70c922df4107fc9124bf9229 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Email", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 11
            echo "        <tr>
            <td>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "email", array()), "html", null, true);
            echo "</td>
            <td>
                <a class=\"btn btn-table-actions\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                <a class=\"btn btn-table-actions\" href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
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
        // line 20
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:User:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 20,  61 => 16,  55 => 15,  50 => 13,  46 => 12,  43 => 11,  39 => 10,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
