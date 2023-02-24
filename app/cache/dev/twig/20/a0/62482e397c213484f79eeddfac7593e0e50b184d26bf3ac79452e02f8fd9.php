<?php

/* IntranetBundle:User:new.html.twig */
class __TwigTemplate_20a062482e397c213484f79eeddfac7593e0e50b184d26bf3ac79452e02f8fd9 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("User creation", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:User:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
