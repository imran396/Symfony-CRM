<?php

/* IntranetBundle:Macroses:uploadList.html.twig */
class __TwigTemplate_67c39d759021e85d7504078c717b4b03e6f1786155e8dfcd0a6d99aa14b4ab55 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'loopChunk' => array($this, 'block_loopChunk'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["taskSubmitFiles"] = ((((((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")) == "task") && twig_test_empty((isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")))) && $this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_SUBMITFILES")) && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "submitFilesStatus", array(), "any", true, true)) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submitFilesStatus", array()) == true));
        // line 2
        echo "<div class=\"block span6\">
    <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("Uploads", array(), "messages");
        echo "</div>
    <div id=\"widget1container\" class=\"block-body collapse in\"> 
        <table class=\"table\">
            <thead>
            <tr>
                <th style=\"width: 90%\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("File name", array(), "messages");
        echo "</th>
                <th style=\"text-align: right\">";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("File size", array(), "messages");
        echo "</th>
                <th style=\"text-align: right\">";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
            </tr>
            </thead>
            <tbody>

            ";
        // line 15
        $this->displayBlock('loopChunk', $context, $blocks);
        // line 20
        echo "            </tbody>
        </table>

        ";
        // line 23
        if (($this->env->getExtension('security')->isGranted("ROLE_UPLOADS_NEW") && (isset($context["uploadFileForm"]) ? $context["uploadFileForm"] : $this->getContext($context, "uploadFileForm")))) {
            // line 24
            echo "            ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["uploadFileForm"]) ? $context["uploadFileForm"] : $this->getContext($context, "uploadFileForm")), 'form');
            echo "
        ";
        }
        // line 26
        echo "
        <button id=\"sendExternalUploadEmailInvoiceButton\" class=\"btn btn-table-actions hidden\" type=\"button\">";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("Send invoice upload link", array(), "messages");
        echo "</button>
        <button id=\"sendExternalUploadEmailButton\" class=\"btn btn-table-actions hidden\" type=\"button\">";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("Send upload link", array(), "messages");
        echo "</button>
        ";
        // line 29
        if ((isset($context["taskSubmitFiles"]) ? $context["taskSubmitFiles"] : $this->getContext($context, "taskSubmitFiles"))) {
            // line 30
            echo "            <button class=\"btn btn-table-actions\" id=\"submit_uploaded_files\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Submit files for printing", array(), "messages");
            echo "</button>
        ";
        }
        // line 32
        echo "        <span id=\"submit_files_loader\"></span>
    </div>

    <script>
        \$('.tag-toggle').click(function() {
            var tag = \$(this);
            \$.ajax({
                url: ";
        // line 39
        echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath("upload_toggle_group_flag"));
        echo ",
                type: \"POST\",
                data: {'id': tag.data('id')},
                success: function (data) {
                    tag.removeClass('tag-grey').removeClass('tag-yellow').removeClass('tag-green').addClass(data);
                }
            });
        });
        
        ";
        // line 48
        if ((isset($context["taskSubmitFiles"]) ? $context["taskSubmitFiles"] : $this->getContext($context, "taskSubmitFiles"))) {
            // line 49
            echo "            var entity = ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "html", null, true);
            echo ";
            \$('#submit_uploaded_files').click(function(){
                if (\$(this).hasClass('checkboxes-shown')) {
                    var selected = [];
                    \$('.checkbox-toggle:checked').each(function(){
                        selected.push( \$(this).val() );
                    })
                    if( selected.length <= 0 ){
                        \$(this).removeClass('checkboxes-shown');
                        \$('.checkbox-toggle').hide();
                        return false;
                    }
                    uploadIds = selected.join(',');
                                    
                    \$.ajax({
                        url: ";
            // line 64
            echo twig_jsonencode_filter($this->env->getExtension('routing')->getPath("task_submit_files"));
            echo ",
                        type: \"POST\",
                        data: {'id': entity, 'uploadIds': uploadIds},
                        beforeSend: function(){
                            \$('#submit_files_loader').html('Submitting files. Please wait...');
                        },
                        success: function (data) {
                            \$('#submit_files_loader').html('');
                            \$('input:checkbox:checked').attr('checked', false);
                            response = JSON.parse(data);
                            if( response.status == true )
                            {
                                \$('#submit_files_loader').html( response.msg );
                            } else {
                                \$('#submit_files_loader').html( response.msg );
                            }
                            setTimeout(\"location.reload()\", 1000);
                        }
                    });
                    \$(this).removeClass('checkboxes-shown');
                    \$('.checkbox-toggle').hide();
                } else {
                    \$('.checkbox-toggle').show();
                    \$(this).addClass('checkboxes-shown');
                }
            })
        ";
        }
        // line 91
        echo "    </script>
</div>
";
    }

    // line 15
    public function block_loopChunk($context, array $blocks = array())
    {
        // line 16
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "uploads", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["upload"]) {
            // line 17
            echo "                    ";
            $this->env->loadTemplate("IntranetBundle:Macroses:uploadItemChunk.html.twig")->display($context);
            // line 18
            echo "                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upload'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:uploadList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 19,  185 => 18,  182 => 17,  164 => 16,  161 => 15,  155 => 91,  125 => 64,  106 => 49,  104 => 48,  92 => 39,  83 => 32,  77 => 30,  75 => 29,  71 => 28,  67 => 27,  64 => 26,  58 => 24,  56 => 23,  51 => 20,  49 => 15,  41 => 10,  37 => 9,  33 => 8,  25 => 3,  22 => 2,  20 => 1,);
    }
}
