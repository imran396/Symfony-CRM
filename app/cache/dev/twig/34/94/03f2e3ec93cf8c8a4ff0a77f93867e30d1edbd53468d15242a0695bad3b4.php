<?php

/* IntranetBundle:Customer:edit.html.twig */
class __TwigTemplate_349403f2e3ec93cf8c8a4ff0a77f93867e30d1edbd53468d15242a0695bad3b4 extends Twig_Template
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
        echo "\t";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "        <div class=\"row-fluid\">
            <div class=\"block span6\">
                <div class=\"block-heading\" data-toggle=\"collapse\"
                     data-target=\"#tablewidget\">";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->customerLevelFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()))), "html", null, true);
        echo " ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
        // line 9
        echo "                </div>
                <div id=\"widget1container\" class=\"block-body collapse in\">
                    ";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form');
        echo "

                    <ul class=\"record_actions unstyled\">
                        <li>
                            <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_level", array("level" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "Level", array()))), "html", null, true);
        echo "\">
                               ";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 17
        echo "                            </a>
                            <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>

                        </li>
                    </ul>
                </div>
            </div>
            ";
        // line 24
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 25
        echo "            ";
        if (array_key_exists("uploadDeleteForms", $context)) {
            // line 26
            echo "                ";
            echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", (isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
            echo "
            ";
        }
        // line 28
        echo "        </div>

    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 28,  79 => 26,  76 => 25,  74 => 24,  63 => 18,  60 => 17,  58 => 16,  54 => 15,  47 => 11,  43 => 9,  39 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
