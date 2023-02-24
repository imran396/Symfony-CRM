<?php

/* IntranetBundle:Pressrelease:edit.html.twig */
class __TwigTemplate_913f101319e77b1dba4a7c743562aa69cb27ebf2f8e94eddfd1c472920dfdc24 extends Twig_Template
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
        echo "    <div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Press release edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">



                ";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form', array("attr" => array("class" => "form-horizontal")));
        echo "


                <ul class=\"record_actions unstyled\">
                    <li>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("pressrelease");
        echo "\">
                            ";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 19
        echo "                        </a>
                         <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>
        ";
        // line 25
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 26
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", (isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 26,  72 => 25,  62 => 20,  59 => 19,  57 => 18,  53 => 17,  45 => 12,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
