<?php

/* IntranetBundle:Macroses:proposalMacro.html.twig */
class __TwigTemplate_3b947136caa2d748e711e9b49a145c84389c8359b53d95085bd7ad7cb9aee268 extends Twig_Template
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
            echo "    <div class=\"modal small hide fade\" id=\"setProposal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
         aria-hidden=\"true\" style=\"display: none;\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"modalLabel\">";
            // line 6
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add proposal", array(), "messages");
            echo "</h3>
        </div>
        <div class=\"modal-body\">

            <p class=\"error-text\">";
            // line 10
            echo $this->env->getExtension('translator')->getTranslator()->trans("What's your propasal?", array(), "messages");
            echo "<br/>
                <textarea id=\"proposal\" placeholder=\"";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add proposal", array(), "messages");
            echo "\"></textarea>
            </p>

        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
            // line 16
            echo $this->env->getExtension('translator')->getTranslator()->trans("Cancel", array(), "messages");
            echo "</button>
            <button class=\"btn btn-danger\" data-dismiss=\"proposalAction\">";
            // line 17
            echo $this->env->getExtension('translator')->getTranslator()->trans("Save", array(), "messages");
            echo "</button>
        </div>
    </div>

    <script type=\"text/javascript\">
        jQuery(function (\$) {

            \$modal = \$('#setProposal');
            \$proposalButton = \$('#proposalButton');
            \$proposal = \$('#proposal');

            \$proposalButton.click(function (e) {
                e.preventDefault();
                \$modal.modal('show');
            });

            \$modal.find('[data-dismiss=\"proposalAction\"]').click(function () {
                \$modal.modal('hide');
                \$.ajax({
                    type: \"POST\",
                    url: ";
            // line 37
            echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath(((isset($context["entityName"]) ? $context["entityName"] : $this->getContext($context, "entityName")) . "_proposal"), array("id" => (isset($context["entityId"]) ? $context["entityId"] : $this->getContext($context, "entityId")))));
            echo ",
                    data: {'proposal': \$proposal.val() },
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
        return "IntranetBundle:Macroses:proposalMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 37,  62 => 17,  58 => 16,  50 => 11,  46 => 10,  39 => 6,  33 => 2,  21 => 1,);
    }
}
