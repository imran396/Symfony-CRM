<?php

/* IntranetBundle:AccessLevel:indexTable.html.twig */
class __TwigTemplate_3b0cbca0e2c4af227fd414879960623fc102fab4f58cf37c8ec13caab98e649a extends Twig_Template
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
                <th>Name</th>
                <th>For customers</th>
                <th>For employees</th>
                <th>For others</th>
                <th>Actions</th>
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
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute($context["entity"], "forCustomers", array()))), "html", null, true);
            echo "</td>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute($context["entity"], "forEmployees", array()))), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute($context["entity"], "forOthers", array()))), "html", null, true);
            echo "</td>
                <td>

                 <div class=\"inline-forms\">
                        <a  class=\"btn btn-table-actions\"  href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("accesslevel_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                        <a  class=\"btn btn-table-actions\"  href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("accesslevel_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
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
        // line 29
        echo "        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:AccessLevel:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 29,  65 => 23,  59 => 22,  52 => 18,  48 => 17,  44 => 16,  40 => 15,  37 => 14,  33 => 13,  19 => 1,);
    }
}
