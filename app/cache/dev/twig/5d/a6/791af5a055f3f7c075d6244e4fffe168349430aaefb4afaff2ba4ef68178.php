<?php

/* IntranetBundle:Task:duplicates.html.twig */
class __TwigTemplate_5da6791af5a055f3f7c075d6244e4fffe168349430aaefb4afaff2ba4ef68178 extends Twig_Template
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
        echo "
";
        // line 2
        if (twig_length_filter($this->env, (isset($context["duplicateTask"]) ? $context["duplicateTask"] : $this->getContext($context, "duplicateTask")))) {
            // line 3
            echo " ";
            $context["entities"] = (isset($context["duplicateTask"]) ? $context["duplicateTask"] : $this->getContext($context, "duplicateTask"));
            // line 4
            echo "    <div class=\"row-fluid\" id=\"duplicates\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 6
            echo $this->env->getExtension('translator')->getTranslator()->trans("Duplicates", array(), "messages");
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
            // line 9
            $this->env->loadTemplate("IntranetBundle:Task:duplicates.html.twig", "697873190")->display($context);
            // line 19
            echo "                </div>
            </div>
        </div>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:duplicates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 19,  37 => 9,  31 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}


/* IntranetBundle:Task:duplicates.html.twig */
class __TwigTemplate_5da6791af5a055f3f7c075d6244e4fffe168349430aaefb4afaff2ba4ef68178_697873190 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Task:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Task:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 11
        echo "                            <td>
                                <a class=\"btn btn-table-actions\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                                ";
        // line 13
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_EDIT")) {
            // line 14
            echo "                                    <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                                ";
        }
        // line 16
        echo "                            </td>
                        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:duplicates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 16,  104 => 14,  102 => 13,  96 => 12,  93 => 11,  90 => 10,  39 => 19,  37 => 9,  31 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
