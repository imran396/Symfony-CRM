<?php

/* IntranetBundle:User:index.html.twig */
class __TwigTemplate_1a1c10b6e0e62b80b4f51936f0e330ba57af7b696d1157b776213b92718476e7 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Users", array(), "messages");
        echo "</h1>
    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("user_new");
        echo "\" class=\"btn \"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New user", array(), "messages");
        echo "</a>
\t    ";
        // line 7
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>
    <div class=\"well\">
        ";
        // line 10
        $this->env->loadTemplate("IntranetBundle:User:indexTable.html.twig")->display($context);
        // line 11
        echo "    </div>
    ";
        // line 12
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 12,  51 => 11,  49 => 10,  43 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
