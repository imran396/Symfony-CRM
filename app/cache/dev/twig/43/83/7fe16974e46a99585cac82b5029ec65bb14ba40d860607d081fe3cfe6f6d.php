<?php

/* IntranetBundle:Note:show.html.twig */
class __TwigTemplate_43837fe16974e46a99585cac82b5029ec65bb14ba40d860607d081fe3cfe6f6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Note", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">


                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                        ";
        // line 15
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type", array())) {
            // line 16
            echo "                        <tr>
                            <th style=\"min-width: 100px;\">";
            // line 17
            echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
            echo "</th>
                            <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type", array()), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        // line 21
        echo "                        <tr>
                            <th style=\"min-width: 100px;\">";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Text", array(), "messages");
        echo "</th>
                            <td>";
        // line 23
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "text", array()), "html", null, true));
        echo "</td>
                        </tr>
                        ";
        // line 25
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "date", array())) {
            // line 26
            echo "                        <tr>
                            <th style=\"min-width: 100px;\">";
            // line 27
            echo $this->env->getExtension('translator')->getTranslator()->trans("Date", array(), "messages");
            echo "</th>
                            <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "date", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        // line 31
        echo "                        <tr>
                            <th>";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
                            <td>";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
        echo "</td>
                        </tr>
                        ";
        // line 35
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array())) {
            // line 36
            echo "                        <tr>
                            <th>";
            // line 37
            echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "displayName", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 41
        echo "                        ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())) {
            // line 42
            echo "                        <tr>
                            <th>";
            // line 43
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 47
        echo "                        ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array())) {
            // line 48
            echo "                        <tr>
                            <th>";
            // line 49
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 53
        echo "                        ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", array())) {
            // line 54
            echo "                        <tr>
                            <th>";
            // line 55
            echo $this->env->getExtension('translator')->getTranslator()->trans("Press release", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 59
        echo "                        ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", array())) {
            // line 60
            echo "                        <tr>
                            <th>";
            // line 61
            echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 65
        echo "                        ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaint", array())) {
            // line 66
            echo "                        <tr>
                            <th>";
            // line 67
            echo $this->env->getExtension('translator')->getTranslator()->trans("Complaint", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaint", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaint", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 71
        echo "                        ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "monitoredurl", array())) {
            // line 72
            echo "                        <tr>
                            <th>";
            // line 73
            echo $this->env->getExtension('translator')->getTranslator()->trans("Monitored Url", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "monitoredurl", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "monitoredurl", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 77
        echo "                        </tbody>
                    </table>
                </div>

                ";
        // line 81
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL")) {
            // line 82
            echo "                    <div class=\"inline-forms\">
                        <a class=\"btn btn-table-actions\" href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                            ";
            // line 84
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 85
            echo "                        </a>
                        ";
            // line 86
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "
                    </div>

                    <div>
                        <a href=\"";
            // line 90
            echo $this->env->getExtension('routing')->getPath("note");
            echo "\">
                            ";
            // line 91
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
            // line 92
            echo "                        </a>
                    </div>
                ";
        }
        // line 95
        echo "            </div>
        </div>

        ";
        // line 98
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 99
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "note");
        echo "


    </div>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 99,  269 => 98,  264 => 95,  259 => 92,  257 => 91,  253 => 90,  246 => 86,  243 => 85,  241 => 84,  237 => 83,  234 => 82,  232 => 81,  226 => 77,  218 => 74,  214 => 73,  211 => 72,  208 => 71,  200 => 68,  196 => 67,  193 => 66,  190 => 65,  182 => 62,  178 => 61,  175 => 60,  172 => 59,  164 => 56,  160 => 55,  157 => 54,  154 => 53,  146 => 50,  142 => 49,  139 => 48,  136 => 47,  128 => 44,  124 => 43,  121 => 42,  118 => 41,  110 => 38,  106 => 37,  103 => 36,  101 => 35,  96 => 33,  92 => 32,  89 => 31,  83 => 28,  79 => 27,  76 => 26,  74 => 25,  69 => 23,  65 => 22,  62 => 21,  56 => 18,  52 => 17,  49 => 16,  47 => 15,  37 => 8,  31 => 4,  28 => 3,);
    }
}
