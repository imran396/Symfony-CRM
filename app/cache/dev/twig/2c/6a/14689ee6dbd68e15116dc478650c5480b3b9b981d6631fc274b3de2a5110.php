<?php

/* IntranetBundle:Macroses:standardViewsMacro.html.twig */
class __TwigTemplate_2c6a14689ee6dbd68e15116dc478650c5480b3b9b981d6631fc274b3de2a5110 extends Twig_Template
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
        // line 22
        echo "

";
        // line 44
        echo "
";
        // line 83
        echo "
";
    }

    // line 1
    public function getnew($__formView__ = null, $__path__ = null, $__header__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "formView" => $__formView__,
            "path" => $__path__,
            "header" => $__header__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
            // line 5
            echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "html", null, true);
            echo "
            </div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
            // line 9
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["formView"]) ? $context["formView"] : $this->getContext($context, "formView")), 'form');
            echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
            // line 13
            echo $this->env->getExtension('routing')->getPath((isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")));
            echo "\">
                            ";
            // line 14
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back", array(), "messages");
            // line 15
            echo "                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 24
    public function getedit($__formView__ = null, $__path__ = null, $__header__ = null, $__editPath__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "formView" => $__formView__,
            "path" => $__path__,
            "header" => $__header__,
            "editPath" => $__editPath__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 25
            echo "    <div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
            // line 27
            echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "html", null, true);
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">

                ";
            // line 30
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["formView"]) ? $context["formView"] : $this->getContext($context, "formView")), 'form', array("attr" => array("class" => "form-horizontal")));
            echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath((isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")));
            echo "\">
                            ";
            // line 35
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
            // line 36
            echo "                        </a>
                        <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["editPath"]) ? $context["editPath"] : $this->getContext($context, "editPath")), "html", null, true);
            echo "\"> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 45
    public function getshow($__entity__ = null, $__tableBody__ = null, $__delete_form__ = null, $__indexPath__ = null, $__editPath__ = null, $__header__ = null, $__extra__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entity" => $__entity__,
            "tableBody" => $__tableBody__,
            "delete_form" => $__delete_form__,
            "indexPath" => $__indexPath__,
            "editPath" => $__editPath__,
            "header" => $__header__,
            "extra" => $__extra__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 46
            echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 50
            echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "html", null, true);
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">

                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        ";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["tableBody"]) ? $context["tableBody"] : $this->getContext($context, "tableBody")), "html", null, true);
            echo "
                    </table>
                </div>

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
            // line 61
            echo $this->env->getExtension('routing')->getPath((isset($context["indexPath"]) ? $context["indexPath"] : $this->getContext($context, "indexPath")));
            echo "\">
                            ";
            // line 62
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
            // line 63
            echo "                        </a>
                    </li>
                    <li>
                        <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["editPath"]) ? $context["editPath"] : $this->getContext($context, "editPath")), array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                            ";
            // line 67
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 68
            echo "                        </a>
                    </li>
                    <li>";
            // line 70
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "</li>
                </ul>
            </div>
        </div>


    </div>

    ";
            // line 78
            if ((isset($context["extra"]) ? $context["extra"] : $this->getContext($context, "extra"))) {
                // line 79
                echo "        ";
                echo twig_escape_filter($this->env, (isset($context["extra"]) ? $context["extra"] : $this->getContext($context, "extra")), "html", null, true);
                echo "
    ";
            }
            // line 81
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 84
    public function getindex($__entities__ = null, $__name__ = null, $__newPath__ = null, $__header__ = null, $__newHeader__ = null, $__pagesCount__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "name" => $__name__,
            "newPath" => $__newPath__,
            "header" => $__header__,
            "newHeader" => $__newHeader__,
            "pagesCount" => $__pagesCount__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 85
            echo "
    <h1 class=\"page-title\">";
            // line 86
            echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "html", null, true);
            echo "</h1>

    ";
            // line 88
            if ((!twig_test_empty((isset($context["newPath"]) ? $context["newPath"] : $this->getContext($context, "newPath"))))) {
                // line 89
                echo "        <div class=\"btn-toolbar\">
            <a href=\"";
                // line 90
                echo $this->env->getExtension('routing')->getPath((isset($context["newPath"]) ? $context["newPath"] : $this->getContext($context, "newPath")));
                echo "\" class=\"btn \"><i class=\"icon-plus\"></i> ";
                echo twig_escape_filter($this->env, (isset($context["newHeader"]) ? $context["newHeader"] : $this->getContext($context, "newHeader")), "html", null, true);
                echo "</a>
        </div>
    ";
            }
            // line 93
            echo "
    <div class=\"well\">
        <div id=\"tablewidget\" class=\"block-body collapse in\">

            ";
            // line 97
            $this->env->resolveTemplate((("IntranetBundle:" . (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))) . ":indexTable.html.twig"))->display($context);
            // line 98
            echo "
        </div>
    </div>
    ";
            // line 101
            $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:standardViewsMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  288 => 101,  283 => 98,  281 => 97,  275 => 93,  267 => 90,  264 => 89,  262 => 88,  257 => 86,  254 => 85,  238 => 84,  226 => 81,  220 => 79,  218 => 78,  207 => 70,  203 => 68,  201 => 67,  197 => 66,  192 => 63,  190 => 62,  186 => 61,  177 => 55,  169 => 50,  163 => 46,  146 => 45,  126 => 37,  123 => 36,  121 => 35,  117 => 34,  110 => 30,  104 => 27,  100 => 25,  86 => 24,  69 => 15,  67 => 14,  63 => 13,  56 => 9,  49 => 5,  44 => 2,  31 => 1,  26 => 83,  23 => 44,  19 => 22,);
    }
}
