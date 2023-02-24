<?php

/* IntranetBundle:Task:edit.html.twig */
class __TwigTemplate_702321083701655b357a2cecf5a40c8b39d26f13e7df0449bd720ffc0f01f5a2 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
        echo " ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form', array("attr" => array("class" => "form-horizontal")));
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("task");
        echo "\">
                            ";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 15
        echo "                        </a>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>

        ";
        // line 22
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 23
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", (isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
        echo "

    </div>

";
    }

    // line 29
    public function block_javascripts($context, array $blocks = array())
    {
        // line 30
        echo "
    ";
        // line 31
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 33
        $this->env->loadTemplate("IntranetBundle:Task:script.html.twig")->display($context);
        // line 34
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 34,  96 => 33,  91 => 31,  88 => 30,  85 => 29,  75 => 23,  73 => 22,  62 => 16,  59 => 15,  57 => 14,  53 => 13,  46 => 9,  39 => 7,  35 => 5,  32 => 4,  29 => 3,);
    }
}
