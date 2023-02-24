<?php

/* IntranetBundle:TimeTrackReport:report.html.twig */
class __TwigTemplate_effd28cc8771d8b5dea35f230a2aaa75af12c85839ba3c88d584c21f7881bb20 extends Twig_Template
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
<h1 class=\"page-title\">Time Track Report</h1> 
<div class=\"clear\">&nbsp;</div>

";
        // line 8
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("id" => "timeTrackReportFilter")));
        echo "
    <div class=\"span3 date-form\">";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fromDate", array()), 'widget');
        echo "</div>
    <div class=\"span3 date-form\"> ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "toDate", array()), 'widget');
        echo "</div>
    <div class=\"span3\">";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "generate", array()), 'widget');
        echo " </div>
";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

<div class=\"clear\">&nbsp;</div>

<div class=\"well\">
    
    ";
        // line 18
        if ((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data"))) {
            // line 19
            echo "\t<div class=\"clear\">
\t  <div class=\"pull-right export-main\">
\t\t";
            // line 21
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["exportTimeTrackingReportForm"]) ? $context["exportTimeTrackingReportForm"] : $this->getContext($context, "exportTimeTrackingReportForm")), 'form_start', array("attr" => array("id" => "timeTrackReportFilter")));
            echo "
\t\t    <div class=\"hide\">
\t\t\t";
            // line 23
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["exportTimeTrackingReportForm"]) ? $context["exportTimeTrackingReportForm"] : $this->getContext($context, "exportTimeTrackingReportForm")), "fromDate", array()), 'widget');
            echo "
\t\t\t";
            // line 24
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["exportTimeTrackingReportForm"]) ? $context["exportTimeTrackingReportForm"] : $this->getContext($context, "exportTimeTrackingReportForm")), "toDate", array()), 'widget');
            echo "
\t\t    </div>
\t\t    ";
            // line 26
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["exportTimeTrackingReportForm"]) ? $context["exportTimeTrackingReportForm"] : $this->getContext($context, "exportTimeTrackingReportForm")), "generate", array()), 'widget');
            echo " 
\t\t";
            // line 27
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["exportTimeTrackingReportForm"]) ? $context["exportTimeTrackingReportForm"] : $this->getContext($context, "exportTimeTrackingReportForm")), 'form_end');
            echo "
\t</div>
\t</div>
\t
\t
        <div class=\"collapsibleList clear\">
            ";
            // line 33
            $this->env->loadTemplate("IntranetBundle:TimeTrackReport:hierarchyItem.html.twig")->display(array_merge($context, array("currentItem" => $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customer", array()))));
            // line 34
            echo "        </div>
        <hr/>
        <div class=\"collapsibleList\">
            ";
            // line 37
            $this->env->loadTemplate("IntranetBundle:TimeTrackReport:hierarchyItem.html.twig")->display(array_merge($context, array("currentItem" => $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "user", array()))));
            // line 38
            echo "        </div>
    ";
        }
        // line 40
        echo "</div>
<script>
    \$(function() {
        \$('.collapsibleList').jstree();
    });
</script>
<style>
    .collapsibleList .data .jstree-icon {
        background-image: none;
        width: 12px;
    }
</style>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:TimeTrackReport:report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 40,  104 => 38,  102 => 37,  97 => 34,  95 => 33,  86 => 27,  82 => 26,  77 => 24,  73 => 23,  68 => 21,  64 => 19,  62 => 18,  53 => 12,  49 => 11,  45 => 10,  41 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
