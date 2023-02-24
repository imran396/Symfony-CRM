<?php

/* IntranetBundle:Campaign:show.html.twig */
class __TwigTemplate_a0a5d793eeb23fea69c83c03bfb7987d92ab746a22b2376660d39928ff0388ff extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">
                Campaign: ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">


                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
        // line 15
        $this->env->loadTemplate("IntranetBundle:Campaign:showTable.html.twig")->display(array_merge($context, array("secure" => true)));
        // line 16
        echo "                </div>

                <div class=\"inline-forms mb10\">
                    ";
        // line 19
        if ($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL")) {
            // line 20
            echo "                        ";
            if ((((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())) && (!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()))) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "denied", array()) && (!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array()))))) {
                // line 21
                echo "                            <a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_send_approval_email", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("send approval email", array(), "messages");
                echo "</a>
                        ";
            }
            // line 23
            echo "                    ";
        }
        // line 24
        echo "
                    ";
        // line 25
        if ((((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())) && $this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_APPROVE")) && ($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL") || $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())))) {
            // line 28
            echo "                        ";
            if ((isset($context["approveForm"]) ? $context["approveForm"] : $this->getContext($context, "approveForm"))) {
                // line 29
                echo "                            ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["approveForm"]) ? $context["approveForm"] : $this->getContext($context, "approveForm")), 'form');
                echo "
                            <a class=\"btn\" id=\"denyButton\" data-reason=\"true\" href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_deny", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Deny", array(), "messages");
                echo "</a>
                        ";
            }
            // line 32
            echo "                    ";
        }
        // line 33
        echo "                    ";
        if ((($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL") && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()) == true)) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "confirmedAt", array()) == null))) {
            // line 34
            echo "                        <a onclick=\"return confirm('Are you sure?')\" class=\" btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_confirmation", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Confirm to supplier", array(), "messages");
            echo "</a>
                    ";
        }
        // line 36
        echo "                </div>

                ";
        // line 38
        if ($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL")) {
            // line 39
            echo "                    <div class=\"inline-forms\">
                        <a class=\"btn btn-table-actions\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                           ";
            // line 41
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 42
            echo "                        </a>
                        ";
            // line 43
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "
                        ";
            // line 44
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["duplicate_form"]) ? $context["duplicate_form"] : $this->getContext($context, "duplicate_form")), 'form');
            echo "

                        ";
            // line 46
            if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "customer", array(), "any", false, true), "level", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "level", array()) == 1))) {
                // line 47
                echo "                        <div class=\"btn-group\">
                                <button type=\"button\" class=\"dropdown-toggle btn btn-table-actions\" data-toggle=\"dropdown\">
                                    Duplicate Down <span class=\"caret\"></span>
                                </button>
                                <ul class=\"dropdown-menu\" role=\"menu\">
                                    <li><a
                                           href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("affilation_type_campaign_duplicate", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "type" => "all")), "html", null, true);
                echo "\">
                                            ";
                // line 54
                echo $this->env->getExtension('translator')->getTranslator()->trans("All Children", array(), "messages");
                // line 55
                echo "                                        </a></li>
                                    <li><a
                                           href=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("affilation_type_campaign_duplicate", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "type" => "current")), "html", null, true);
                echo "\">
                                            ";
                // line 58
                echo $this->env->getExtension('translator')->getTranslator()->trans("Running Contract", array(), "messages");
                // line 59
                echo "                                        </a>
                                    </li>
                                </ul>
                            </div>
                        ";
            }
            // line 64
            echo "                    </div>
                ";
        }
        // line 66
        echo "
                <div class=\"inline-forms mb10\">
                    ";
        // line 68
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL")) {
            // line 69
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "note")), "html", null, true);
            echo "\" class=\"btn\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create note", array(), "messages");
            echo "</a>
                    ";
        }
        // line 71
        echo "                    
                    ";
        // line 72
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL")) {
            // line 73
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "task")), "html", null, true);
            echo "\" class=\"btn\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create task", array(), "messages");
            echo "</a>
                    ";
        }
        // line 75
        echo "                    
                    ";
        // line 76
        if ($this->env->getExtension('security')->isGranted("ROLE_TIMETRACKINGS")) {
            // line 77
            echo "\t\t\t            <a class=\"btn\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "timetracking")), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create time tracking entry", array(), "messages");
            echo "</a>
\t\t            ";
        }
        // line 79
        echo "                    
                    
                </div>

                <div class=\"mb10\">
                    <a  href=\"";
        // line 84
        echo $this->env->getExtension('routing')->getPath("campaign");
        echo "\">
                        ";
        // line 85
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 86
        echo "                    </a>
                </div>
            </div>
        </div>

        ";
        // line 91
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 92
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign");
        echo "
        ";
        // line 93
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()) < twig_constant(((isset($context["CampaignStatusEnum"]) ? $context["CampaignStatusEnum"] : $this->getContext($context, "CampaignStatusEnum")) . "INVOICE_RECEIVED"))))) {
            // line 94
            echo "            ";
            $context["sendExternalUploadEmail"] = $this->env->loadTemplate("IntranetBundle:Macroses:emailSenderMacro.html.twig");
            // line 95
            echo "            ";
            echo $context["sendExternalUploadEmail"]->getexternalEmailmodal((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign");
            echo "
        ";
        }
        // line 97
        echo "        ";
        $context["log"] = $this->env->loadTemplate("IntranetBundle:Macroses:logsMacro.html.twig");
        // line 98
        echo "        ";
        echo $context["log"]->gettemplate((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        echo "
    </div>

    ";
        // line 101
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array())) {
            // line 102
            echo "        <div class=\"row-fluid\">
            ";
            // line 103
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array())) {
                // line 104
                echo "                ";
                $context["supplier"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array());
                // line 105
                echo "                ";
                $context["campaign"] = (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity"));
                // line 106
                echo "                ";
                $this->env->loadTemplate("IntranetBundle:Supplier:showChunk.html.twig")->display($context);
                // line 107
                echo "            ";
            }
            // line 108
            echo "        </div>
    ";
        }
        // line 110
        echo "
    ";
        // line 111
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tasks", array()))) {
            // line 112
            echo "        <div class=\"row-fluid\">
            ";
            // line 113
            $context["taskList"] = $this->env->loadTemplate("IntranetBundle:Macroses:taskListMacro.html.twig");
            // line 114
            echo "            ";
            echo $context["taskList"]->gettemplate($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tasks", array()));
            echo "
        </div>
    ";
        }
        // line 117
        echo "    
    ";
        // line 118
        $this->env->loadTemplate("IntranetBundle:Note:listChunk.html.twig")->display($context);
        // line 119
        echo "
    ";
        // line 120
        $context["deny"] = $this->env->loadTemplate("IntranetBundle:Macroses:denyButtonMacro.html.twig");
        // line 121
        echo "    ";
        echo $context["deny"]->getmodal("campaign", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()));
        echo "

    
    ";
        // line 124
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressreleases", array()))) {
            // line 125
            echo "        <div class=\"row-fluid\">
          ";
            // line 126
            $this->env->loadTemplate("IntranetBundle:Pressrelease:listChunk.html.twig")->display($context);
            // line 127
            echo "        </div>
    ";
        }
        // line 129
        echo "    
    ";
        // line 130
        $this->env->loadTemplate("IntranetBundle:Timetracking:listChunk.html.twig")->display($context);
        // line 131
        echo "    
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  328 => 131,  326 => 130,  323 => 129,  319 => 127,  317 => 126,  314 => 125,  312 => 124,  305 => 121,  303 => 120,  300 => 119,  298 => 118,  295 => 117,  288 => 114,  286 => 113,  283 => 112,  281 => 111,  278 => 110,  274 => 108,  271 => 107,  268 => 106,  265 => 105,  262 => 104,  260 => 103,  257 => 102,  255 => 101,  248 => 98,  245 => 97,  239 => 95,  236 => 94,  234 => 93,  229 => 92,  227 => 91,  220 => 86,  218 => 85,  214 => 84,  207 => 79,  199 => 77,  197 => 76,  194 => 75,  186 => 73,  184 => 72,  181 => 71,  173 => 69,  171 => 68,  167 => 66,  163 => 64,  156 => 59,  154 => 58,  150 => 57,  146 => 55,  144 => 54,  140 => 53,  132 => 47,  130 => 46,  125 => 44,  121 => 43,  118 => 42,  116 => 41,  112 => 40,  109 => 39,  107 => 38,  103 => 36,  95 => 34,  92 => 33,  89 => 32,  82 => 30,  77 => 29,  74 => 28,  72 => 25,  69 => 24,  66 => 23,  58 => 21,  55 => 20,  53 => 19,  48 => 16,  46 => 15,  38 => 10,  31 => 5,  28 => 4,);
    }
}
