<?php

/* IntranetBundle:CustomerFacebookUrl:edit.html.twig */
class __TwigTemplate_627107ff6c00abaced2b102c713223a068a73ef6de289145c0ab8ff31fc51d42 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit Facebook Url", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form', array("attr" => array("class" => "form-horizontal", "novalidate" => "novalidate")));
        echo "

                ";
        // line 11
        if ((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer"))) {
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
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("customerfacebookurl");
        echo "\">
                            ";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 20
        echo "                        </a>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customerfacebookurl_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CustomerFacebookUrl:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 21,  65 => 20,  63 => 19,  59 => 18,  53 => 14,  47 => 12,  45 => 11,  40 => 9,  35 => 7,  31 => 5,  28 => 4,);
    }
}
