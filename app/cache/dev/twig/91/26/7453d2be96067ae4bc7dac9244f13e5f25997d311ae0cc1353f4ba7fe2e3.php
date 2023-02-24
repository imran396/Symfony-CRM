<?php

/* IntranetBundle:SupplierGroup:index.html.twig */
class __TwigTemplate_91267453d2be96067ae4bc7dac9244f13e5f25997d311ae0cc1353f4ba7fe2e3 extends Twig_Template
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
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier grups", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("suppliergroup_new");
        echo "\" class=\"btn \"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New supplier group", array(), "messages");
        echo "</a>
\t    ";
        // line 8
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>

    <div class=\"well\">
        <div id=\"tablewidget\" class=\"block-body collapse in\">

            ";
        // line 14
        $this->env->loadTemplate("IntranetBundle:SupplierGroup:indexTable.html.twig")->display($context);
        // line 15
        echo "
        </div>
    </div>


    ";
        // line 20
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SupplierGroup:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 20,  55 => 15,  53 => 14,  44 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
