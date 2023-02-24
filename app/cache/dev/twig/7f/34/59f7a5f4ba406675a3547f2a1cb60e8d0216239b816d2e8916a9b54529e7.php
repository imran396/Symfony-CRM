<?php

/* IntranetBundle:MonitoredUrl:new.html.twig */
class __TwigTemplate_7f3459f7a5f4ba406675a3547f2a1cb60e8d0216239b816d2e8916a9b54529e7 extends Twig_Template
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
        echo "    ";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 6
        echo "    <div class=\"row-fluid\">
        <div class=\"block span12\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Monitor Url edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form', array("attr" => array("class" => "form-horizontal")));
        echo "
                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("monitoredurl");
        echo "\">
                            ";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 15
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
        return "IntranetBundle:MonitoredUrl:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 15,  53 => 14,  49 => 13,  43 => 10,  38 => 8,  34 => 6,  31 => 5,  28 => 4,);
    }
}
