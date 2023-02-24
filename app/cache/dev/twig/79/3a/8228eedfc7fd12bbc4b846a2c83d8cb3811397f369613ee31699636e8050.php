<?php

/* IntranetBundle:Task:index.html.twig */
class __TwigTemplate_793a8228eedfc7fd12bbc4b846a2c83d8cb3811397f369613ee31699636e8050 extends Twig_Template
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

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Task list", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
        ";
        // line 9
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_NEW")) {
            // line 10
            echo "            <a href=\"";
            echo $this->env->getExtension('routing')->getPath("task_new");
            echo "\" class=\"btn\" style=\"margin-right: 50px\"><i class=\"icon-plus\"></i> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("New task", array(), "messages");
            echo "</a>
        ";
        }
        // line 12
        echo "        <div class=\"btn-group\">
            ";
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), 'form_start', array("attr" => array("id" => "userFilter")));
        echo "
            ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "user", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a user"))));
        echo "
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "stakeholder", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a stakeholder"))));
        echo "
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "submit", array()), 'widget');
        echo "
            ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "clear", array()), 'widget');
        echo "
            ";
        // line 18
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), 'form_end');
        echo "
        </div>

    </div>

    <div class=\"well\">

        <!-- Nav tabs -->
        <ul class=\"nav nav-tabs unstyled\">
            <li class=\"active\"><a href=\"#notStarted\" data-toggle=\"tab\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskStatusFilter(twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "NOT_STARTED"))), "html", null, true);
        echo "</a></li>
            <li><a href=\"#inProgress\" data-toggle=\"tab\">";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskStatusFilter(twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "IN_PROGRESS"))), "html", null, true);
        echo "</a></li>
            ";
        // line 29
        if (((isset($context["internalWaitPagesCount"]) ? $context["internalWaitPagesCount"] : $this->getContext($context, "internalWaitPagesCount")) > 0)) {
            // line 30
            echo "            <li><a href=\"#internalWait\" data-toggle=\"tab\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Waiting for internal approval", array(), "messages");
            echo "</a></li>
            ";
        }
        // line 32
        echo "            ";
        if (((isset($context["externalWaitPagesCount"]) ? $context["externalWaitPagesCount"] : $this->getContext($context, "externalWaitPagesCount")) > 0)) {
            // line 33
            echo "            <li><a href=\"#externalWait\" data-toggle=\"tab\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Waiting for external approval", array(), "messages");
            echo "</a></li>
            ";
        }
        // line 35
        echo "            ";
        if (((isset($context["thirdPartyWaitPagesCount"]) ? $context["thirdPartyWaitPagesCount"] : $this->getContext($context, "thirdPartyWaitPagesCount")) > 0)) {
            // line 36
            echo "            <li><a href=\"#thirdPartyWait\" data-toggle=\"tab\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Waiting for third party", array(), "messages");
            echo "</a></li>
            ";
        }
        // line 38
        echo "            ";
        if (((isset($context["approvedPagesCount"]) ? $context["approvedPagesCount"] : $this->getContext($context, "approvedPagesCount")) > 0)) {
            // line 39
            echo "            <li><a href=\"#approved\" data-toggle=\"tab\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Approved", array(), "messages");
            echo "</a></li>
            ";
        }
        // line 41
        echo "            ";
        if (((isset($context["printingPagesCount"]) ? $context["printingPagesCount"] : $this->getContext($context, "printingPagesCount")) > 0)) {
            // line 42
            echo "            <li><a href=\"#printing\" data-toggle=\"tab\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskStatusFilter(twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "PRINTING"))), "html", null, true);
            echo "</a></li>
            ";
        }
        // line 44
        echo "            <li><a href=\"#done\" data-toggle=\"tab\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskStatusFilter(twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "DONE"))), "html", null, true);
        echo "</a></li>
            ";
        // line 45
        if (((isset($context["abortedPagesCount"]) ? $context["abortedPagesCount"] : $this->getContext($context, "abortedPagesCount")) > 0)) {
            // line 46
            echo "            <li><a href=\"#aborted\" data-toggle=\"tab\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->taskStatusFilter(twig_constant(((isset($context["TaskStatusEnum"]) ? $context["TaskStatusEnum"] : $this->getContext($context, "TaskStatusEnum")) . "ABORTED"))), "html", null, true);
            echo "</a></li>
            ";
        }
        // line 48
        echo "        </ul>


        <!-- Tab panes -->
        <div class=\"tab-content\">

            ";
        // line 54
        $context["tabs"] = $this->env->loadTemplate("IntranetBundle:Task:indexTabPaneMacro.html.twig");
        // line 55
        echo "            ";
        echo $context["tabs"]->getpane((isset($context["notStarted"]) ? $context["notStarted"] : $this->getContext($context, "notStarted")), "notStarted", "active");
        echo "
            ";
        // line 56
        echo $context["tabs"]->getpane((isset($context["inProgress"]) ? $context["inProgress"] : $this->getContext($context, "inProgress")), "inProgress", "");
        echo "
            ";
        // line 57
        echo $context["tabs"]->getpane((isset($context["internalWait"]) ? $context["internalWait"] : $this->getContext($context, "internalWait")), "internalWait", "");
        echo "
            ";
        // line 58
        echo $context["tabs"]->getpane((isset($context["externalWait"]) ? $context["externalWait"] : $this->getContext($context, "externalWait")), "externalWait", "");
        echo "
            ";
        // line 59
        echo $context["tabs"]->getpane((isset($context["thirdPartyWait"]) ? $context["thirdPartyWait"] : $this->getContext($context, "thirdPartyWait")), "thirdPartyWait", "");
        echo "
            ";
        // line 60
        echo $context["tabs"]->getpane((isset($context["approved"]) ? $context["approved"] : $this->getContext($context, "approved")), "approved", "");
        echo "
            ";
        // line 61
        echo $context["tabs"]->getpane((isset($context["printing"]) ? $context["printing"] : $this->getContext($context, "printing")), "printing", "");
        echo "
            ";
        // line 62
        echo $context["tabs"]->getpane((isset($context["done"]) ? $context["done"] : $this->getContext($context, "done")), "done", "");
        echo "
            ";
        // line 63
        echo $context["tabs"]->getpane((isset($context["aborted"]) ? $context["aborted"] : $this->getContext($context, "aborted")), "aborted", "");
        echo "

        </div>


    </div>

    ";
        // line 70
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 71
        echo "
    ";
        // line 72
        echo $context["paginator"]->getpager((isset($context["notStartedPagesCount"]) ? $context["notStartedPagesCount"] : $this->getContext($context, "notStartedPagesCount")), 1, "notStarted");
        echo "
    ";
        // line 73
        echo $context["paginator"]->getpager((isset($context["inProgressPagesCount"]) ? $context["inProgressPagesCount"] : $this->getContext($context, "inProgressPagesCount")), 1, "inProgress");
        echo "
    ";
        // line 74
        echo $context["paginator"]->getpager((isset($context["internalWaitPagesCount"]) ? $context["internalWaitPagesCount"] : $this->getContext($context, "internalWaitPagesCount")), 1, "internalWait");
        echo "
    ";
        // line 75
        echo $context["paginator"]->getpager((isset($context["externalWaitPagesCount"]) ? $context["externalWaitPagesCount"] : $this->getContext($context, "externalWaitPagesCount")), 1, "externalWait");
        echo "
    ";
        // line 76
        echo $context["paginator"]->getpager((isset($context["thirdPartyWaitPagesCount"]) ? $context["thirdPartyWaitPagesCount"] : $this->getContext($context, "thirdPartyWaitPagesCount")), 1, "thirdPartyWait");
        echo "
    ";
        // line 77
        echo $context["paginator"]->getpager((isset($context["approvedPagesCount"]) ? $context["approvedPagesCount"] : $this->getContext($context, "approvedPagesCount")), 1, "approved");
        echo "
    ";
        // line 78
        echo $context["paginator"]->getpager((isset($context["printingPagesCount"]) ? $context["printingPagesCount"] : $this->getContext($context, "printingPagesCount")), 1, "printing");
        echo "
    ";
        // line 79
        echo $context["paginator"]->getpager((isset($context["donePagesCount"]) ? $context["donePagesCount"] : $this->getContext($context, "donePagesCount")), 1, "done");
        echo "
    ";
        // line 80
        echo $context["paginator"]->getpager((isset($context["abortedPagesCount"]) ? $context["abortedPagesCount"] : $this->getContext($context, "abortedPagesCount")), 1, "aborted");
        echo "

    ";
        // line 82
        $this->env->loadTemplate("IntranetBundle::paginationForTabbedContent.html.twig")->display($context);
        // line 83
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 83,  243 => 82,  238 => 80,  234 => 79,  230 => 78,  226 => 77,  222 => 76,  218 => 75,  214 => 74,  210 => 73,  206 => 72,  203 => 71,  201 => 70,  191 => 63,  187 => 62,  183 => 61,  179 => 60,  175 => 59,  171 => 58,  167 => 57,  163 => 56,  158 => 55,  156 => 54,  148 => 48,  142 => 46,  140 => 45,  135 => 44,  129 => 42,  126 => 41,  120 => 39,  117 => 38,  111 => 36,  108 => 35,  102 => 33,  99 => 32,  93 => 30,  91 => 29,  87 => 28,  83 => 27,  71 => 18,  67 => 17,  63 => 16,  59 => 15,  55 => 14,  51 => 13,  48 => 12,  40 => 10,  38 => 9,  31 => 6,  28 => 5,);
    }
}
