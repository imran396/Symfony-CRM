<?php

/* IntranetBundle:Campaign:edit.html.twig */
class __TwigTemplate_6ef92256aac4bbe8acc9f96c8dde92c93e436a8d17d42017825d1e54543025bf extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "    <div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">


                ";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form', array("attr" => array("class" => "form-horizontal")));
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("campaign");
        echo "\">
                           ";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 17
        echo "                        </a>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>



        ";
        // line 26
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 27
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", (isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
        echo "
    </div>

    ";
        // line 30
        $this->env->loadTemplate("IntranetBundle:Campaign:modalForm.html.twig")->display($context);
        // line 31
        echo "

";
    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        // line 35
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 36
        $this->env->loadTemplate("IntranetBundle:Campaign:featuresScript.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 36,  95 => 35,  92 => 34,  86 => 31,  84 => 30,  77 => 27,  75 => 26,  62 => 18,  59 => 17,  57 => 16,  53 => 15,  46 => 11,  39 => 7,  35 => 5,  32 => 4,  29 => 3,);
    }
}
