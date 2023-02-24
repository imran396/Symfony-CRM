<?php

/* IntranetBundle:SurveyAnalysis:report.html.twig */
class __TwigTemplate_b0036ab5040f233f2493cc57e1df5abc5d409bea23c53c097273c1f4da4f782f extends Twig_Template
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
        echo "<h1 class=\"page-title\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Survey Analysis Report", array(), "messages");
        echo "</h1>

";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("id" => "reportFilter")));
        echo "
    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "customer", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a customer"))));
        echo "
    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fromDate", array()), 'widget');
        echo "
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "toDate", array()), 'widget');
        echo "
    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "generate", array()), 'widget');
        echo "
";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

<div class=\"clear\">&nbsp;</div>

<div class=\"well\">
    ";
        // line 16
        if ((((!$this->getAttribute((isset($context["data"]) ? $context["data"] : null), "nominal", array(), "any", true, true)) && (!$this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ordinal", array(), "any", true, true))) && (!$this->getAttribute((isset($context["data"]) ? $context["data"] : null), "lengthOfStay", array(), "any", true, true)))) {
            // line 19
            echo "        <p>No records found.</p>
    ";
        } else {
            // line 21
            echo "        <div id=\"tablewidget\" class=\"block-body collapse in\">
        ";
            // line 22
            $this->env->loadTemplate("IntranetBundle:SurveyAnalysis:reportTable.html.twig")->display($context);
            echo " 
        </div>
    ";
        }
        // line 24
        echo " 
    ";
        // line 26
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SurveyAnalysis:report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 26,  80 => 24,  74 => 22,  71 => 21,  67 => 19,  65 => 16,  57 => 11,  53 => 10,  49 => 9,  45 => 8,  41 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
