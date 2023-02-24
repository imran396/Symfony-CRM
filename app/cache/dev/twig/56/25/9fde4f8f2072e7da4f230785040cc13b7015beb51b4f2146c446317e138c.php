<?php

/* IntranetBundle:Note:list.html.twig */
class __TwigTemplate_56259fde4f8f2072e7da4f230785040cc13b7015beb51b4f2146c446317e138c extends Twig_Template
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
        echo "<a href=\"javascript:void(0)\">Create New Note</a>
<table id=\"indexTable\" class=\"table\">
    <thead>
    <tr>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Text", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
        <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
        echo "</th>
      </tr>
    </thead>
    <tbody>

    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["monitoredUrlEntities"]) ? $context["monitoredUrlEntities"] : $this->getContext($context, "monitoredUrlEntities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 13
            echo "\t<tr>
\t    <td>
\t\t<span title=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "text", array()), "html", null, true);
            echo "\">
\t\t    ";
            // line 16
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($context["entity"], "text", array()), 100), "html", null, true);
            echo "
\t\t</span>
\t    </td>
\t    <td>
\t\t";
            // line 20
            if ($this->getAttribute($context["entity"], "createdat", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            }
            // line 21
            echo "\t    </td>
\t    <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
            echo "</td>
\t</tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 25,  67 => 22,  64 => 21,  60 => 20,  53 => 16,  49 => 15,  45 => 13,  41 => 12,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
