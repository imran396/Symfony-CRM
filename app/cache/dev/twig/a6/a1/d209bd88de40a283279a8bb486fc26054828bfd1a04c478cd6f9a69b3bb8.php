<?php

/* IntranetBundle:Macroses:denyButtonMacro.html.twig */
class __TwigTemplate_a6a1d209bd88de40a283279a8bb486fc26054828bfd1a04c478cd6f9a69b3bb8 extends Twig_Template
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
    }

    // line 1
    public function getmodal($__entityName__ = null, $__entityId__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entityName" => $__entityName__,
            "entityId" => $__entityId__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"modal small hide fade\" id=\"confirmDeny\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
         aria-hidden=\"true\" style=\"display: none;\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"modalLabel\">";
            // line 7
            echo $this->env->getExtension('translator')->getTranslator()->trans("Deny Confirmation", array(), "messages");
            echo "</h3>
        </div>
        <div class=\"modal-body\">

        <p class=\"error-text\"><i class=\"icon-warning-sign modal-icon mt20\"></i>";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("Are you sure you want to deny?", array(), "messages");
            echo "<br/>
            <textarea id=\"denyReason\" placeholder=\"";
            // line 12
            echo $this->env->getExtension('translator')->getTranslator()->trans("Deny reason", array(), "messages");
            echo "\"></textarea>
        </p>

        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
            // line 17
            echo $this->env->getExtension('translator')->getTranslator()->trans("Cancel", array(), "messages");
            echo "</button>
            <button class=\"btn btn-danger\" data-dismiss=\"denyAction\">";
            // line 18
            echo $this->env->getExtension('translator')->getTranslator()->trans("Deny", array(), "messages");
            echo "</button>
        </div>
    </div>

    <script type=\"text/javascript\">
        jQuery(function (\$) {
            \$modal = \$('#confirmDeny');
            \$denyButton = \$('#denyButton');
            \$denyReason = \$('#denyReason');


            \$denyButton.click(function (e) {
                e.preventDefault();
                \$denyReason.toggle(\$(this).data('reason')).val('');
                \$modal.modal('show');
            });

            \$modal.find('[data-dismiss=\"denyAction\"]').click(function () {
                \$modal.modal('hide');

                \$.ajax({
                    type: \"POST\",
                    url: ";
            // line 40
            echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath(((isset($context["entityName"]) ? $context["entityName"] : $this->getContext($context, "entityName")) . "_deny"), array("id" => (isset($context["entityId"]) ? $context["entityId"] : $this->getContext($context, "entityId")))));
            echo ",
                    data: {'reason': \$denyReason.val() },
                    statusCode: {
                        200: function () {
                            console.log('done');
                            location.reload();
                        }
                    }

                });
            });

        });
    </script>


";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:denyButtonMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 40,  63 => 18,  59 => 17,  51 => 12,  47 => 11,  40 => 7,  33 => 2,  21 => 1,);
    }
}
