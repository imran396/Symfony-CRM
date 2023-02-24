<?php

/* IntranetBundle:Pressrelease:show.html.twig */
class __TwigTemplate_bc7c4d8fd4c0803ead34fb1cb73fad559e316f88b935ed182f5b699e4c77311f extends Twig_Template
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
        echo "    <div class=\"row-fluid\">
        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Press release", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                        <tr>
                            <th>";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
                            <td>";
        // line 13
        echo twig_escape_filter($this->env, sprintf("PM%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</td>
                        </tr>
                        ";
        // line 15
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "duplicateOf", array())) {
            // line 16
            echo "                        <tr>
                            <th>";
            // line 17
            echo $this->env->getExtension('translator')->getTranslator()->trans("Duplicate of", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "duplicateOf", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, sprintf("PM%05d", $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "duplicateOf", array()), "id", array())), "html", null, true);
            echo "</a></td>
                        </tr>
                        ";
        }
        // line 21
        echo "
                        <tr>
                            <th>";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
        echo "</th>
                            <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type", array()), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
        echo "</th>
                            <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 33
        echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
        echo "</th>
                            <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressreleasenotes", array()), "html", null, true);
        echo "</td>
                        </tr>

                        ";
        // line 37
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array())) {
            // line 38
            echo "                            <tr>
                                <th>";
            // line 39
            echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
            echo "</th>
                                <td><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "html", null, true);
            echo "</a></td>
                            </tr>
                        ";
        }
        // line 43
        echo "
                        ";
        // line 44
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())) {
            // line 45
            echo "                            <tr>
                                <th>";
            // line 46
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
            echo "</th>
                                <td>
                                    <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
            echo "</a>
                                </td>
                            </tr>
                        ";
        }
        // line 52
        echo "\t\t\t";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array())) {
            // line 53
            echo "                            <tr>
                                <th>";
            // line 54
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
            echo "</th>
                                <td>
                                    <a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "html", null, true);
            echo "</a>
                                </td>
                            </tr>
                        ";
        }
        // line 60
        echo "
                        <tr>
                            <th>";
        // line 62
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
                            <td>";
        // line 63
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 67
        echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
        echo "</th>
                            <td>
                                ";
        // line 69
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "deleted", array()) == true)) {
            // line 70
            echo "                                    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Aborted", array(), "messages");
            // line 71
            echo "                                ";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submitted", array()) == true)) {
            // line 72
            echo "                                    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Submitted at", array(), "messages");
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submittedAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            echo "
                                ";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()) == true)) {
            // line 74
            echo "                                    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Approved at", array(), "messages");
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvedAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            echo "
                                ";
        } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array()) == true)) {
            // line 76
            echo "                                    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Approval mail sent at", array(), "messages");
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalMailSentAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            echo "
                                ";
        } else {
            // line 78
            echo "                                    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Draft", array(), "messages");
            // line 79
            echo "                                ";
        }
        // line 80
        echo "                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class=\"inline-forms mb10\">
                    ";
        // line 88
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
            // line 89
            echo "                        ";
            if ((((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())) && (!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submitted", array()))) && (!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())))) {
                // line 90
                echo "                            <a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_send_approval_email", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Send approval email", array(), "messages");
                echo "</a>
                        ";
            }
            // line 92
            echo "                    ";
        }
        // line 93
        echo "
                    ";
        // line 94
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_SUBMIT")) {
            // line 95
            echo "                        ";
            if (((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()) == 1) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submitted", array()) == 0)) && ((isset($context["numberOfContacts"]) ? $context["numberOfContacts"] : $this->getContext($context, "numberOfContacts")) > 0))) {
                // line 96
                echo "                            <a onclick=\"return confirm('Wollen Sie diese Pressemitteilung an ";
                echo twig_escape_filter($this->env, (isset($context["numberOfContacts"]) ? $context["numberOfContacts"] : $this->getContext($context, "numberOfContacts")), "html", null, true);
                echo " Kontakte versenden? ')\" class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_submit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Submit press release", array(), "messages");
                echo "</a>
                        ";
            }
            // line 98
            echo "                    ";
        }
        // line 99
        echo "
                    ";
        // line 100
        if ((($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_APPROVE") && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())) && (!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())))) {
            // line 101
            echo "                        ";
            if ((isset($context["approveForm"]) ? $context["approveForm"] : $this->getContext($context, "approveForm"))) {
                // line 102
                echo "                            ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["approveForm"]) ? $context["approveForm"] : $this->getContext($context, "approveForm")), 'form');
                echo "
                            <a class=\"btn\" id=\"denyButton\" data-reason=\"true\" href=\"";
                // line 103
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_deny", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Deny", array(), "messages");
                echo "</a>
                        ";
            }
            // line 105
            echo "                    ";
        }
        // line 106
        echo "                </div>

                ";
        // line 108
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
            // line 109
            echo "                    <div class=\"inline-forms\">
                        <a class=\"btn btn-table-actions\" href=\"";
            // line 110
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                            ";
            // line 111
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 112
            echo "                        </a>
                        ";
            // line 113
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "deleted", array()) == false)) {
                // line 114
                echo "                            ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
                echo "
                        ";
            }
            // line 116
            echo "                        ";
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "customer", array(), "any", false, true), "level", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "level", array()) == 1))) {
                // line 117
                echo "                            <div class=\"btn-group\">
                                <button type=\"button\" class=\"dropdown-toggle btn btn-table-actions\" data-toggle=\"dropdown\">
                                    Duplicate Down <span class=\"caret\"></span>
                                </button>
                                <ul class=\"dropdown-menu\" role=\"menu\">
                                    <li><a
                                           href=\"";
                // line 123
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("affilation_type_pressrelease_duplicate", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "type" => "all")), "html", null, true);
                echo "\">
                                            ";
                // line 124
                echo $this->env->getExtension('translator')->getTranslator()->trans("All Children", array(), "messages");
                // line 125
                echo "                                        </a></li>
                                    <li><a
                                           href=\"";
                // line 127
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("affilation_type_pressrelease_duplicate", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "type" => "current")), "html", null, true);
                echo "\">
                                            ";
                // line 128
                echo $this->env->getExtension('translator')->getTranslator()->trans("Running Contract", array(), "messages");
                // line 129
                echo "                                        </a>
                                    </li>
                                </ul>
                            </div>
                        ";
            }
            // line 134
            echo "                    </div>
                ";
        }
        // line 136
        echo "                <div class=\"inline-forms mb10\">
                    ";
        // line 137
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL")) {
            // line 138
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "note")), "html", null, true);
            echo "\" class=\"btn\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create note", array(), "messages");
            echo "</a>
                    ";
        }
        // line 140
        echo "                    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL")) {
            // line 141
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "task")), "html", null, true);
            echo "\" class=\"btn\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create task", array(), "messages");
            echo "</a>
                    ";
        }
        // line 143
        echo "                </div>

                <div class=\"mb10\">
                    <a href=\"";
        // line 146
        echo $this->env->getExtension('routing')->getPath("pressrelease");
        echo "\">
                        ";
        // line 147
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 148
        echo "                    </a>
                </div>
            </div>
        </div>

        ";
        // line 153
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 154
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease");
        echo "
           ";
        // line 155
        $context["contactLog"] = $this->env->loadTemplate("IntranetBundle:Macroses:contactsMacro.html.twig");
        // line 156
        echo "        ";
        echo $context["contactLog"]->getcontactsList((isset($context["contacts"]) ? $context["contacts"] : $this->getContext($context, "contacts")), "", (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submitted", array())) ? ("Sent Contacts") : ("Contacts")));
        echo "
   ";
        // line 157
        $context["log"] = $this->env->loadTemplate("IntranetBundle:Macroses:logsMacro.html.twig");
        // line 158
        echo "      ";
        echo $context["log"]->gettemplate((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        echo "

    </div>

    ";
        // line 162
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES")) {
            // line 163
            echo "        ";
            $this->env->loadTemplate("IntranetBundle:Note:listChunk.html.twig")->display($context);
            // line 164
            echo "    ";
        }
        // line 165
        echo "    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS")) {
            // line 166
            echo "        ";
            $this->env->loadTemplate("IntranetBundle:Task:listChunk.html.twig")->display($context);
            // line 167
            echo "    ";
        }
        // line 168
        echo "
    ";
        // line 169
        $context["deny"] = $this->env->loadTemplate("IntranetBundle:Macroses:denyButtonMacro.html.twig");
        // line 170
        echo "    ";
        echo $context["deny"]->getmodal("pressrelease", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()));
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  445 => 170,  443 => 169,  440 => 168,  437 => 167,  434 => 166,  431 => 165,  428 => 164,  425 => 163,  423 => 162,  415 => 158,  413 => 157,  408 => 156,  406 => 155,  401 => 154,  399 => 153,  392 => 148,  390 => 147,  386 => 146,  381 => 143,  373 => 141,  370 => 140,  362 => 138,  360 => 137,  357 => 136,  353 => 134,  346 => 129,  344 => 128,  340 => 127,  336 => 125,  334 => 124,  330 => 123,  322 => 117,  319 => 116,  313 => 114,  311 => 113,  308 => 112,  306 => 111,  302 => 110,  299 => 109,  297 => 108,  293 => 106,  290 => 105,  283 => 103,  278 => 102,  275 => 101,  273 => 100,  270 => 99,  267 => 98,  257 => 96,  254 => 95,  252 => 94,  249 => 93,  246 => 92,  238 => 90,  235 => 89,  233 => 88,  223 => 80,  220 => 79,  217 => 78,  209 => 76,  201 => 74,  193 => 72,  190 => 71,  187 => 70,  185 => 69,  180 => 67,  173 => 63,  169 => 62,  165 => 60,  156 => 56,  151 => 54,  148 => 53,  145 => 52,  136 => 48,  131 => 46,  128 => 45,  126 => 44,  123 => 43,  115 => 40,  111 => 39,  108 => 38,  106 => 37,  100 => 34,  96 => 33,  89 => 29,  85 => 28,  78 => 24,  74 => 23,  70 => 21,  62 => 18,  58 => 17,  55 => 16,  53 => 15,  48 => 13,  44 => 12,  35 => 6,  31 => 4,  28 => 3,);
    }
}
