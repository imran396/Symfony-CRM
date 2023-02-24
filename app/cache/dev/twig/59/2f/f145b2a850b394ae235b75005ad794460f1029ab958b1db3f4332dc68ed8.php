<?php

/* IntranetBundle:Macroses:contactRelation.html.twig */
class __TwigTemplate_592ff145b2a850b394ae235b75005ad794460f1029ab958b1db3f4332dc68ed8 extends Twig_Template
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
    <div class=\"modal small hide fade\" id=\"contactRelation\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"display: none;\">

        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"modalLabel\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Add new contact relation", array(), "messages");
        echo "</h3>
        </div>
        <div class=\"modal-body\">
        </div>

        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Cancel", array(), "messages");
        echo "</button>
            <button class=\"btn btn-danger\" data-dismiss=\"ContactAction\">";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("Save", array(), "messages");
        echo "</button>
        </div>

    </div>

    <script type=\"text/javascript\">
        jQuery(function (\$) {

            \$modal = \$('#contactRelation');
            \$('#supplierContact').click(function () {
                \$('.modal-body').html(\$('#supplierContactForm').html());
                \$('.select2-container').html(\"\");
                \$modal.modal('show');
                \$('select#form_supplier_id').select2();
            });

            \$('#supplierGroupContact').click(function () {
                \$('.modal-body').html(\$('#supplierGroupContactForm').html());
                \$('.select2-container').html(\"\");
                \$modal.modal('show');
                \$('select#form_supplierGroup_id').select2();
            });

            \$('#cityContact').click(function () {
                \$('.modal-body').html(\$('#cityContactForm').html());
                \$('.select2-container').html(\"\");
                \$modal.modal('show');
                \$('select#form_city_id').select2();
            });

            \$('#customerContact').click(function () {
                \$('.modal-body').html(\$('#customerContactForm').html());
                \$('.select2-container').html(\"\");
                \$modal.modal('show');
                \$('select#form_customer_id').select2();
            });

            \$modal.find('[data-dismiss=\"ContactAction\"]').click(function () {
                \$modal.find('form').submit();
                \$modal.modal('hide');
            });

        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:contactRelation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 13,  35 => 12,  26 => 6,  19 => 1,);
    }
}
