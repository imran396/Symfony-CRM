<?php

/* IntranetBundle:Task:new.html.twig */
class __TwigTemplate_7fe72cf159bc3cc970206459ff31e33809e5a79bc533b5d6a50b34813fcd9f34 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "    ";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "    
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
        echo " ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("creation", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("task");
        echo "\">
                            ";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 17
        echo "                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
        // line 26
        echo "
    ";
        // line 27
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 29
        $this->env->loadTemplate("IntranetBundle:Task:script.html.twig")->display($context);
        // line 30
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 30,  82 => 29,  77 => 27,  74 => 26,  71 => 25,  61 => 17,  59 => 16,  55 => 15,  48 => 11,  40 => 8,  35 => 5,  32 => 4,  29 => 3,);
    }
}
