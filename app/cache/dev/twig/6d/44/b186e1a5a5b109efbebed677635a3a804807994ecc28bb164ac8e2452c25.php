<?php

/* IntranetBundle:FacebookUrl:indexTable.html.twig */
class __TwigTemplate_6d44b186e1a5a5b109efbebed677635a3a804807994ecc28bb164ac8e2452c25 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Url", array(), "messages");
        echo "</th>
                <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Alias", array(), "messages");
        echo "</th>
                <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Last post", array(), "messages");
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
                <td><a target=\"_blank\" href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($context["entity"], "url", array()), 50), "html", null, true);
            echo "</a></td>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "alias", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            if ($this->getAttribute($context["entity"], "lastPost", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "lastPost", array()), "d.m.Y H:i"), "html", null, true);
            }
            echo "</td>

                <td>
                    <a class=\"btn btn-table-actions markdone\" href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("facebookurl_postednow", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("mark done", array(), "messages");
            echo "</a>
                    <a class=\"btn btn-table-actions\" href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("facebookurl_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                    <a class=\"btn btn-table-actions\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("facebookurl_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
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
        // line 25
        echo "        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:FacebookUrl:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 25,  81 => 21,  75 => 20,  69 => 19,  61 => 16,  57 => 15,  51 => 14,  48 => 13,  44 => 12,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
