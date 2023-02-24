<?php

/* IntranetBundle:Campaign:new.html.twig */
class __TwigTemplate_5cfba179dcd16f442dd02246d780ddb8fce37406fbcf49bc015efaadf27a24d2 extends Twig_Template
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
        echo "    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign creation", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">


                ";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

                ";
        // line 14
        if ((array_key_exists("customer", $context) && (!twig_test_empty((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")))))) {
            // line 15
            echo "                    <h3>";
            echo twig_escape_filter($this->env, (isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "html", null, true);
            echo "</h3>
                ";
        }
        // line 17
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("campaign");
        echo "\">
                           ";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 23
        echo "                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    ";
        // line 29
        $this->env->loadTemplate("IntranetBundle:Campaign:modalForm.html.twig")->display($context);
    }

    // line 33
    public function block_javascripts($context, array $blocks = array())
    {
        // line 34
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 35
        $this->env->loadTemplate("IntranetBundle:Campaign:featuresScript.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 35,  87 => 34,  84 => 33,  80 => 29,  72 => 23,  70 => 22,  66 => 21,  60 => 17,  54 => 15,  52 => 14,  47 => 12,  39 => 7,  35 => 5,  32 => 4,  29 => 3,);
    }
}
