<?php

/* IntranetBundle:Complaint:index.html.twig */
class __TwigTemplate_22da651e892dfb6e9162b3c125ac29bbda974771e740b1e6d55aae32da8f9e6e extends Twig_Template
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
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Complaint", array(), "messages");
        echo "</h1>
    
    <div class=\"btn-toolbar\">
        
        ";
        // line 8
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL")) {
            // line 9
            echo "\t    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("complaint_new");
            echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("New complaint", array(), "messages");
            echo "</a>
\t";
        }
        // line 10
        echo "    
\t";
        // line 11
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>
    

    <div class=\"well\">

        <!-- Nav tabs -->
        <ul class=\"nav nav-tabs unstyled\">
            <li class=\"active\"><a href=\"#notStarted\" data-toggle=\"tab\">";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Not started", array(), "messages");
        echo "</a></li>
            <li><a href=\"#inProgress\" data-toggle=\"tab\">";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("In progress", array(), "messages");
        echo "</a></li>
            <li><a href=\"#feedback\" data-toggle=\"tab\">";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("Awaiting internal feedback", array(), "messages");
        echo "</a></li>
            <li><a href=\"#closed\" data-toggle=\"tab\">";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Closed", array(), "messages");
        echo "</a></li>
        </ul>


        <!-- Tab panes -->
        <div class=\"tab-content\">
            ";
        // line 28
        $context["tabs"] = $this->env->loadTemplate("IntranetBundle:Complaint:indexTabPaneMacro.html.twig");
        // line 29
        echo "            ";
        echo $context["tabs"]->getpane((isset($context["notStarted"]) ? $context["notStarted"] : $this->getContext($context, "notStarted")), "notStarted", "active");
        echo "
            ";
        // line 30
        echo $context["tabs"]->getpane((isset($context["inProgress"]) ? $context["inProgress"] : $this->getContext($context, "inProgress")), "inProgress", "");
        echo "
            ";
        // line 31
        echo $context["tabs"]->getpane((isset($context["AwaitingFeedBack"]) ? $context["AwaitingFeedBack"] : $this->getContext($context, "AwaitingFeedBack")), "feedback", "");
        echo "
            ";
        // line 32
        echo $context["tabs"]->getpane((isset($context["closed"]) ? $context["closed"] : $this->getContext($context, "closed")), "closed", "");
        echo "

        </div>
    </div>

    ";
        // line 37
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 38
        echo "    ";
        echo $context["paginator"]->getpager((isset($context["notStartedPagesCount"]) ? $context["notStartedPagesCount"] : $this->getContext($context, "notStartedPagesCount")), 1, "notStarted");
        echo "
    ";
        // line 39
        echo $context["paginator"]->getpager((isset($context["inProgressPagesCount"]) ? $context["inProgressPagesCount"] : $this->getContext($context, "inProgressPagesCount")), 1, "inProgress");
        echo "
    ";
        // line 40
        echo $context["paginator"]->getpager((isset($context["AwaitingFeedBackPageCount"]) ? $context["AwaitingFeedBackPageCount"] : $this->getContext($context, "AwaitingFeedBackPageCount")), 1, "feedback");
        echo "
    ";
        // line 41
        echo $context["paginator"]->getpager((isset($context["closedPagesCount"]) ? $context["closedPagesCount"] : $this->getContext($context, "closedPagesCount")), 1, "closed");
        echo "

    ";
        // line 43
        $this->env->loadTemplate("IntranetBundle::paginationForTabbedContent.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 43,  122 => 41,  118 => 40,  114 => 39,  109 => 38,  107 => 37,  99 => 32,  95 => 31,  91 => 30,  86 => 29,  84 => 28,  75 => 22,  71 => 21,  67 => 20,  63 => 19,  52 => 11,  49 => 10,  41 => 9,  39 => 8,  31 => 4,  28 => 3,);
    }
}
