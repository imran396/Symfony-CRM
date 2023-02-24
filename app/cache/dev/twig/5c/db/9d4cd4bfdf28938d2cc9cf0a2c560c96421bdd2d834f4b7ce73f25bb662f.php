<?php

/* IntranetBundle:SurveyResult:index.html.twig */
class __TwigTemplate_5cdb9d4cd4bfdf28938d2cc9cf0a2c560c96421bdd2d834f4b7ce73f25bb662f extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Survey results", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("surveyresult_new");
        echo "\" class=\"btn \"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New survey result", array(), "messages");
        echo "</a>

        <div class=\"btn-group\">
        </div>
    </div>

    <div class=\"well\">
        <div id=\"tablewidget\" class=\"block-body collapse in\">

            ";
        // line 17
        $this->env->loadTemplate("IntranetBundle:SurveyResult:indexTable.html.twig")->display($context);
        // line 18
        echo "
        </div>
    </div>


    ";
        // line 23
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SurveyResult:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 23,  56 => 18,  54 => 17,  40 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
