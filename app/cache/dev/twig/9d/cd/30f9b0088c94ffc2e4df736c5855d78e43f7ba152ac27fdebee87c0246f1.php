<?php

/* IntranetBundle:Task:listChunk.html.twig */
class __TwigTemplate_9dcd30f9b0088c94ffc2e4df736c5855d78e43f7ba152ac27fdebee87c0246f1 extends Twig_Template
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
        if (((array_key_exists("task", $context) && twig_length_filter($this->env, (isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")))) || (array_key_exists("entity", $context) && twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tasks", array()))))) {
            // line 3
            echo "
   ";
            // line 4
            if (twig_length_filter($this->env, (isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")))) {
                // line 5
                echo "    ";
                $context["entities"] = (isset($context["task"]) ? $context["task"] : $this->getContext($context, "task"));
                // line 6
                echo "   ";
            } else {
                // line 7
                echo "        ";
                $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tasks", array());
                // line 8
                echo "   ";
            }
            // line 9
            echo "
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 12
            echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
            // line 15
            $this->env->loadTemplate("IntranetBundle:Task:listChunk.html.twig", "127695914")->display($context);
            // line 23
            echo "                </div>
            </div>
        </div>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 23,  52 => 15,  46 => 12,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}


/* IntranetBundle:Task:listChunk.html.twig */
class __TwigTemplate_9dcd30f9b0088c94ffc2e4df736c5855d78e43f7ba152ac27fdebee87c0246f1_127695914 extends Twig_Template
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

    // line 16
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 17
        echo "                            <td>
                                <a class=\"btn btn-table-actions\"
                                   href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                            </td>
                        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 19,  108 => 17,  105 => 16,  54 => 23,  52 => 15,  46 => 12,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
