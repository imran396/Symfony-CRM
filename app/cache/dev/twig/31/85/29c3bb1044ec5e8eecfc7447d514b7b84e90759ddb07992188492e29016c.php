<?php

/* IntranetBundle:Timetracking:index.html.twig */
class __TwigTemplate_318529c3bb1044ec5e8eecfc7447d514b7b84e90759ddb07992188492e29016c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Time Tracking", array(), "messages");
        echo "</h1>
    <div class=\"btn-toolbar\">
        
        ";
        // line 7
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "taskId"), "method")) {
            // line 8
            echo "\t    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("task");
            echo "\" class=\"btn\"><i class=\"icon-plus\"></i>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to task list", array(), "messages");
            echo "</a>
        ";
        } else {
            // line 10
            echo "\t    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("timetracking_new");
            echo "\" class=\"btn\"><i class=\"icon\"></i>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("New time tracking entry", array(), "messages");
            echo "</a>
\t";
        }
        // line 12
        echo "\t
\t";
        // line 13
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>
    <div class=\"well\">


   ";
        // line 18
        $this->env->loadTemplate("IntranetBundle:Timetracking:indexTable.html.twig")->display($context);
        // line 19
        echo "
    </div>
    ";
        // line 21
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Timetracking:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 21,  69 => 19,  67 => 18,  59 => 13,  56 => 12,  48 => 10,  40 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
