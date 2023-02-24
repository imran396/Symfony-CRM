<?php

/* IntranetBundle:Supplier:index.html.twig */
class __TwigTemplate_59a4179835ebab46fb2b8c04b1e7cb4f8e415077432ccb8feded635a482d999d extends Twig_Template
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
        echo "
    <h1 class=\"page-title\">";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Suppliers", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("supplier_new");
        echo "\" class=\"btn \"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New supplier", array(), "messages");
        echo "</a>
\t    ";
        // line 9
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>

    <div class=\"well\">
        <div id=\"tablewidget\" class=\"block-body collapse in\">
            ";
        // line 14
        $this->env->loadTemplate("IntranetBundle:Supplier:indexTable.html.twig")->display($context);
        // line 15
        echo "        </div>
    </div>


    ";
        // line 19
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 19,  56 => 15,  54 => 14,  46 => 9,  40 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
