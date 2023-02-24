<?php

/* IntranetBundle:Contact:index.html.twig */
class __TwigTemplate_4ecff0e8a8a75eb591230fbf8b7fd1d785b1bbf861ebc2e848d7affa6e560617 extends Twig_Template
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
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contacts", array(), "messages");
        echo "</h1>
    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("contact_new");
        echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New contact", array(), "messages");
        echo "</a>
\t    ";
        // line 8
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>
    <div class=\"well\">
        ";
        // line 11
        $this->env->loadTemplate("IntranetBundle:Contact:indexTable.html.twig")->display($context);
        // line 12
        echo "    </div>
    ";
        // line 13
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Contact:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 13,  51 => 12,  49 => 11,  43 => 8,  37 => 7,  31 => 5,  28 => 4,);
    }
}
