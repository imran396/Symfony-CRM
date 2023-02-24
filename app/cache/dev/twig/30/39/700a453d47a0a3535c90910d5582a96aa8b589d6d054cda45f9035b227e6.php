<?php

/* IntranetBundle:Task:show.html.twig */
class __TwigTemplate_3039700a453d47a0a3535c90910d5582a96aa8b589d6d054cda45f9035b227e6 extends Twig_Template
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
\t<div class=\"row-fluid\">

\t    <div class=\"block span6\">
\t\t<div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
        echo "</div>
\t\t<div id=\"widget1container\" class=\"block-body collapse in\">
\t\t    <div id=\"tablewidget\" class=\"block-body collapse in\">
\t\t\t<table class=\"table table-bordered\">
\t\t\t    <tbody>
\t\t\t    <tr>
\t\t\t\t<th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
\t\t\t\t<td>";
        // line 15
        echo twig_escape_filter($this->env, sprintf("AG%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</td>
\t\t\t    </tr>

\t\t\t    <tr>
\t\t\t\t<th>";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
        echo "</th>
\t\t\t\t<td>";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->taskTypeFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type", array()))), "html", null, true);
        echo "</td>
\t\t\t    </tr>

\t\t\t    <tr>
\t\t\t\t    <th>";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->stripParathesesFilter($this->env->getExtension('translator')->trans("Title")), "html", null, true);
        echo "</th>
\t\t\t\t    <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "</td>
\t\t\t    </tr>

\t\t\t    ";
        // line 28
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdBy", array())) {
            // line 29
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 30
            echo $this->env->getExtension('translator')->getTranslator()->trans("Created by", array(), "messages");
            echo "</th>
\t\t\t\t    <td><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdBy", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdBy", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 35
        echo "
\t\t\t    ";
        // line 36
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array())) {
            // line 37
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 38
            echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
            echo "</th>
\t\t\t\t    <td><a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 43
        echo "
\t\t\t    ";
        // line 44
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "carbonCopy", array())) {
            // line 45
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 46
            echo $this->env->getExtension('translator')->getTranslator()->trans("Carbon copy", array(), "messages");
            echo "</th>
\t\t\t\t    <td><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "carbonCopy", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "carbonCopy", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 51
        echo "
\t\t\t    ";
        // line 52
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())) {
            // line 53
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 54
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
            echo "</th>
\t\t\t\t    <td>
\t\t\t\t\t<a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 60
        echo "
\t\t\t    ";
        // line 61
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array())) {
            // line 62
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 63
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
            echo "</th>
\t\t\t\t    <td>
\t\t\t\t\t<a href=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 69
        echo "
\t\t\t    ";
        // line 70
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaint", array())) {
            // line 71
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 72
            echo $this->env->getExtension('translator')->getTranslator()->trans("Complaint", array(), "messages");
            echo "</th>
\t\t\t\t    <td>
\t\t\t\t\t<a href=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaint", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaint", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 78
        echo "
\t\t\t    ";
        // line 79
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", array())) {
            // line 80
            echo "\t\t\t\t<tr>
\t\t\t\t    <th>";
            // line 81
            echo $this->env->getExtension('translator')->getTranslator()->trans("Press release", array(), "messages");
            echo "</th>
\t\t\t\t    <td>
\t\t\t\t\t<a href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "pressrelease", array()), "html", null, true);
            echo "</a>
\t\t\t\t    </td>
\t\t\t\t</tr>
\t\t\t    ";
        }
        // line 87
        echo "
\t\t\t    <tr>
\t\t\t\t    <th>";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->stripParathesesFilter($this->env->getExtension('translator')->trans("Description")), "html", null, true);
        echo "</th>
\t\t\t\t    <td>";
        // line 90
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "description", array()), "html", null, true));
        echo "</td>
\t\t\t    </tr>
\t\t\t    <tr>
\t\t\t\t    <th>";
        // line 93
        echo $this->env->getExtension('translator')->getTranslator()->trans("Due date", array(), "messages");
        echo "</th>
\t\t\t\t    <td>";
        // line 94
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dueDate", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
\t\t\t    </tr>
\t\t\t    <tr>
\t\t\t    \t<th>";
        // line 97
        echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
        echo "</th>
\t\t\t\t    <td>
\t\t\t\t        ";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->taskStatusFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()))), "html", null, true);
        echo "
\t\t\t\t        ";
        // line 100
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()) === constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "NOT_STARTED"))) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()) === constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "IN_PROGRESS"))))) {
            // line 101
            echo "\t\t\t\t\t    ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())) {
                // line 102
                echo "\t\t\t\t\t        / ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Approved", array(), "messages");
                // line 103
                echo "\t\t\t\t\t    ";
            } elseif ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalMailSent", array())) {
                // line 104
                echo "\t\t\t\t\t        / ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Waiting for external approval", array(), "messages");
                // line 105
                echo "\t\t\t\t\t    ";
            } elseif ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "internalapprovalMailSent", array())) {
                // line 106
                echo "\t\t\t\t\t        / ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Waiting for internal approval", array(), "messages");
                // line 107
                echo "\t\t\t\t\t    ";
            }
            // line 108
            echo "\t\t\t\t        ";
        }
        // line 109
        echo "
\t\t\t\t</td>
\t\t\t    </tr>

\t\t\t    ";
        // line 113
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type", array()) === constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")))) {
            // line 114
            echo "\t\t\t\t    <tr>
\t\t\t\t        <th>";
            // line 115
            echo $this->env->getExtension('translator')->getTranslator()->trans("Expedited?", array(), "messages");
            echo "</th>
\t\t\t\t        <td>";
            // line 116
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "expedited", array()))), "html", null, true);
            echo "</td>
\t\t\t\t    </tr>
\t\t\t\t    <tr>
\t\t\t\t        <th>";
            // line 119
            echo $this->env->getExtension('translator')->getTranslator()->trans("New design?", array(), "messages");
            echo "</th>
\t\t\t\t        <td>";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "newDesign", array()))), "html", null, true);
            echo "</td>
\t\t\t\t    </tr>
\t\t\t\t    <tr>
\t\t\t\t        <th>";
            // line 123
            echo $this->env->getExtension('translator')->getTranslator()->trans("Graphics type", array(), "messages");
            echo "</th>
\t\t\t\t        <td>";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "graphicsType", array()), "html", null, true);
            echo "</td>
\t\t\t\t    </tr>
\t\t\t\t    <tr>
\t\t\t\t        <th>";
            // line 127
            echo $this->env->getExtension('translator')->getTranslator()->trans("Graphics format", array(), "messages");
            echo "</th>
\t\t\t\t        <td>";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "graphicsFormat", array()), "html", null, true);
            echo "</td>
\t\t\t\t    </tr>

                    ";
            // line 131
            if ((((!($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "graphicsType", array()) === constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "AD")))) && (!($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "graphicsType", array()) === constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "WEB"))))) && (!($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "graphicsType", array()) === constant(((isset($context["TaskGraphicsTypeEnum"]) ? $context["TaskGraphicsTypeEnum"] : $this->getContext($context, "TaskGraphicsTypeEnum")) . "FACEBOOK")))))) {
                // line 132
                echo "                \t\t<tr>
\t\t\t\t            <th>";
                // line 133
                echo $this->env->getExtension('translator')->getTranslator()->trans("Paper type", array(), "messages");
                echo "</th>
\t\t\t\t            <td>";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paperType", array()), "html", null, true);
                echo "</td>
\t\t\t\t        </tr>

\t\t\t            ";
                // line 137
                if ((!($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paperType", array()) === constant(((isset($context["TaskPaperTypeEnum"]) ? $context["TaskPaperTypeEnum"] : $this->getContext($context, "TaskPaperTypeEnum")) . "NONE"))))) {
                    // line 138
                    echo "\t\t
\t\t\t\t            <tr>
\t\t\t\t                <th>";
                    // line 140
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Graphics circulation", array(), "messages");
                    echo "</th>
\t\t\t\t                <td>";
                    // line 141
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "graphicsCirculation", array()), "html", null, true);
                    echo "</td>
\t\t\t\t            </tr>
\t\t\t\t            <tr>
\t\t\t\t                <th>";
                    // line 144
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Payment method", array(), "messages");
                    echo "</th>
\t\t\t\t                <td>";
                    // line 145
                    echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskPaymentTypeFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paymentMethod", array())), "html", null, true);
                    echo "</td>
\t\t\t\t            </tr>
\t\t\t\t            <tr>
\t\t\t\t                <th>";
                    // line 148
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Invoice address", array(), "messages");
                    echo "</th>
\t\t\t\t                <td>";
                    // line 149
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "invoiceAddress", array()), "html", null, true));
                    echo "</td>
\t\t\t\t            </tr>
\t\t\t\t            <tr>
\t\t\t\t                <th>";
                    // line 152
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Delivery address", array(), "messages");
                    echo "</th>
\t\t\t\t                <td>";
                    // line 153
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "deliveryAddress", array()), "html", null, true));
                    echo "</td>
\t\t\t\t            </tr>
                            ";
                    // line 155
                    if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "printSpeed", array())) {
                        // line 156
                        echo "\t\t\t\t            <tr>
\t\t\t\t                <th>";
                        // line 157
                        echo $this->env->getExtension('translator')->getTranslator()->trans("Print speed", array(), "messages");
                        echo "</th>
\t\t\t\t                <td>";
                        // line 158
                        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->printSpeedTypeFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "printSpeed", array())), "html", null, true);
                        echo "</td>
\t\t\t\t            </tr>
                            ";
                    }
                    // line 161
                    echo "\t\t\t\t            <tr>
\t\t\t\t                <th>";
                    // line 162
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Order reference", array(), "messages");
                    echo "</th>
\t\t\t\t                <td>";
                    // line 163
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "orderReference", array()), "html", null, true);
                    echo "</td>
\t\t\t\t            </tr>
\t\t\t            ";
                }
                // line 166
                echo "\t\t\t        ";
            }
            // line 167
            echo "\t\t\t    ";
        }
        // line 168
        echo "\t\t\t    </tbody>
\t\t\t</table>

\t\t    </div>

            ";
        // line 173
        if ((!(isset($context["readOnly"]) ? $context["readOnly"] : $this->getContext($context, "readOnly")))) {
            // line 174
            echo "\t\t        ";
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type", array()) === constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")))) {
                // line 175
                echo "\t\t\t    <div class=\"inline-forms mb10\">
\t\t\t        ";
                // line 176
                if (($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL") || $this->env->getExtension('security')->isGranted("ROLE_TASKS_OWNGROUP"))) {
                    // line 177
                    echo "\t\t\t\t    ";
                    if (((((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())) && ((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "internalapprovalmailsent", array())) || $this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL"))) && (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()) === constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "NOT_STARTED"))) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array()) === constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "IN_PROGRESS"))))) && (!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())))) {
                        // line 178
                        echo "\t\t\t\t        <a class=\"btn\" href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_send_approval_email", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("send approval email", array(), "messages");
                        echo "</a>
\t\t\t\t    ";
                    }
                    // line 180
                    echo "\t\t\t        ";
                }
                // line 181
                echo "
\t\t\t        ";
                // line 182
                if ((((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())) && $this->env->getExtension('security')->isGranted("ROLE_TASKS_APPROVE")) && ($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL") || $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())))) {
                    // line 185
                    echo "\t\t\t\t    ";
                    // line 186
                    echo "\t\t\t\t    <a class=\"btn\" id=\"approveButton\" data-ready=\"";
                    echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "internalapprovalmailsent", array()) || $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())), "html", null, true);
                    echo "\" data-reason=\"true\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_approve", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Approve", array(), "messages");
                    echo "</a>
\t\t\t\t    <a class=\"btn\" id=\"denyButton\" data-ready=\"";
                    // line 187
                    echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "internalapprovalmailsent", array()) || $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array())), "html", null, true);
                    echo "\" data-reason=\"true\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_deny", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Correction necessary", array(), "messages");
                    echo "</a>
\t\t\t        ";
                }
                // line 189
                echo "\t\t\t    </div>
\t\t        ";
            }
            // line 191
            echo "
\t\t        ";
            // line 192
            if (($this->env->getExtension('security')->isGranted("ROLE_TASKS_EDIT") || $this->env->getExtension('security')->isGranted("ROLE_TASKS_NEW"))) {
                // line 193
                echo "\t\t\t    <div class=\"inline-forms\">
\t\t\t        ";
                // line 194
                if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_EDIT")) {
                    // line 195
                    echo "\t\t\t\t        <a class=\"btn btn-table-actions\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                    echo "\">
\t\t\t\t            ";
                    // line 196
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
                    // line 197
                    echo "\t\t\t\t        </a>
\t\t\t        ";
                }
                // line 199
                echo "\t\t\t        ";
                if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL")) {
                    // line 200
                    echo "\t\t\t\t        ";
                    echo                     $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
                    echo "
\t\t\t        ";
                }
                // line 202
                echo "\t\t\t        ";
                if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_NEW")) {
                    // line 203
                    echo "\t\t\t\t        ";
                    echo                     $this->env->getExtension('form')->renderer->renderBlock((isset($context["duplicate_form"]) ? $context["duplicate_form"] : $this->getContext($context, "duplicate_form")), 'form');
                    echo "
\t\t\t        ";
                }
                // line 205
                echo "\t\t\t        ";
                if ((($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL") && $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "customer", array(), "any", false, true), "level", array(), "any", true, true)) && ($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "level", array()) == 1))) {
                    // line 206
                    echo "                        <div class=\"btn-group\">
                            <button type=\"button\" class=\"dropdown-toggle btn btn-table-actions\" data-toggle=\"dropdown\">
                                Duplicate Down <span class=\"caret\"></span>
                            </button>
                            <ul class=\"dropdown-menu\" role=\"menu\">
                                <li><a
                                       href=\"";
                    // line 212
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("affilation_type_task_duplicate", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "type" => "all")), "html", null, true);
                    echo "\">
                                        ";
                    // line 213
                    echo $this->env->getExtension('translator')->getTranslator()->trans("All Children", array(), "messages");
                    // line 214
                    echo "                                    </a></li>
                                <li><a
                                       href=\"";
                    // line 216
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("affilation_type_task_duplicate", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "type" => "current")), "html", null, true);
                    echo "\">
                                        ";
                    // line 217
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Running Contract", array(), "messages");
                    // line 218
                    echo "                                    </a>
                                </li>
                            </ul>
                        </div>
\t\t\t        ";
                }
                // line 223
                echo "\t\t\t    </div>
\t\t        ";
            }
            // line 225
            echo "

\t\t        <div class=\"inline-forms mb10\">
\t\t\t        ";
            // line 228
            if ((((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())) && (!$this->env->getExtension('security')->isGranted("ROLE_TASKS_CUSTOMER"))) && ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()) != $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "user", array()), "id", array())))) {
                // line 229
                echo "\t\t\t            <a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_notify", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Notify", array(), "messages");
                echo "</a>
\t\t\t        ";
            }
            // line 231
            echo "\t\t\t        ";
            if (((!$this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array())) || (!$this->env->getExtension('security')->isGranted("ROLE_TASKS_CUSTOMER")))) {
                // line 232
                echo "            \t\t\t<a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "note")), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Create note", array(), "messages");
                echo "</a>
\t\t\t        ";
            }
            // line 234
            echo "                    ";
            if ($this->env->getExtension('security')->isGranted("ROLE_TIMETRACKINGS")) {
                // line 235
                echo "                        <a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "timetracking")), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Create time tracking entry", array(), "messages");
                echo "</a>
                    ";
            }
            // line 237
            echo "\t\t        </div>
            ";
        }
        // line 239
        echo "\t\t\t\t  

\t\t    <ul class=\"record_actions unstyled\">
\t\t\t<li>
\t\t\t    <a href=\"";
        // line 243
        echo $this->env->getExtension('routing')->getPath("task");
        echo "\">
\t\t\t\t";
        // line 244
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 245
        echo "\t\t\t    </a>
\t\t\t</li>
\t\t    </ul>
\t\t</div>
\t    </div>

\t    ";
        // line 251
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 252
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "task", null, (isset($context["upload_file_form"]) ? $context["upload_file_form"] : $this->getContext($context, "upload_file_form")));
        echo "
        ";
        // line 253
        $context["log"] = $this->env->loadTemplate("IntranetBundle:Macroses:logsMacro.html.twig");
        // line 254
        echo "        ";
        echo $context["log"]->gettemplate((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        echo "

\t</div>
\t";
        // line 257
        $this->env->loadTemplate("IntranetBundle:Note:listChunk.html.twig")->display($context);
        // line 258
        echo "\t";
        $this->env->loadTemplate("IntranetBundle:Task:duplicates.html.twig")->display($context);
        // line 259
        echo "\t";
        $context["deny"] = $this->env->loadTemplate("IntranetBundle:Macroses:denyButtonMacro.html.twig");
        // line 260
        echo "\t";
        $context["approve"] = $this->env->loadTemplate("IntranetBundle:Macroses:approveButtonMacro.html.twig");
        // line 261
        echo "\t";
        echo $context["approve"]->getmodal("task", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()));
        echo "
\t";
        // line 262
        echo $context["deny"]->getmodal("task", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()));
        echo "
\t";
        // line 263
        $this->env->loadTemplate("IntranetBundle:Timetracking:listChunk.html.twig")->display($context);
        // line 264
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  666 => 264,  664 => 263,  660 => 262,  655 => 261,  652 => 260,  649 => 259,  646 => 258,  644 => 257,  637 => 254,  635 => 253,  630 => 252,  628 => 251,  620 => 245,  618 => 244,  614 => 243,  608 => 239,  604 => 237,  596 => 235,  593 => 234,  585 => 232,  582 => 231,  574 => 229,  572 => 228,  567 => 225,  563 => 223,  556 => 218,  554 => 217,  550 => 216,  546 => 214,  544 => 213,  540 => 212,  532 => 206,  529 => 205,  523 => 203,  520 => 202,  514 => 200,  511 => 199,  507 => 197,  505 => 196,  500 => 195,  498 => 194,  495 => 193,  493 => 192,  490 => 191,  486 => 189,  477 => 187,  468 => 186,  466 => 185,  464 => 182,  461 => 181,  458 => 180,  450 => 178,  447 => 177,  445 => 176,  442 => 175,  439 => 174,  437 => 173,  430 => 168,  427 => 167,  424 => 166,  418 => 163,  414 => 162,  411 => 161,  405 => 158,  401 => 157,  398 => 156,  396 => 155,  391 => 153,  387 => 152,  381 => 149,  377 => 148,  371 => 145,  367 => 144,  361 => 141,  357 => 140,  353 => 138,  351 => 137,  345 => 134,  341 => 133,  338 => 132,  336 => 131,  330 => 128,  326 => 127,  320 => 124,  316 => 123,  310 => 120,  306 => 119,  300 => 116,  296 => 115,  293 => 114,  291 => 113,  285 => 109,  282 => 108,  279 => 107,  276 => 106,  273 => 105,  270 => 104,  267 => 103,  264 => 102,  261 => 101,  259 => 100,  255 => 99,  250 => 97,  244 => 94,  240 => 93,  234 => 90,  230 => 89,  226 => 87,  217 => 83,  212 => 81,  209 => 80,  207 => 79,  204 => 78,  195 => 74,  190 => 72,  187 => 71,  185 => 70,  182 => 69,  173 => 65,  168 => 63,  165 => 62,  163 => 61,  160 => 60,  151 => 56,  146 => 54,  143 => 53,  141 => 52,  138 => 51,  129 => 47,  125 => 46,  122 => 45,  120 => 44,  117 => 43,  108 => 39,  104 => 38,  101 => 37,  99 => 36,  96 => 35,  87 => 31,  83 => 30,  80 => 29,  78 => 28,  72 => 25,  68 => 24,  61 => 20,  57 => 19,  50 => 15,  46 => 14,  37 => 8,  31 => 4,  28 => 3,);
    }
}
