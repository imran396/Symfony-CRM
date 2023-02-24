<?php

/* IntranetBundle:FacebookAuth:fbauth.html.twig */
class __TwigTemplate_46e4afea8e7f3dc9349ac6a2ce25172a591df4b339d0a06e47058244c641b633 extends Twig_Template
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

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("FacebookAuth Token", array(), "messages");
        echo "</h1>

    <div class=\"well\">


   <a class=\"btn btn-table-actions\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["fbloginurl"]) ? $context["fbloginurl"] : $this->getContext($context, "fbloginurl")), "html", null, true);
        echo "\">Generate Facebook AuthToken</a>

    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:FacebookAuth:fbauth.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 12,  31 => 7,  28 => 6,);
    }
}
