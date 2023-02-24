<?php

/* IntranetBundle:Pressrelease:index.html.twig */
class __TwigTemplate_c1f10e8a8e11429f7571e41886cff8f8c2d5191920157ba8ba3150ddc7590dbb extends Twig_Template
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
        echo "    <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Press release", array(), "messages");
        echo "</h1>
    
    
    
    
    <div class=\"btn-toolbar\">
\t";
        // line 11
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
            // line 12
            echo "\t    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("pressrelease_new");
            echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("New press release", array(), "messages");
            echo "</a>
\t";
        }
        // line 14
        echo "\t
\t";
        // line 15
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
\t
    </div>
    
    
    
    
    <div class=\"well\">
        <!-- Nav tabs -->
        <ul class=\"nav nav-tabs unstyled\">
            <li class=\"active\"><a href=\"#draft\" data-toggle=\"tab\">";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("Draft", array(), "messages");
        echo "</a></li>
            <!--<li><a href=\"#deleted\" data-toggle=\"tab\">Deleted</a></li>-->
            <li><a href=\"#approvalEmailSent\" data-toggle=\"tab\">";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("Waiting for approval", array(), "messages");
        echo "</a></li>
            <li><a href=\"#approved\" data-toggle=\"tab\">";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("Approved", array(), "messages");
        echo "</a></li>
            <li><a href=\"#submitted\" data-toggle=\"tab\">";
        // line 29
        echo $this->env->getExtension('translator')->getTranslator()->trans("Submitted", array(), "messages");
        echo "</a></li>
            <li><a href=\"#deleted\" data-toggle=\"tab\">";
        // line 30
        echo $this->env->getExtension('translator')->getTranslator()->trans("Aborted", array(), "messages");
        echo "</a></li>
        </ul>

        <!-- Tab panes -->
        <div class=\"tab-content\">
            ";
        // line 35
        $context["tabs"] = $this->env->loadTemplate("IntranetBundle:Pressrelease:indexTabPaneMacro.html.twig");
        // line 36
        echo "            ";
        echo $context["tabs"]->getpane((isset($context["draft"]) ? $context["draft"] : $this->getContext($context, "draft")), "draft", "active");
        echo "
            ";
        // line 37
        echo $context["tabs"]->getpane((isset($context["deleted"]) ? $context["deleted"] : $this->getContext($context, "deleted")), "deleted", "");
        echo "
            ";
        // line 38
        echo $context["tabs"]->getpane((isset($context["approvalEmailSent"]) ? $context["approvalEmailSent"] : $this->getContext($context, "approvalEmailSent")), "approvalEmailSent", "");
        echo "
            ";
        // line 39
        echo $context["tabs"]->getpane((isset($context["approved"]) ? $context["approved"] : $this->getContext($context, "approved")), "approved", "");
        echo "
            ";
        // line 40
        echo $context["tabs"]->getpane((isset($context["submitted"]) ? $context["submitted"] : $this->getContext($context, "submitted")), "submitted", "");
        echo "
            ";
        // line 41
        echo $context["tabs"]->getpane((isset($context["deleted"]) ? $context["deleted"] : $this->getContext($context, "deleted")), "deleted", "");
        echo "
        </div>
    </div>


    ";
        // line 46
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 47
        echo "
    ";
        // line 48
        echo $context["paginator"]->getpager((isset($context["draftPagesCount"]) ? $context["draftPagesCount"] : $this->getContext($context, "draftPagesCount")), 1, "draft");
        echo "
    ";
        // line 49
        echo $context["paginator"]->getpager((isset($context["deletedPagesCount"]) ? $context["deletedPagesCount"] : $this->getContext($context, "deletedPagesCount")), 1, "deleted");
        echo "
    ";
        // line 50
        echo $context["paginator"]->getpager((isset($context["approvalEmailSentdPagesCount"]) ? $context["approvalEmailSentdPagesCount"] : $this->getContext($context, "approvalEmailSentdPagesCount")), 1, "approvalEmailSent");
        echo "
    ";
        // line 51
        echo $context["paginator"]->getpager((isset($context["approvedPagesCount"]) ? $context["approvedPagesCount"] : $this->getContext($context, "approvedPagesCount")), 1, "approved");
        echo "
    ";
        // line 52
        echo $context["paginator"]->getpager((isset($context["submittedPagesCount"]) ? $context["submittedPagesCount"] : $this->getContext($context, "submittedPagesCount")), 1, "submitted");
        echo "
    ";
        // line 53
        echo $context["paginator"]->getpager((isset($context["deletedPagesCount"]) ? $context["deletedPagesCount"] : $this->getContext($context, "deletedPagesCount")), 1, "deleted");
        echo "
    ";
        // line 54
        $this->env->loadTemplate("IntranetBundle::paginationForTabbedContent.html.twig")->display($context);
        // line 55
        echo "

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 55,  152 => 54,  148 => 53,  144 => 52,  140 => 51,  136 => 50,  132 => 49,  128 => 48,  125 => 47,  123 => 46,  115 => 41,  111 => 40,  107 => 39,  103 => 38,  99 => 37,  94 => 36,  92 => 35,  84 => 30,  80 => 29,  76 => 28,  72 => 27,  67 => 25,  54 => 15,  51 => 14,  43 => 12,  41 => 11,  31 => 5,  28 => 4,);
    }
}
