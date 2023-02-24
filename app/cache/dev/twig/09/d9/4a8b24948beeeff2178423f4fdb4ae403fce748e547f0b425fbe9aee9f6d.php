<?php

/* IntranetBundle:Form:_campaign_adsizeHeight_row.html.twig */
class __TwigTemplate_09d94a8b24948beeeff2178423f4fdb4ae403fce748e547f0b425fbe9aee9f6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '_campaign_sizeOfAds_adsizeHeight_row' => array($this, 'block__campaign_sizeOfAds_adsizeHeight_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => $this));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('_campaign_sizeOfAds_adsizeHeight_row', $context, $blocks);
    }

    public function block__campaign_sizeOfAds_adsizeHeight_row($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"floatLeft cross_icon\"><span style=\"padding-left: 5px;\" class=\"icon-remove\"></span></div>
<div class=\"pagesize_height\">
        ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "

</div>
  <div class=\"floatLeft mm\">mm</div>
 <div style=\"clear:both;\"></div>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Form:_campaign_adsizeHeight_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }
}
