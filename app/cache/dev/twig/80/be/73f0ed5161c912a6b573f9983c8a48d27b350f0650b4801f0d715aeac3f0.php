<?php

/* IntranetBundle:ConfigValue:indexTable.html.twig */
class __TwigTemplate_80be73f0ed5161c912a6b573f9983c8a48d27b350f0650b4801f0d715aeac3f0 extends Twig_Template
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
                <th>Description</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 12
            echo "            ";
            if (twig_in_filter($this->getAttribute($context["entity"], "role", array()), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "roles", array()))) {
                // line 13
                echo "                <tr>
                    <td>";
                // line 14
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($context["entity"], "description", array()), 100), "html", null, true);
                echo "</td>
                    <td>";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "value", array()), "html", null, true);
                echo "</td>
                    <td>
                      <div class=\"inline-forms\">
                        <a  class=\"btn btn-table-actions\"  href=\"";
                // line 18
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("configvalue_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\"> ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                echo "</a>
                        <a  class=\"btn btn-table-actions\"  href=\"";
                // line 19
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("configvalue_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\"> ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
                echo "</a>
                      </div>
                    </td>

            ";
            }
            // line 23
            echo "</tr>
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
        return "IntranetBundle:ConfigValue:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 25,  67 => 23,  57 => 19,  51 => 18,  45 => 15,  41 => 14,  38 => 13,  35 => 12,  31 => 11,  19 => 1,);
    }
}
