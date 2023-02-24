<?php

/* IntranetBundle:Macroses:taskItemChunk.html.twig */
class __TwigTemplate_7b2550164e3fc1bb0787fdc0b2871eeaa2a7e3bd19164ecede2c05260032323f extends Twig_Template
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
        echo "<tr>
    <td style=\"width: 30%;\">
                                    <span style=\"cursor: pointer\"
                                          title=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "description", array()), "html", null, true);
        echo "\"> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "title", array()), "html", null, true);
        echo "</span>
    </td>
    <td>
        ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "user", array()), "html", null, true);
        echo "
    </td>
    <td>
        ";
        // line 10
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "dueDate", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "
    </td>
    <td>
        ";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskStatusFilter($this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "status", array())), "html", null, true);
        echo "
    </td>
    <td>
        <a class=\"btn btn-table-actions\"
           href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
    </td>

</tr>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:taskItemChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 17,  44 => 13,  38 => 10,  32 => 7,  24 => 4,  19 => 1,);
    }
}
