<?php

/* IntranetBundle:Complaint:show.html.twig */
class __TwigTemplate_631757d8141e455879d4a80600a3acbe838350d518c5608343c1beca24101b77 extends Twig_Template
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

    ";
        // line 6
        $this->env->loadTemplate("IntranetBundle:Complaint:show.html.twig", "492305918")->display(array_merge($context, array("hide_delete" => (!$this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL")), "hide_edit" => (!$this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL")))));
        // line 156
        echo "
    ";
        // line 157
        $context["log"] = $this->env->loadTemplate("IntranetBundle:Macroses:logsMacro.html.twig");
        // line 158
        echo "    ";
        echo $context["log"]->gettemplate((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        echo "

    ";
        // line 160
        $context["addProposal"] = $this->env->loadTemplate("IntranetBundle:Macroses:proposalMacro.html.twig");
        // line 161
        echo "
    ";
        // line 162
        echo $context["addProposal"]->getmodal("Complaint", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()));
        echo "

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 162,  50 => 161,  48 => 160,  42 => 158,  40 => 157,  37 => 156,  35 => 6,  31 => 4,  28 => 3,);
    }
}


/* IntranetBundle:Complaint:show.html.twig */
class __TwigTemplate_631757d8141e455879d4a80600a3acbe838350d518c5608343c1beca24101b77_492305918 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Macroses:standardShow.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'tableBody' => array($this, 'block_tableBody'),
            'buttons' => array($this, 'block_buttons'),
            'extraRows' => array($this, 'block_extraRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Macroses:standardShow.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 8
        $context["entityName"] = "complaint";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
        // line 11
        echo "            Complaint
        ";
    }

    // line 14
    public function block_tableBody($context, array $blocks = array())
    {
        // line 15
        echo "
            <tbody>
            <tr>
                <th>";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
                <td>";
        // line 19
        echo twig_escape_filter($this->env, sprintf("RX%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</td>
            </tr>
            ";
        // line 21
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array())))) {
            // line 22
            echo "            <tr>
                <th>";
            // line 23
            echo $this->env->getExtension('translator')->getTranslator()->trans("Username", array(), "messages");
            echo "</th>
                <td><a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "html", null, true);
            echo "</a></td>
            </tr>
            ";
        }
        // line 27
        echo "
            ";
        // line 28
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())))) {
            // line 29
            echo "            <tr>
                <th>";
            // line 30
            echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
            echo "</th>
                <td><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
            echo "</a></td>
            </tr>
            ";
        }
        // line 34
        echo "            <tr>
                <th>";
        // line 35
        echo $this->env->getExtension('translator')->getTranslator()->trans("Subject", array(), "messages");
        echo "</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "subject", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 39
        echo $this->env->getExtension('translator')->getTranslator()->trans("Body", array(), "messages");
        echo "</th>
                <td>";
        // line 40
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "body", array()), "html", null, true));
        echo "</td>
            </tr>
             <tr>
                <th>";
        // line 43
        echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
        echo "</th>
                <td>";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->ComplaintStatusFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array())), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 47
        echo $this->env->getExtension('translator')->getTranslator()->trans("Resolution", array(), "messages");
        echo "</th>
                <td>";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->ComplaintResolutionFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "resolution", array())), "html", null, true);
        echo "  ";
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "resolutiondAt", array())))) {
            echo " at ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "resolutiondAt", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        }
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 51
        echo $this->env->getExtension('translator')->getTranslator()->trans("Channel", array(), "messages");
        echo "</th>
                <td>";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "channel", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 55
        echo $this->env->getExtension('translator')->getTranslator()->trans("Outlet received at", array(), "messages");
        echo "</th>
                <td>
                    ";
        // line 57
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "outletReceivedAt", array())) {
            // line 58
            echo "                        ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "outletReceivedAt", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "
                    ";
        }
        // line 60
        echo "                </td>
            </tr>
            ";
        // line 62
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "proposal", array())))) {
            // line 63
            echo "             <tr>
                <th>";
            // line 64
            echo $this->env->getExtension('translator')->getTranslator()->trans("Proposal", array(), "messages");
            echo "</th>
                <td>";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "proposal", array()), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        // line 68
        echo "
            <tr>
                <th>";
        // line 70
        echo $this->env->getExtension('translator')->getTranslator()->trans("Beon received at", array(), "messages");
        echo "</th>
                <td>
                    ";
        // line 72
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "beonReceivedAt", array())) {
            // line 73
            echo "                        ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "beonReceivedAt", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "
                    ";
        }
        // line 75
        echo "                </td>
            </tr>
            <tr>
                <th>";
        // line 78
        echo $this->env->getExtension('translator')->getTranslator()->trans("Notified at", array(), "messages");
        echo "</th>
                <td>
                    ";
        // line 80
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notifiedAt", array())) {
            // line 81
            echo "                        ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notifiedAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            echo "
                    ";
        }
        // line 83
        echo "                </td>
            </tr>
            <tr>
                <th>";
        // line 86
        echo $this->env->getExtension('translator')->getTranslator()->trans("Responded at", array(), "messages");
        echo "</th>
                <td>
                    ";
        // line 88
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "respondedAt", array())) {
            // line 89
            echo "                        ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "respondedAt", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "
                    ";
        }
        // line 91
        echo "                </td>
            </tr>
            </tbody>

        ";
    }

    // line 97
    public function block_buttons($context, array $blocks = array())
    {
        // line 98
        echo "            <div class=\"inline-forms\">
                ";
        // line 99
        if (($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_CUSTOMER") && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()) != twig_constant(((isset($context["ComplaintStatusEnum"]) ? $context["ComplaintStatusEnum"] : $this->getContext($context, "ComplaintStatusEnum")) . "CLOSED"))))) {
            // line 100
            echo "                    <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Complaint_no_answer", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("No answer", array(), "messages");
            echo "</a>
                    <a class=\"btn btn-table-actions\" id=\"proposalButton\"  data-reason=\"true\" href=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Complaint_proposal", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add proposal", array(), "messages");
            echo "</a>
               ";
        }
        // line 103
        echo "               ";
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL")) {
            // line 104
            echo "                  <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_notify", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Notify", array(), "messages");
            echo "</a>
               ";
        }
        // line 106
        echo "
                ";
        // line 107
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL")) {
            // line 108
            echo "                    <a class=\"btn btn-table-actions\"
                       href=\"";
            // line 109
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "task")), "html", null, true);
            echo "\">
                        ";
            // line 110
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create task", array(), "messages");
            // line 111
            echo "                    </a>
                ";
        }
        // line 113
        echo "
                ";
        // line 114
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_NEW")) {
            // line 115
            echo "                    <a class=\"btn btn-table-actions\"
                       href=\"";
            // line 116
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "note")), "html", null, true);
            echo "\">
                        ";
            // line 117
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create note", array(), "messages");
            // line 118
            echo "                    </a>
                ";
        }
        // line 120
        echo "            </div>
        ";
    }

    // line 123
    public function block_extraRows($context, array $blocks = array())
    {
        // line 124
        echo "            ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tasks", array())) > 0)) {
            // line 125
            echo "                ";
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tasks", array());
            // line 126
            echo "                <div class=\"row-fluid\">

                    <div class=\"block\">
                        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 129
            echo $this->env->getExtension('translator')->getTranslator()->trans("Tasks", array(), "messages");
            echo "</div>
                        <div id=\"widget1container\" class=\"block-body collapse in\">
                            <div id=\"tablewidget\" class=\"block-body collapse in\">
                                ";
            // line 132
            $this->env->loadTemplate("IntranetBundle:Task:indexTable.html.twig")->display($context);
            // line 133
            echo "                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 138
        echo "
            ";
        // line 139
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array())) > 0)) {
            // line 140
            echo "                ";
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array());
            // line 141
            echo "
                <div class=\"row-fluid\">
                    <div class=\"block\">
                        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 144
            echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
            echo "</div>
                        <div id=\"widget1container\" class=\"block-body collapse in\">
                            <div id=\"tablewidget\" class=\"block-body collapse in\">
                                ";
            // line 147
            $this->env->loadTemplate("IntranetBundle:Note:indexTable.html.twig")->display($context);
            // line 148
            echo "                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 153
        echo "        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  450 => 153,  443 => 148,  441 => 147,  435 => 144,  430 => 141,  427 => 140,  425 => 139,  422 => 138,  415 => 133,  413 => 132,  407 => 129,  402 => 126,  399 => 125,  396 => 124,  393 => 123,  388 => 120,  384 => 118,  382 => 117,  378 => 116,  375 => 115,  373 => 114,  370 => 113,  366 => 111,  364 => 110,  360 => 109,  357 => 108,  355 => 107,  352 => 106,  344 => 104,  341 => 103,  334 => 101,  327 => 100,  325 => 99,  322 => 98,  319 => 97,  311 => 91,  305 => 89,  303 => 88,  298 => 86,  293 => 83,  287 => 81,  285 => 80,  280 => 78,  275 => 75,  269 => 73,  267 => 72,  262 => 70,  258 => 68,  252 => 65,  248 => 64,  245 => 63,  243 => 62,  239 => 60,  233 => 58,  231 => 57,  226 => 55,  220 => 52,  216 => 51,  205 => 48,  201 => 47,  195 => 44,  191 => 43,  185 => 40,  181 => 39,  175 => 36,  171 => 35,  168 => 34,  160 => 31,  156 => 30,  153 => 29,  151 => 28,  148 => 27,  140 => 24,  136 => 23,  133 => 22,  131 => 21,  126 => 19,  122 => 18,  117 => 15,  114 => 14,  109 => 11,  106 => 10,  101 => 8,  53 => 162,  50 => 161,  48 => 160,  42 => 158,  40 => 157,  37 => 156,  35 => 6,  31 => 4,  28 => 3,);
    }
}
