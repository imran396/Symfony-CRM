<?php

/* IntranetBundle:Upload:index.html.twig */
class __TwigTemplate_b59b472536b2bb96af1675d07df0af29f85c57d4cfd9e42b7f0779a2810b14aa extends Twig_Template
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
        echo "    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Uploads list", array(), "messages");
        echo "</div>
            <div id=\"tablewidget\" class=\"block-body collapse in\">
                ";
        // line 8
        $this->env->loadTemplate("IntranetBundle:Upload:indexTable.html.twig")->display($context);
        // line 9
        echo "
            </div>
        </div>

        ";
        // line 13
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
        // line 14
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Upload:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 14,  48 => 13,  42 => 9,  40 => 8,  35 => 6,  31 => 4,  28 => 3,);
    }
}
