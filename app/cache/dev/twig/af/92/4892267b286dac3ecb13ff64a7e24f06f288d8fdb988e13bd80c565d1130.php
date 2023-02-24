<?php

/* IntranetBundle:Supplier:supplierScript.html.twig */
class __TwigTemplate_af924892267b286dac3ecb13ff64a7e24f06f288d8fdb988e13bd80c565d1130 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<script type=\"text/javascript\">
    (function (\$) {

        var audienceLabels = ";
        // line 5
        echo twig_jsonencode_filter((isset($context["supplierAudienceTitles"]) ? $context["supplierAudienceTitles"] : $this->getContext($context, "supplierAudienceTitles")));
        echo ";
        var audienceLabel = \$('label[for=\"supplier_audiencesize\"]');
        var audienceLabelDefaultText = audienceLabel.text();
        var supplierTypeSelect = \$('#supplier_supplierType');
        var frequencyItems = \$('label[for=\"supplier_frequency\"],#supplier_frequency');
        var supplierPagesize = \$('label[for=\"supplier_pagesize\"],#supplier_pagesize');

        function setAudienceTitle() {

            if (supplierTypeSelect.val() && typeof audienceLabels[supplierTypeSelect.val()] != 'undefined') {
                audienceLabel.text(audienceLabels[supplierTypeSelect.val()]);
            } else {
                audienceLabel.text(audienceLabelDefaultText);
            }

            if (supplierTypeSelect.val() == ";
        // line 20
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "PrintType")), "html", null, true);
        echo ") {
                frequencyItems.show();
                supplierPagesize.show();
            } else {
                frequencyItems.hide();
                supplierPagesize.hide();
            }
        }

        setAudienceTitle();

        supplierTypeSelect.change(function () {
            \$this = \$(this);
            setAudienceTitle();
        });


    })(jQuery);
</script>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:supplierScript.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 20,  25 => 5,  19 => 1,);
    }
}
