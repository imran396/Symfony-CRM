<?php

/* IntranetBundle:Contact:new.html.twig */
class __TwigTemplate_a1bd0d7a310bf88431d2001420558dafbd6fe3a678a5c00a2acb824dff372cb0 extends Twig_Template
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
        echo "<div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("contact creation", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["backPath"]) ? $context["backPath"] : $this->getContext($context, "backPath")), "html", null, true);
        echo "\">
                            ";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back", array(), "messages");
        // line 16
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
        return "IntranetBundle:Contact:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 16,  54 => 15,  50 => 14,  43 => 10,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
