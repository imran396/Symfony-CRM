<?php

/* IntranetBundle:Note:new.html.twig */
class __TwigTemplate_4023f50635eac3d56781ee6d19d6dbc5c1172b94113801e6f9ab4a003d2e6c1e extends Twig_Template
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
        <div class=\"block span12\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Note creation", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form', array("attr" => array("class" => "form-horizontal")));
        echo "

                ";
        // line 11
        if (array_key_exists("customer", $context)) {
            // line 12
            echo "                    <h3>";
            echo twig_escape_filter($this->env, (isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "html", null, true);
            echo "</h3>
                ";
        }
        // line 14
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("note");
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
        return "IntranetBundle:Note:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 20,  65 => 19,  61 => 18,  55 => 14,  49 => 12,  47 => 11,  42 => 9,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
