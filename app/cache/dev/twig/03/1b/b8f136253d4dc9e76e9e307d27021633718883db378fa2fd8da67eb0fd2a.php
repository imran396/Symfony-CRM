<?php

/* IntranetBundle:CustomerFacebookUrl:index.html.twig */
class __TwigTemplate_031bb8f136253d4dc9e76e9e307d27021633718883db378fa2fd8da67eb0fd2a extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo " => ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("customerfacebookurl_new");
        echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New %from% => %to% relation", array("%from%" => $this->env->getExtension('translator')->trans("Stakeholder"), "%to%" => $this->env->getExtension('translator')->trans("Facebook Url")), "messages");
        echo "</a>

        <div class=\"btn-group\">
        </div>
    </div>

    <div class=\"well\">
        ";
        // line 14
        $this->env->loadTemplate("IntranetBundle:CustomerFacebookUrl:indexTable.html.twig")->display($context);
        // line 15
        echo "    </div>
    ";
        // line 16
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CustomerFacebookUrl:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 16,  54 => 15,  52 => 14,  40 => 7,  31 => 4,  28 => 3,);
    }
}
