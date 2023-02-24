<?php

/* IntranetBundle:Dashboard:_unifiedlistChunk.html.twig */
class __TwigTemplate_a9eea4ab86282d6d2bc45d412f05cdf17f680cc3bcf0427fd3e8741fcf50eda2 extends Twig_Template
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
        echo "<tr class=\"";
        if ((isset($context["todo"]) ? $context["todo"] : $this->getContext($context, "todo"))) {
            echo "todo";
        }
        echo "\">
    <td>
        ";
        // line 3
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), 80, true), "html", null, true);
        echo "
    </td>
    <td>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "</td>

    <td>";
        // line 7
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "approved", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()))), "html", null, true);
        }
        echo "</td>
    <td>";
        // line 8
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
        echo "</td>

    <td>
        ";
        // line 11
        if ((isset($context["path_url"]) ? $context["path_url"] : $this->getContext($context, "path_url"))) {
            // line 12
            echo "            ";
            if (((((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "pressrelease") && $this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES")) || (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "note") && $this->env->getExtension('security')->isGranted("ROLE_NOTES"))) || (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "campaign") && $this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS"))) || (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "task") && $this->env->getExtension('security')->isGranted("ROLE_TASKS")))) {
                // line 13
                echo "                <a class=\"btn btn-table-actions\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["path_url"]) ? $context["path_url"] : $this->getContext($context, "path_url")), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">
                    ";
                // line 14
                echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                // line 15
                echo "                </a>
            ";
            }
            // line 17
            echo "        ";
        }
        // line 18
        echo "
    </td>

</tr>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Dashboard:_unifiedlistChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 18,  65 => 17,  61 => 15,  59 => 14,  54 => 13,  51 => 12,  49 => 11,  43 => 8,  37 => 7,  32 => 5,  27 => 3,  19 => 1,);
    }
}
