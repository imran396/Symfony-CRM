<?php

/* IntranetBundle:Note:noteItemChunk.html.twig */
class __TwigTemplate_53f92e235d6f9406688d0ff817a3f6e1ca453c11c46bff55686677d24e48b527 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<tr>
    <td style=\"max-width: 150px\">
        <span title=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "text", array()), "html", null, true);
        echo "\">
            ";
        // line 4
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "text", array()), 100), "html", null, true);
        echo "
        </span>
    </td>
    <td>";
        // line 7
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array())) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
        }
        echo "</td>
    <td>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "html", null, true);
        echo "</td>
    ";
        // line 9
        $this->displayBlock('actionsRows', $context, $blocks);
        // line 17
        echo "</tr>
";
    }

    // line 9
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 10
        echo "        <td>
            <a class=\"btn btn-table-actions\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
            ";
        // line 12
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL")) {
            // line 13
            echo "                <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
            ";
        }
        // line 15
        echo "        </td>
    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:noteItemChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 15,  65 => 13,  63 => 12,  57 => 11,  54 => 10,  51 => 9,  46 => 17,  44 => 9,  40 => 8,  34 => 7,  28 => 4,  24 => 3,  20 => 1,);
    }
}
