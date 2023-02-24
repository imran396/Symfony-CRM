<?php

/* IntranetBundle:CustomerFacebookUrl:indexTable.html.twig */
class __TwigTemplate_09efab43bab0a5aeb637b8aca0ce49574ca74cd0f92b8db7cd550b6b9bb122ce extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo "</th>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Isown", array(), "messages");
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
            echo "        <tr>
            <td>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "customer", array()), "name", array()), "html", null, true);
            echo "</td>
            <td><a target=\"_blank\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "facebookUrl", array()), "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "facebookUrl", array()), "url", array()), 50), "html", null, true);
            echo "</a></td>
            <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->boolFilter($this->getAttribute($context["entity"], "isOwn", array())), "html", null, true);
            echo "</td>
            <td>
                <a class=\"btn btn-table-actions\"
                   href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customerfacebookurl_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                ";
            // line 20
            if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
                // line 21
                echo "                    <a class=\"btn btn-table-actions\"
                       href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customerfacebookurl_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
                echo "</a>
                ";
            }
            // line 24
            echo "            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CustomerFacebookUrl:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 27,  85 => 24,  78 => 22,  75 => 21,  73 => 20,  67 => 19,  61 => 16,  55 => 15,  51 => 14,  48 => 13,  44 => 12,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
