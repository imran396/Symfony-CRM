<?php

/* IntranetBundle:Customer:featuresScript.html.twig */
class __TwigTemplate_e882ce293f10a5251894cab7e3ab555136693255e096c2dbfbbddba33df33cbf extends Twig_Template
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

        var \$parentSelect = \$('#customer_parent');
        var parentSelectDefault = \$parentSelect.val();
        var \$parentLabel = \$('[for=\"customer_parent\"]');
        var \$parentGroup = \$().add(\$parentSelect).add(\$parentLabel);
        var \$levelSelect = \$('#customer_level');
        var selectPlugin = null;

        function renderFail() {
            if (selectPlugin) {
                \$parentSelect.select2(\"destroy\");
            }
            \$parentGroup.hide();
            \$parentSelect.val(null);
            removeSpinner()
        }

        function renderSelect(level, prepopulated) {
            var requestUrl = null;
            removeSpinner();

            ";
        // line 24
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())) {
            // line 25
            echo "            requestUrl = ";
            echo twig_jsonencode_filter($this->env->getExtension('routing')->getUrl("customer_parent_for_level", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))));
            echo " +'/' + level;
            ";
        } else {
            // line 27
            echo "            requestUrl = ";
            echo twig_jsonencode_filter($this->env->getExtension('routing')->getUrl("customer_parent_for_level"));
            echo " +'/' + level;
            ";
        }
        // line 29
        echo "
            \$.ajax({
                url: requestUrl,
                dataType: 'json',
                beforeSend: function () {

                    ";
        // line 35
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "838a36b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_838a36b_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/838a36b_ajax_loader_gray_32_1.gif");
            // line 36
            echo "                    \$levelSelect.after(\$('<img style=\"display:block\"/>').addClass('spinner').attr({'src': '";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "'})[0]);
                    ";
        } else {
            // asset "838a36b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_838a36b") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/838a36b.gif");
            echo "                    \$levelSelect.after(\$('<img style=\"display:block\"/>').addClass('spinner').attr({'src': '";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "'})[0]);
                    ";
        }
        unset($context["asset_url"]);
        // line 38
        echo "                },
                success: function (data) {
                    \$parentSelect.html(null);

                    \$parentSelect.append(\$('<option>'));

                    for (key in data) {
                        \$parentSelect.append(\$('<option value=\"' + data[key].id + '\" >').text(data[key].name));
                    }

                    if (prepopulated !== null) {
                        \$parentSelect.val(prepopulated);
                    }

                    if (data && data.length) {
                        \$parentGroup.show();
                        selectPlugin = \$parentSelect.select2({allowClear: true});
                        removeSpinner();
                    } else {
                        renderFail();
                    }
                },
                fail: function () {
                    renderFail();
                }

            });
        }


        function removeSpinner() {
            \$('.spinner').remove();
        }

        renderSelect(\$levelSelect.val(), parentSelectDefault);

        \$levelSelect.change(function () {
            renderSelect(\$(this).val(), parentSelectDefault);
        });

    });
</script>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:featuresScript.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 38,  70 => 36,  66 => 35,  58 => 29,  52 => 27,  46 => 25,  44 => 24,  19 => 1,);
    }
}
