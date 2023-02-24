<?php

/* IntranetBundle:Pressrelease:new.html.twig */
class __TwigTemplate_14f936fd5285f3c43412ac965d4b443b323ee80d69232aac8ba84723063030fd extends Twig_Template
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
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\"> ";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Press release creation", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

                ";
        // line 12
        if (array_key_exists("customer", $context)) {
            // line 13
            echo "                    <h3>";
            echo twig_escape_filter($this->env, (isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "html", null, true);
            echo "</h3>
                ";
        }
        // line 15
        echo "
                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("pressrelease");
        echo "\">
                             ";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 20
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
        return "IntranetBundle:Pressrelease:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 20,  65 => 19,  61 => 18,  56 => 15,  50 => 13,  48 => 12,  43 => 10,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
