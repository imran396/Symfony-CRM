<?php

/* IntranetBundle:CustomerFacebookUrl:new.html.twig */
class __TwigTemplate_a3825b93a2d8ed2858827580344ad447b3e449ba09256e7cde65efd08ca9d809 extends Twig_Template
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
        echo "    <div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">

               ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form', array("attr" => array("class" => "form-horizontal", "novalidate" => "novalidate")));
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("customerfacebookurl");
        echo "\">
                            ";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
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
        return "IntranetBundle:CustomerFacebookUrl:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 16,  52 => 15,  48 => 14,  41 => 10,  35 => 7,  31 => 5,  28 => 4,);
    }
}
