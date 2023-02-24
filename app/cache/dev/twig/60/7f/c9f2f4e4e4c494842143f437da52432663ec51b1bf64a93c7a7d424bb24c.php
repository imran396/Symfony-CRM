<?php

/* IntranetBundle:FacebookAuth:index.html.twig */
class __TwigTemplate_607fc9f2f4e4e4c494842143f437da52432663ec51b1bf64a93c7a7d424bb24c extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("FacebookAuth Token", array(), "messages");
        echo "</h1>

    <div class=\"well\">


   ";
        // line 10
        $this->env->loadTemplate("IntranetBundle:FacebookAuth:indexTable.html.twig")->display($context);
        // line 11
        echo "
    </div>
    <div><a class=\"btn btn-table-actions\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["fbloginurl"]) ? $context["fbloginurl"] : $this->getContext($context, "fbloginurl")), "html", null, true);
        echo "\">Generate Facebook AuthToken</a></div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:FacebookAuth:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 13,  42 => 11,  40 => 10,  31 => 5,  28 => 4,);
    }
}
