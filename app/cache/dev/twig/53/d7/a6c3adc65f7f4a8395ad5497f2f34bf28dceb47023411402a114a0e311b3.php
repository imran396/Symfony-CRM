<?php

/* IntranetBundle:CampaignSavingReport:report.html.twig */
class __TwigTemplate_53d7a6c3adc65f7f4a8395ad5497f2f34bf28dceb47023411402a114a0e311b3 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign Saving Report", array(), "messages");
        echo "</h1>
<div class=\"btn-toolbar\">
    <div class=\"btn-group\">
\t";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("id" => "campaignSavingReportFilter")));
        echo "
\t";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fromDate", array()), 'widget');
        echo "
\t";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "toDate", array()), 'widget');
        echo "
\t";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "generate", array()), 'widget');
        echo " 
\t";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    </div>
</div>

<div class=\"well\">
    ";
        // line 16
        if ((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data"))) {
            // line 17
            echo "        <div class=\"collapsibleList clear\">
            ";
            // line 18
            $this->env->loadTemplate("IntranetBundle:CampaignSavingReport:hierarchyItem.html.twig")->display(array_merge($context, array("currentItem" => (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")))));
            // line 19
            echo "        </div>
    ";
        }
        // line 21
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
\t.jstree-default .jstree-anchor {
\t    width: 100%;
\t}
</style>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CampaignSavingReport:report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 21,  69 => 19,  67 => 18,  64 => 17,  62 => 16,  54 => 11,  50 => 10,  46 => 9,  42 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
