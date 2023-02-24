<?php

/* IntranetBundle:CpspmReport:report.html.twig */
class __TwigTemplate_c3b35bf6ff843c4d317e62c9c5b44ce5dd35c5062eb4c66df00b552ec9d14ac6 extends Twig_Template
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
        echo "<h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("CPSPM Report", array(), "messages");
        echo "</h1>

";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("id" => "cpspmReportFilter")));
        echo "
    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fromDate", array()), 'widget');
        echo "
    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "toDate", array()), 'widget');
        echo "
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "city", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a city"))));
        echo "
    ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "type", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a supplier type"))));
        echo "
    <span id=\"frequencyDiv\"> ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "frequency", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a frequency"))));
        echo "</span>
    ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "generate", array()), 'widget');
        echo "
";
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "


<div class=\"clear\">&nbsp;</div>

<div class=\"well\">
    ";
        // line 19
        if ((null === (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")))) {
            // line 20
            echo "        <p></p>
    ";
        } elseif (twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "data", array()))) {
            // line 22
            echo "        <p>No records found.</p>
    ";
        } else {
            // line 24
            echo "        <div id=\"tablewidget\" class=\"block-body collapse in\">
        ";
            // line 25
            $this->env->loadTemplate("IntranetBundle:CpspmReport:reportTable.html.twig")->display($context);
            echo " 
        </div>
    ";
        }
        // line 28
        echo "    ";
        // line 29
        echo "</div>
<script type=\"text/javascript\">
    jQuery(document).ready(function(){
        if( jQuery('#CpspmReportForm_type').val() != ";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["printType"]) ? $context["printType"] : $this->getContext($context, "printType")), "html", null, true);
        echo " )
            jQuery('#frequencyDiv').hide();
    })

    jQuery('#CpspmReportForm_type').on('change', function(){
        
        if ( jQuery(this).val() == ";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["printType"]) ? $context["printType"] : $this->getContext($context, "printType")), "html", null, true);
        echo " )
        {
            jQuery('#frequencyDiv').show();
        }else
        {
            jQuery('#frequencyDiv').hide();
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CpspmReport:report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 38,  100 => 32,  95 => 29,  93 => 28,  87 => 25,  84 => 24,  80 => 22,  76 => 20,  74 => 19,  65 => 13,  61 => 12,  57 => 11,  53 => 10,  49 => 9,  45 => 8,  41 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
