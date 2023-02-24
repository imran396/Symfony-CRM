<?php

/* IntranetBundle:Macroses:standardShow.html.twig */
class __TwigTemplate_2c1fd31173aece8c1394cb516303590a37cdc715a6fde29be8b936221d7cc84a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'tableBody' => array($this, 'block_tableBody'),
            'buttons' => array($this, 'block_buttons'),
            'extraRows' => array($this, 'block_extraRows'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"row-fluid\">
    <div class=\"block span6\">
        <div class=\"block-heading\" data-toggle=\"collapse\"
             data-target=\"#widget1container\">";
        // line 4
        $this->displayBlock('header', $context, $blocks);
        echo "</div>
        <div id=\"widget1container\" class=\"block-body collapse in\">

             <div id=\"tablewidget\" class=\"block-body collapse in\">
                <table class=\"table table-bordered\">
                    ";
        // line 9
        $this->displayBlock('tableBody', $context, $blocks);
        // line 11
        echo "                </table>

                ";
        // line 13
        $this->displayBlock('buttons', $context, $blocks);
        // line 17
        echo "             </div>

             <div class=\"inline-forms ml13\">
                    ";
        // line 20
        if (((!array_key_exists("hide_edit", $context)) || (!(isset($context["hide_edit"]) ? $context["hide_edit"] : $this->getContext($context, "hide_edit"))))) {
            // line 21
            echo "                        <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(((isset($context["entityName"]) ? $context["entityName"] : $this->getContext($context, "entityName")) . "_edit"), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                            ";
            // line 22
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 23
            echo "                        </a>
                    ";
        }
        // line 25
        echo "                    ";
        if (((!array_key_exists("hide_delete", $context)) || (!(isset($context["hide_delete"]) ? $context["hide_delete"] : $this->getContext($context, "hide_delete"))))) {
            // line 26
            echo "                        ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "
                    ";
        }
        // line 28
        echo "             </div>

             <div class=\"ml13\">
                    <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath((isset($context["entityName"]) ? $context["entityName"] : $this->getContext($context, "entityName")));
        echo "\">
                        ";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 33
        echo "                    </a>
             </div>


        </div>
    </div>

</div>

";
        // line 42
        $this->displayBlock('extraRows', $context, $blocks);
        // line 46
        echo "

";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
    }

    // line 9
    public function block_tableBody($context, array $blocks = array())
    {
        // line 10
        echo "                    ";
    }

    // line 13
    public function block_buttons($context, array $blocks = array())
    {
        // line 14
        echo "

                ";
    }

    // line 42
    public function block_extraRows($context, array $blocks = array())
    {
        // line 43
        echo "

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:standardShow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 43,  122 => 42,  116 => 14,  113 => 13,  109 => 10,  106 => 9,  101 => 4,  95 => 46,  93 => 42,  82 => 33,  80 => 32,  76 => 31,  71 => 28,  65 => 26,  62 => 25,  58 => 23,  56 => 22,  51 => 21,  49 => 20,  44 => 17,  42 => 13,  38 => 11,  36 => 9,  28 => 4,  23 => 1,);
    }
}
