<?php

/* IntranetBundle:Task:script.html.twig */
class __TwigTemplate_58d5fb5ca1e95612bc9556201ed3f52886079fc384d9e3f2e00d3d668ccdc416 extends Twig_Template
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

    jQuery(function (\$) {
        var printItems = \$(
                '#task_graphicsCirculation, ' +
                '#task_paymentMethod, '+
                '#task_invoiceAddress, '+
                '#task_deliveryAddress, '+
                '#task_printSpeed, '+
                '#task_orderReference'
        ).closest('.form-main');

        var graphicsItems = \$(
                '#task_graphicsType, ' +
                '#task_paperType, ' +
                '#task_graphicsFormat, ' +
                '#task_expedited, '+
                '#task_newDesign,' +
                '#task_approvalReminderDelay'
        ).closest('.form-main').add(printItems);
        var normalItems = \$('#task_complaint, #task_dueDate').closest('.form-main');
        var userSelect = \$('#task_user').closest('.form-main');
        var typeChoice = \$('#task_type');
        var graphicsTypeChoice = \$('#task_graphicsType');
        var graphicsCirculationChoice = \$('#task_graphicsCirculation');
        var graphicsFormatChoice = \$('#task_graphicsFormat');
        var statusChoicePrinting = \$('#task_status option[value=";
        // line 27
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "PRINTING")), "html", null, true);
        echo "]');
        var statusChoiceThirdPartyWait = \$('#task_status option[value=";
        // line 28
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "THIRD_PARTY_WAIT")), "html", null, true);
        echo "]');
        var customerChoice = \$('#task_customer');
        var paperChoice = \$('#task_paperType');
        var printSpeedChoice = \$('#task_printSpeed');
        var paymentMethodChoice = \$('#task_paymentMethod');
        var invoiceAddressField = \$('#task_invoiceAddress');
        var deliveryAddressField = \$('#task_deliveryAddress');
        var customerAddress = ";
        // line 35
        echo twig_jsonencode_filter($this->env->getExtension('beon_extension')->getCustomerAddress());
        echo ";
        var customerAddresses = {};

        var addDaysWarningMessages = ";
        // line 38
        echo twig_jsonencode_filter((isset($context["addDaysWarningMessages"]) ? $context["addDaysWarningMessages"] : $this->getContext($context, "addDaysWarningMessages")));
        echo ";
        var addDaysWarningMessage = \$('<div>').css('color', 'red').addClass('form-main').hide();
        \$('#task_expedited').after(\$('<a class=\"btn\" href=\"";
        // line 40
        if ($this->getAttribute($this->env->getExtension('beon_extension')->getConfigValue(1050), "value", array(), "any", true, true)) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->env->getExtension('beon_extension')->getConfigValue(1050), "value", array()), "html", null, true);
            echo " ";
        }
        echo "\">Preisliste</a>')).parent().after(addDaysWarningMessage);

        var setAddDaysWarningMessage = function() {
            var idx = parseInt(\$('#task_newDesign').val() * 2) + parseInt(\$('#task_expedited').val());
            if (addDaysWarningMessages[idx]) {
                addDaysWarningMessage.text(addDaysWarningMessages[idx]);
                addDaysWarningMessage.show();
            } else {
                addDaysWarningMessage.hide();
            }
        };
        \$('#task_newDesign, #task_expedited').change(setAddDaysWarningMessage);

        typeChoice.change(function () {
            if (\$(this).val() == ";
        // line 54
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")), "html", null, true);
        echo ") {
                graphicsItems.show();
                setAddDaysWarningMessage();
                normalItems.hide();
                if (typeChoice.attr('type') != 'hidden') {
                    userSelect.hide();
                }
                paperChoice.change();
                statusChoicePrinting.show();
                statusChoiceThirdPartyWait.hide();                
            } else {
                paperChoice.val(";
        // line 65
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskPaperTypeEnum"]) ? $context["TaskPaperTypeEnum"] : $this->getContext($context, "TaskPaperTypeEnum")) . "NONE")), "html", null, true);
        echo ");
                graphicsTypeChoice.val('');
                graphicsItems.hide();
                addDaysWarningMessage.hide();
                normalItems.show();
                userSelect.show();
                statusChoicePrinting.hide();
                statusChoiceThirdPartyWait.show();
            }
        }).change();

        paperChoice.change(function () {
            if ((typeChoice.size() == 0 || typeChoice.val() == ";
        // line 77
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")), "html", null, true);
        echo ") && \$(this).val() != ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskPaperTypeEnum"]) ? $context["TaskPaperTypeEnum"] : $this->getContext($context, "TaskPaperTypeEnum")) . "NONE")), "html", null, true);
        echo ") {
                printItems.show();
                var value = graphicsTypeChoice.val();
                if (value == ";
        // line 80
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "FLYER")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "POSTER")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "BUSINESS_CARD")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "PVC")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "MASH")), "html", null, true);
        echo ") {
                    printSpeedChoice.closest('.form-main').show();
                } else {
                    printSpeedChoice.closest('.form-main').hide();
                }
            } else {
                printItems.hide();
            }
        }).change();

        graphicsTypeChoice.change(function () {
            var value = \$(this).val();
            if (value == '' || value == ";
        // line 92
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "AD")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "WEB")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "FACEBOOK")), "html", null, true);
        echo ") {
                paperChoice.val(";
        // line 93
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskPaperTypeEnum"]) ? $context["TaskPaperTypeEnum"] : $this->getContext($context, "TaskPaperTypeEnum")) . "NONE")), "html", null, true);
        echo ").change().closest('.form-main').hide();
                filterFormat(null);
            } else {
                paperChoice.change().closest('.form-main').show();
                if (value == ";
        // line 97
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "FLYER")), "html", null, true);
        echo ") {
                    filterCirculation([500, 1000, 2500, 5000, 10000]);
                    filterFormat(['A5', 'A6', 'A7', 'DINlang Klappflyer']);
                } else if (value == ";
        // line 100
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "POSTER")), "html", null, true);
        echo ") {
                    filterCirculation([5, 6, 7, 8, 9, 10, 15, 20, 25, 100]);
                    filterFormat(['A0', 'A1', 'A2', 'A3', 'A4', 'Banner']);
                } else if (value == ";
        // line 103
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "BUSINESS_CARD")), "html", null, true);
        echo ") {
                    filterCirculation([100, 250, 500, 1000, 2500, 5000]);
                    filterFormat(['Visitenkarte', 'Cocktailfähnchen']);
                } else {
                    filterCirculation(null);
                    filterFormat(null);
                }
                if (value == ";
        // line 110
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "MENU")), "html", null, true);
        echo " || value == ";
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "BOOKLET")), "html", null, true);
        echo ") {
                    \$('#task_expedited').val(0).find('option:not(:selected)').prop('disabled', true);
                    \$('#task_newDesign').val(1).find('option:not(:selected)').prop('disabled', true);
                } else {
                    \$('#task_expedited, #task_newDesign').find('option').prop('disabled', false);
                }
            }
        }).change();

        function filterCirculation(values) {
            if (values === null) {
                graphicsCirculationChoice.find('option').show();
            } else {
                graphicsCirculationChoice.find('option').each(function() {
                    var valid = \$.inArray(parseInt(\$(this).text()), values);
                    \$(this).toggle(valid != -1 || \$(this).is(':selected'));
                });
            }
        }

        function filterFormat(values) {
            if (values === null) {
                graphicsFormatChoice.find('option').show();
            } else {
                graphicsFormatChoice.find('option').each(function() {
                    var valid = \$.inArray(\$(this).text(), values);
                    \$(this).toggle(valid != -1 || \$(this).is(':selected'));
                });
            }
        }

        function applyCustomerAddress() {
            if (typeChoice.val() == ";
        // line 142
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")), "html", null, true);
        echo ") {
                invoiceAddressField.prop('readonly', false);
                var customer_id = customerChoice.val();
                if (customer_id == '') {
                    invoiceAddressField.prop('readonly', false);
                    return;
                }
                if (customerAddress != null || customerAddresses.hasOwnProperty(customer_id)) {
                    var isVorkasse = paymentMethodChoice.val() == ";
        // line 150
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskPaymentTypeEnum"]) ? $context["TaskPaymentTypeEnum"] : $this->getContext($context, "TaskPaymentTypeEnum")) . "VORKASSE_FRANCHISE")), "html", null, true);
        echo ";
                    var isNachnahme = paymentMethodChoice.val() == ";
        // line 151
        echo twig_escape_filter($this->env, twig_constant(((isset($context["TaskPaymentTypeEnum"]) ? $context["TaskPaymentTypeEnum"] : $this->getContext($context, "TaskPaymentTypeEnum")) . "NACHNAHME")), "html", null, true);
        echo ";
                    var address = customerAddress != null ? customerAddress : customerAddresses[customer_id];
                    if (isVorkasse) {
                        invoiceAddressField.data('changed', false).val(";
        // line 154
        echo twig_jsonencode_filter($this->env->getExtension('beon_extension')->getEnchiladasFranchiseAddress());
        echo ");
                    }
                    if (isNachnahme && !invoiceAddressField.data('changed')) {
                        invoiceAddressField.val(address);
                    }
                    if (!deliveryAddressField.data('changed')) {
                        deliveryAddressField.val(address);
                    }
                    invoiceAddressField.prop('readonly', isVorkasse);
                } else {
                    \$.ajax({
                        url: ";
        // line 165
        echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath("customer_get_address"));
        echo ",
                        type: \"POST\",
                        dataType: 'json',
                        data: {'customer_id': customer_id},
                        success: function (data) {
                            customerAddresses[customer_id] = data;
                            applyCustomerAddress();
                        }
                    });
                }
            }
        }

        customerChoice.change(function () {
            applyCustomerAddress();
        });

        paymentMethodChoice.change(function () {
            applyCustomerAddress();
        });

        \$().add(deliveryAddressField).add(invoiceAddressField).change(function() {
            \$(this).data('changed', \$(this).val() != '');
        }).change();

        applyCustomerAddress();
    });

</script>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  262 => 165,  248 => 154,  242 => 151,  238 => 150,  227 => 142,  190 => 110,  180 => 103,  174 => 100,  168 => 97,  161 => 93,  153 => 92,  130 => 80,  122 => 77,  107 => 65,  93 => 54,  72 => 40,  67 => 38,  61 => 35,  51 => 28,  47 => 27,  19 => 1,);
    }
}
