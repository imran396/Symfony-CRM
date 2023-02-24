<?php

/* IntranetBundle:Timetracking:new.html.twig */
class __TwigTemplate_471f0b41294e50ba0b177ba665d03d186ccec7e32b99be1ccdfd2d9df3da9176 extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 6
        echo "    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Time Tracking creation", array(), "messages");
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
        echo $this->env->getExtension('routing')->getPath("timetracking");
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

    public function getTemplateName()
    {
        return "IntranetBundle:Timetracking:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 17,  54 => 16,  50 => 15,  43 => 11,  37 => 8,  33 => 6,  31 => 5,  28 => 4,);
    }
}
