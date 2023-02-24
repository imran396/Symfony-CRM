<?php

/* IntranetBundle:Campaign:featuresScript.html.twig */
class __TwigTemplate_c5170add9689e1a258f2b82ecbac83cbdda28c02a7638785277f4c3cb8bca193 extends Twig_Template
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
        ob_start();
        // line 2
        echo "    <script type=\"text/javascript\">
        jQuery(function (\$) {
            \$(\".lined\").linedtextarea();

            var \$campaignSupplierSelect = \$('#campaign_supplier');
            var \$contactSelect = \$('#campaign_contact');

            var printGroup = \$('#campaign_numberOfAds, #campaign_sizeOfAds').parent();
            var radioAndTvGroup = \$('#campaign_numberOfSeconds').parent();

            ";
        // line 12
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "838a36b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_838a36b_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/838a36b_ajax_loader_gray_32_1.gif");
            // line 13
            echo "            var \$spinner = \$('<img class=\"spinner\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">').insertAfter(\$campaignSupplierSelect.parent()).hide();
            ";
        } else {
            // asset "838a36b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_838a36b") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/838a36b.gif");
            echo "            var \$spinner = \$('<img class=\"spinner\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">').insertAfter(\$campaignSupplierSelect.parent()).hide();
            ";
        }
        unset($context["asset_url"]);
        // line 15
        echo "
            var \$audienceSizeInput = \$('#campaign_audiencesize');
            var \$audienceSizeModal = \$('#changeAudienceSizeConfirm');
            var firstRun = true;
            var audienceLabel = \$('label[for=\"campaign_audiencesize\"]');
            var audienceLabelDefaultText = audienceLabel.text();
            var audienceLabels = ";
        // line 21
        echo twig_jsonencode_filter((isset($context["supplierAudienceTitlesEnum"]) ? $context["supplierAudienceTitlesEnum"] : $this->getContext($context, "supplierAudienceTitlesEnum")));
        echo ";

            \$campaignSupplierSelect.change(function () {
                \$this = \$(this);

                \$.ajax({
                    url: ";
        // line 27
        echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath("supplier_get_supplier_data"));
        echo ",
                    type: \"POST\",
                    dataType: 'json',
                    data: {'supplier_id': \$this.val()},
                    beforeSend: function () {
                        \$spinner.show();
                        radioAndTvGroup.hide();
                        printGroup.hide();
                    },
                    success: function (data) {
                        \$spinner.hide();
                        if (data) {
                            if (!firstRun) {
                                applyAudienceSize(data.audiencesize);
                            }
                            applySupplierContacts(data.contacts);
                            applySupplierType(data.type);
                        }
                        firstRun = false;
                    },
                    error: function () {
                        \$resultBlock.hide();
                    }
                });
            }).change();


            function applyAudienceSize(\$audienceSize) {
                if (parseInt(\$audienceSize) > 0 && \$audienceSize != \$audienceSizeInput.val()) {
                    \$audienceSizeModal.modal('show');

                    \$('[data-dismiss=\"changeAudienceSizeAction\"]').unbind(\"click\").click(function () {
                        \$audienceSizeInput.val(\$audienceSize);
                        \$audienceSizeModal.modal('hide');
                    });
                }
            }

            function applySupplierContacts(\$supplierContacts) {
                \$contactSelect.find('option').each(function() {
                    var valid = \$.inArray(parseInt(\$(this).attr('value')), \$supplierContacts);
                    \$(this).toggle(\$(this).attr('value') == '' || valid != -1);
                });
                var valid = \$.inArray(parseInt(\$contactSelect.val()), \$supplierContacts);
                if (valid == -1) {
                    \$contactSelect.val('');
                }
            }

            function applySupplierType(\$supplierType) {
                if (\$supplierType && typeof audienceLabels[\$supplierType] != 'undefined') {
                    audienceLabel.text(audienceLabels[\$supplierType]);
                } else {
                    audienceLabel.text(audienceLabelDefaultText);
                }

                switch (\$supplierType) {
                    case ";
        // line 84
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "PrintType")), "html", null, true);
        echo ":
                        radioAndTvGroup.hide();
                        printGroup.show();
                        break;
                    case ";
        // line 88
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "OnlineType")), "html", null, true);
        echo ":
                        radioAndTvGroup.hide();
                        printGroup.hide();
                        \$('#campaign_sizeOfAds,label[for=\"campaign_sizeOfAds\"]').show();
                        break;
                    case ";
        // line 93
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "RadioType")), "html", null, true);
        echo ":
                    case ";
        // line 94
        echo twig_escape_filter($this->env, twig_constant(((isset($context["SupplierTypesEnum"]) ? $context["SupplierTypesEnum"] : $this->getContext($context, "SupplierTypesEnum")) . "TvType")), "html", null, true);
        echo ":
                        radioAndTvGroup.show();
                        printGroup.hide();
                        break;
                    default:
                        radioAndTvGroup.hide();
                        printGroup.hide();
                        break;
                }
            }

             \$('#campaign_invoiceAddress').after(\$('<button class=\"btn icon-link\"></button>').click(function(e) {
                e.preventDefault();
                \$.ajax({
                    url: ";
        // line 108
        echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath("customer_get_address"));
        echo ",
                    type: \"POST\",
                    dataType: 'json',
                    data: {'customer_id': \$('#campaign_customer').val(), 'forCampaignInvoice': 1},
                    success: function (data) {
                        \$('#campaign_invoiceAddress').val(data);
                    }
                });
            }));
        });
    </script>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:featuresScript.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 108,  147 => 94,  143 => 93,  135 => 88,  128 => 84,  68 => 27,  59 => 21,  51 => 15,  37 => 13,  33 => 12,  21 => 2,  19 => 1,);
    }
}
