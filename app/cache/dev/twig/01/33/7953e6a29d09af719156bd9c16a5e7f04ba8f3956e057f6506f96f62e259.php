<?php

/* IntranetBundle:Note:edit.html.twig */
class __TwigTemplate_01337953e6a29d09af719156bd9c16a5e7f04ba8f3956e057f6506f96f62e259 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "<div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Note edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">

                ";
        // line 11
        echo "                ";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form', array("attr" => array("class" => "form-horizontal")));
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("note");
        echo "\">
                            ";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 17
        echo "                        </a>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
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
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "note", (isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
        echo "

    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 25,  71 => 24,  60 => 18,  57 => 17,  55 => 16,  51 => 15,  43 => 11,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
