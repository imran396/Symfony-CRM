<?php

/* IntranetBundle:Macroses:emailSenderMacro.html.twig */
class __TwigTemplate_1ea030da32fb4f997c729e5c6699cf391b4c94477dd1b70e7f45da185ac28cc1 extends Twig_Template
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
    public function getexternalEmailmodal($__entity__ = null, $__entityName__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entity" => $__entity__,
            "entityName" => $__entityName__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"modal small hide fade\" id=\"sendExternalUploadLink\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
         aria-hidden=\"true\" style=\"display: none;\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"modalLabel\">";
            // line 7
            echo $this->env->getExtension('translator')->getTranslator()->trans("Send invoice upload link", array(), "messages");
            echo "</h3>
        </div>
        <div class=\"modal-body\">
            <textarea style=\"width: 289px; height: 50px;\" id=\"emails\"
                      placeholder=\"";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("e.g. john@gmail.com,kevin@yahoo.com", array(), "messages");
            echo "\">";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contact", array())) {
                echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contact", array()), "email", array())), "html", null, true);
            }
            echo "</textarea>
        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
            // line 14
            echo $this->env->getExtension('translator')->getTranslator()->trans("Cancel", array(), "messages");
            echo "</button>
            <button class=\"btn btn-danger\" data-dismiss=\"sendAction\">";
            // line 15
            echo $this->env->getExtension('translator')->getTranslator()->trans("Save", array(), "messages");
            echo "</button>
        </div>
    </div>

    <script type=\"text/javascript\">
        jQuery(function (\$) {

            \$modalExternalUpload = \$('#sendExternalUploadLink');
            \$externalUploadLink = \$('#externalUploadLink');
            \$emails = \$('#emails');

            \$externalUploadLink.removeClass('hidden').click(function (e) {
                e.preventDefault();
                \$modalExternalUpload.modal('show');
            });

            \$modalExternalUpload.find('[data-dismiss=\"sendAction\"]').click(function () {
                \$modalExternalUpload.modal('hide');
                \$.ajax({
                    type: \"POST\",
                    url: ";
            // line 35
            echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath(((isset($context["entityName"]) ? $context["entityName"] : $this->getContext($context, "entityName")) . "_send_upload_link"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))));
            echo ",
                    data: {'emailList': \$emails.val() },
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
        return "IntranetBundle:Macroses:emailSenderMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 35,  61 => 15,  57 => 14,  47 => 11,  40 => 7,  33 => 2,  21 => 1,);
    }
}
