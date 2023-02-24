<?php

/* IntranetBundle:BudgetPeriod:edit.html.twig */
class __TwigTemplate_f3864510abedf6fa263b8b530f1803ae2b91d5a22ca8757dbb75a9205fc3c52d extends Twig_Template
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
        echo "        <div class=\"row-fluid\">
            <div class=\"block span6\">
                <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Budget period edit", array(), "messages");
        echo "</div>
                <div id=\"widget1container\" class=\"block-body collapse in\">
                    ";
        // line 8
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form');
        echo "
                    ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
            </div>

        </div>
    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:BudgetPeriod:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 9,  40 => 8,  35 => 6,  31 => 4,  28 => 3,);
    }
}
