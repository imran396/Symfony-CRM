<?php

/* IntranetBundle:Supplier:edit.html.twig */
class __TwigTemplate_ffcdd095e81dcf395dabdbe3e0442412b5b6d09a70e48428e24ba67fbda53557 extends Twig_Template
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
        $this->env->getExtension('form')->renderer->setTheme((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "    <div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">

                ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'errors');
        echo "
\t\t
\t\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "name", array()), 'row');
        echo "
               <div id=\"supplier_pagesize\">
                    <label for=\"supplier_pagesize\" style=\"display: block; \">";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Pagesize", array(), "messages");
        echo "</label>
                    <div class=\"pagesize_width\">
                        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "pagesizeWidth", array()), 'errors');
        echo "
                        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "pagesizeWidth", array()), 'widget');
        echo "
                    </div>
                    <div class=\"floatLeft cross_icon\"><span class=\"icon-remove\"></span></div>
                    <div class=\"pagesize_height\">
                        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "pagesizeHeight", array()), 'errors');
        echo "
                        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "pagesizeHeight", array()), 'widget');
        echo "
                    </div>
                    <div class=\"floatLeft mm\">mm</div>
                    <div style=\"clear:both;\"></div>
                </div>

                ";
        // line 29
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_end');
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("supplier");
        echo "\">
                            ";
        // line 34
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 35
        echo "                        </a>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supplier_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>

        ";
        // line 42
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 43
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", (isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
        echo "

        ";
        // line 45
        $context["helper"] = $this->env->loadTemplate("IntranetBundle:Macroses:contactsMacro.html.twig");
        // line 46
        echo "
        ";
        // line 47
        echo $context["helper"]->getcontactsList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contacts", array()), (isset($context["addSupplierForm"]) ? $context["addSupplierForm"] : $this->getContext($context, "addSupplierForm")));
        echo "


    </div>
";
    }

    // line 53
    public function block_javascripts($context, array $blocks = array())
    {
        // line 54
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    ";
        // line 56
        $this->env->loadTemplate("IntranetBundle:Supplier:supplierScript.html.twig")->display($context);
        // line 57
        echo "

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 57,  145 => 56,  139 => 54,  136 => 53,  127 => 47,  124 => 46,  122 => 45,  116 => 43,  114 => 42,  103 => 36,  100 => 35,  98 => 34,  94 => 33,  87 => 29,  78 => 23,  74 => 22,  67 => 18,  63 => 17,  58 => 15,  53 => 13,  48 => 11,  44 => 10,  38 => 7,  34 => 5,  32 => 4,  29 => 3,);
    }
}
