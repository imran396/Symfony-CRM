<?php

/* IntranetBundle:Supplier:show.html.twig */
class __TwigTemplate_2a979d8a478531dc6f614fe837fac1ef7b23f8e0f3bc74633873a983add0c6cf extends Twig_Template
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
        echo "
    ";
        // line 5
        $context["supplier"] = (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity"));
        // line 6
        echo "    ";
        $this->env->loadTemplate("IntranetBundle:Supplier:showChunk.html.twig")->display($context);
        // line 7
        echo "
    ";
        // line 8
        $this->env->loadTemplate("IntranetBundle:Campaign:listChunk.html.twig")->display($context);
        // line 9
        echo "    ";
        if (twig_length_filter($this->env, (isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")))) {
            // line 10
            echo "        ";
            $context["taskList"] = $this->env->loadTemplate("IntranetBundle:Macroses:taskListMacro.html.twig");
            // line 11
            echo "        ";
            echo $context["taskList"]->gettemplate((isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")));
            echo "
    ";
        }
        // line 13
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 13,  50 => 11,  47 => 10,  44 => 9,  42 => 8,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
