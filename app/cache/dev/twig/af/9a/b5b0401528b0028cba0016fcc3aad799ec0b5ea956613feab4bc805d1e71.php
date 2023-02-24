<?php

/* IntranetBundle:EnumValue:index.html.twig */
class __TwigTemplate_af9ab5b0401528b0028cba0016fcc3aad799ec0b5ea956613feab4bc805d1e71 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Enum Value", array(), "messages");
        echo "</h1>
    <div class=\"well\">
        ";
        // line 6
        $this->env->loadTemplate("IntranetBundle:EnumValue:indexTable.html.twig")->display($context);
        // line 7
        echo "    </div>
    ";
        // line 8
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:EnumValue:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
