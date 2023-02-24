<?php

/* IntranetBundle:Supplier:new.html.twig */
class __TwigTemplate_5d1b4df19aea8e5f72648e26eb6fb36eda3a8b787cff7169693c758ba047b519 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier creation", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
\t    ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "")));
        echo "
\t\t    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
\t\t    ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'row');
        echo "
\t\t      
               <div id=\"supplier_pagesize\" class=\"clear\">
                    <label for=\"supplier_pagesize\" style=\"display: block; \">";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Pagesize", array(), "messages");
        echo "</label>
                    <div class=\"pagesize_width\">
                        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pagesizeWidth", array()), 'errors');
        echo "
                        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pagesizeWidth", array()), 'widget');
        echo "
                    </div>
                    <div class=\"floatLeft cross_icon\"><span class=\"icon-remove\"></span></div>
                    <div class=\"pagesize_height\">
                        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pagesizeHeight", array()), 'errors');
        echo "
                        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pagesizeHeight", array()), 'widget');
        echo "
                    </div>
                    <div class=\"floatLeft mm\">mm</div>
                    <div style=\"clear:both;\"></div>
                </div>

                ";
        // line 29
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "


                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("supplier");
        echo "\">
                            ";
        // line 35
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 36
        echo "                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
    }

    // line 44
    public function block_javascripts($context, array $blocks = array())
    {
        // line 45
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

 ";
        // line 48
        echo "

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 48,  114 => 45,  111 => 44,  101 => 36,  99 => 35,  95 => 34,  87 => 29,  78 => 23,  74 => 22,  67 => 18,  63 => 17,  58 => 15,  52 => 12,  48 => 11,  44 => 10,  38 => 7,  34 => 5,  32 => 4,  29 => 3,);
    }
}
