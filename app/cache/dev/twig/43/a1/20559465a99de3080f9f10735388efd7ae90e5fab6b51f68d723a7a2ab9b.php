<?php

/* IntranetBundle:Supplier:contactScript.html.twig */
class __TwigTemplate_43a120559465a99de3080f9f10735388efd7ae90e5fab6b51f68d723a7a2ab9b extends Twig_Template
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
        echo "<script type=\"text/javascript\">
    (function (\$) {
        var offerTypeSelect = \$('#form_offerType');
        var includedServicesSelect = \$('#form_includedServices');
        var printGroup = \$('#form_numberOfAds, #form_readers').parent().parent();
        var printAddSize = \$('#supplier_pagesize');
        var radioAndTvGroup = \$('#form_numberOfSeconds').parent().parent();
        var tv = \$('#form_viewers').parent().parent();
        var online = \$('#form_visitors').parent().parent();
        var radio = \$('#form_listeners').parent().parent();
        var other = \$('#form_audienceSize').parent().parent();
        var includedServicesOther = \$('#form_includedServicesOther').parent().parent();

        offerTypeSelect.change(function () {
            if (offerTypeSelect.val() == ";
        // line 15
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "OnlineType")), "html", null, true);
        echo ") {
                online.show();
                radioAndTvGroup.hide();
                printGroup.hide();
                printAddSize.hide();
                tv.hide();
                radio.hide();
                other.hide();
            } else if (offerTypeSelect.val() == ";
        // line 23
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "RadioType")), "html", null, true);
        echo ") {
                online.hide();
                radioAndTvGroup.show();
                printGroup.hide();
                printAddSize.hide();
                tv.hide();
                radio.show();
                other.hide();
            } else if (offerTypeSelect.val() == ";
        // line 31
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "PrintType")), "html", null, true);
        echo ") {
                online.hide();
                radioAndTvGroup.hide();
                printAddSize.show();
                printGroup.show();
                tv.hide();
                radio.hide();
                other.hide();
            } else if (offerTypeSelect.val() == ";
        // line 39
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "TvType")), "html", null, true);
        echo ") {
                online.hide();
                radioAndTvGroup.show();
                printGroup.hide();
                printAddSize.hide();
                tv.show();
                radio.hide();
                other.hide();
            } else {
                online.hide();
                radioAndTvGroup.hide();
                printGroup.hide();
                printAddSize.hide();
                tv.hide();
                radio.hide();
                other.show();
            }
        }).change();

        includedServicesSelect.change(function () {
            if (includedServicesSelect.val() == ";
        // line 59
        echo twig_escape_filter($this->env, twig_constant(((isset($context["CampaignIncludedServicesEnum"]) ? $context["CampaignIncludedServicesEnum"] : $this->getContext($context, "CampaignIncludedServicesEnum")) . "NONE")), "html", null, true);
        echo ") {
                includedServicesOther.hide();
            } else {
                includedServicesOther.show();
            }
        }).change();

        \$('#contactForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: false,
            fields: {
                'form[supplierName]': {
                    validators: {
                        notEmpty: {
                            message: 'The supplier name is required and cannot be empty'
                        }
                    }
                },

                'form[supplierEmail]': {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required and cannot be empty'
                        }
                    }
                },


                'form[offerValidTill]': {
                    validators: {
                        notEmpty: {
                            message: 'The offer duration is required and cannot be empty'
                        }
                    }
                },

                'form[price]': {
                    validators: {
                        notEmpty: {
                            message: 'The price is required and cannot be empty'
                        }
                    }
                },

                'form[priceRegular]': {
                    validators: {
                        notEmpty: {
                            message: 'The regular price is required and cannot be empty'
                        }
                    }
                },

                'form[offerPeriodStart]': {
                    validators: {
                        notEmpty: {
                            message: 'The offer period start is required and cannot be empty'
                        },
                        callback: {
                            message: 'Start date must be smaller than end date Or select again ',
                            callback: function (value, validator) {
                                var EndDate = jQuery('#form_offerPeriodEnd').val();
                                if (EndDate) {
                                    if (EndDate > value) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                } else {
                                    return true;
                                }
                            }
                        }
                    }
                },

                'form[offerPeriodEnd]': {
                    validators: {
                        notEmpty: {
                            message: 'The offer period end is required and cannot be empty'
                        },
                        callback: {
                            message: 'End date must be greater than start date or select again',
                            callback: function (value, validator) {

                                var startDate = jQuery('#form_offerPeriodStart').val();
                                if (startDate) {
                                    if (startDate < value) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                } else {
                                    return true;
                                }
                            }
                        }
                    }
                }

            }
        })
        
        \$('#form_offerValidTill').blur(function() {
            \$('#contactForm').bootstrapValidator('revalidateField', \$(this));
        });
        
        \$('#form_offerPeriodStart, #form_offerPeriodEnd').blur(function() {
            if (\$('#form_offerPeriodStart').val()) \$('#contactForm').bootstrapValidator('revalidateField', \$('#form_offerPeriodStart'));
            if (\$('#form_offerPeriodEnd').val()) \$('#contactForm').bootstrapValidator('revalidateField', \$('#form_offerPeriodEnd'));
        });

    })(jQuery);


</script>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:contactScript.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 59,  68 => 39,  57 => 31,  46 => 23,  35 => 15,  19 => 1,);
    }
}
