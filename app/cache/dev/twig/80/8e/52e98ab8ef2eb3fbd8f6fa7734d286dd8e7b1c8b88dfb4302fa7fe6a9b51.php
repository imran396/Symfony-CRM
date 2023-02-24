<?php

/* IntranetBundle:Campaign:index.html.twig */
class __TwigTemplate_808e52e98ab8ef2eb3fbd8f6fa7734d286dd8e7b1c8b88dfb4302fa7fe6a9b51 extends Twig_Template
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
    <h1 class=\"page-title\">";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Campaigns", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
\t";
        // line 8
        if ($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL")) {
            // line 9
            echo "\t    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("campaign_new");
            echo "\" class=\"btn\"><i class=\"icon-plus\"></i>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("New campaign", array(), "messages");
            echo "</a>
\t";
        }
        // line 11
        echo "\t";
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
    </div>
    
    <div class=\"well\">
        <!-- Nav tabs -->
        <ul class=\"nav nav-tabs unstyled\">
            <li class=\"active\"><a href=\"#running\" data-toggle=\"tab\">";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("Running", array(), "messages");
        echo "</a></li>
            <li><a href=\"#unapproved\" data-toggle=\"tab\">";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Unapproved", array(), "messages");
        echo "</a></li>
            <li><a href=\"#archived\" data-toggle=\"tab\">";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Archive", array(), "messages");
        echo "</a></li>
            <li><a href=\"#future\" data-toggle=\"tab\">";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("Future", array(), "messages");
        echo "</a></li>
            <li><a href=\"#denied\" data-toggle=\"tab\">";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("Denied", array(), "messages");
        echo "</a></li>
            <li><a href=\"#deleted\" data-toggle=\"tab\">";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Aborted", array(), "messages");
        echo "</a></li>
        </ul>

        <!-- Tab panes -->
        <div class=\"tab-content\">
            ";
        // line 27
        $context["tabs"] = $this->env->loadTemplate("IntranetBundle:Campaign:indexTabPaneMacro.html.twig");
        // line 28
        echo "            ";
        echo $context["tabs"]->getpane((isset($context["running"]) ? $context["running"] : $this->getContext($context, "running")), "running", "active");
        echo "
            ";
        // line 29
        echo $context["tabs"]->getpane((isset($context["unapproved"]) ? $context["unapproved"] : $this->getContext($context, "unapproved")), "unapproved", "");
        echo "
            ";
        // line 30
        echo $context["tabs"]->getpane((isset($context["archived"]) ? $context["archived"] : $this->getContext($context, "archived")), "archived", "");
        echo "
            ";
        // line 31
        echo $context["tabs"]->getpane((isset($context["future"]) ? $context["future"] : $this->getContext($context, "future")), "future", "");
        echo "
            ";
        // line 32
        echo $context["tabs"]->getpane((isset($context["denied"]) ? $context["denied"] : $this->getContext($context, "denied")), "denied", "");
        echo "
            ";
        // line 33
        echo $context["tabs"]->getpane((isset($context["deleted"]) ? $context["deleted"] : $this->getContext($context, "deleted")), "deleted", "");
        echo "
        </div>
    </div>
    
    ";
        // line 37
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 38
        echo "
    ";
        // line 39
        echo $context["paginator"]->getpager((isset($context["runningPagesCount"]) ? $context["runningPagesCount"] : $this->getContext($context, "runningPagesCount")), 1, "running");
        echo "
    ";
        // line 40
        echo $context["paginator"]->getpager((isset($context["unapprovedPagesCount"]) ? $context["unapprovedPagesCount"] : $this->getContext($context, "unapprovedPagesCount")), 1, "unapproved");
        echo "
    ";
        // line 41
        echo $context["paginator"]->getpager((isset($context["archivedPagesCount"]) ? $context["archivedPagesCount"] : $this->getContext($context, "archivedPagesCount")), 1, "archived");
        echo "
    ";
        // line 42
        echo $context["paginator"]->getpager((isset($context["futurePagesCount"]) ? $context["futurePagesCount"] : $this->getContext($context, "futurePagesCount")), 1, "future");
        echo "
    ";
        // line 43
        echo $context["paginator"]->getpager((isset($context["deniedPagesCount"]) ? $context["deniedPagesCount"] : $this->getContext($context, "deniedPagesCount")), 1, "denied");
        echo "
    ";
        // line 44
        echo $context["paginator"]->getpager((isset($context["deletedPagesCount"]) ? $context["deletedPagesCount"] : $this->getContext($context, "deletedPagesCount")), 1, "deleted");
        echo "

    ";
        // line 46
        $this->env->loadTemplate("IntranetBundle::paginationForTabbedContent.html.twig")->display($context);
        // line 47
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 47,  148 => 46,  143 => 44,  139 => 43,  135 => 42,  131 => 41,  127 => 40,  123 => 39,  120 => 38,  118 => 37,  111 => 33,  107 => 32,  103 => 31,  99 => 30,  95 => 29,  90 => 28,  88 => 27,  80 => 22,  76 => 21,  72 => 20,  68 => 19,  64 => 18,  60 => 17,  50 => 11,  42 => 9,  40 => 8,  34 => 5,  31 => 4,  28 => 3,);
    }
}
