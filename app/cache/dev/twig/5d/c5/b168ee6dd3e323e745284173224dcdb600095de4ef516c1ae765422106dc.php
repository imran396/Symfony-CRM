<?php

/* IntranetBundle:Customer:index.html.twig */
class __TwigTemplate_5dc5b168ee6dd3e323e745284173224dcdb600095de4ef516c1ae765422106dc extends Twig_Template
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
        // line 5
        $context["macro"] = $this->env->loadTemplate("IntranetBundle:Customer:entitiesMacro.html.twig");
        // line 6
        echo "
    <h1 class=\"page-title\">";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(($this->env->getExtension('beon_extension')->customerLevelFilter((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level"))) . "s")), "html", null, true);
        echo "</h1>
    ";
        // line 8
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
            // line 9
            echo "        <div class=\"btn-toolbar\">
            <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_new", array("level" => (isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")))), "html", null, true);
            echo "\" class=\"btn\"><i class=\"icon-plus\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("New " . $this->env->getExtension('beon_extension')->customerLevelFilter((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level"))))), "html", null, true);
            echo "</a>
\t        ";
            // line 11
            echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
            echo "
        </div>
    ";
        }
        // line 14
        echo "    <div class=\"well\">
        <!-- Nav tabs -->
        <ul class=\"nav nav-tabs unstyled\">
            <li class=\"active\"><a href=\"#running\" data-toggle=\"tab\">";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("Running", array(), "messages");
        echo " </a></li>
            <li><a href=\"#canceled\" data-toggle=\"tab\">";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Canceled", array(), "messages");
        echo " </a></li>
            <li><a href=\"#archive\" data-toggle=\"tab\">";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Archive", array(), "messages");
        echo " </a></li>
        </ul>

        <!-- Tab panes -->
        <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"running\">

                ";
        // line 26
        echo $context["macro"]->getentitiesIndex((isset($context["runningContracts"]) ? $context["runningContracts"] : $this->getContext($context, "runningContracts")), (isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")));
        echo "

            </div>
            <div class=\"tab-pane\" id=\"canceled\">

                ";
        // line 31
        echo $context["macro"]->getentitiesIndex((isset($context["canceledContracts"]) ? $context["canceledContracts"] : $this->getContext($context, "canceledContracts")), (isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")));
        echo "

            </div>
            <div class=\"tab-pane\" id=\"archive\">

                ";
        // line 36
        echo $context["macro"]->getentitiesIndex((isset($context["archiveContracts"]) ? $context["archiveContracts"] : $this->getContext($context, "archiveContracts")), (isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")));
        echo "

            </div>

        </div>
    </div>

    ";
        // line 43
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 44
        echo "
    ";
        // line 45
        echo $context["paginator"]->getpager((isset($context["runningContractsPagesCount"]) ? $context["runningContractsPagesCount"] : $this->getContext($context, "runningContractsPagesCount")), 1, "running");
        echo "
    ";
        // line 46
        echo $context["paginator"]->getpager((isset($context["archiveContractsPagesCount"]) ? $context["archiveContractsPagesCount"] : $this->getContext($context, "archiveContractsPagesCount")), 1, "archive");
        echo "
    ";
        // line 47
        echo $context["paginator"]->getpager((isset($context["canceledContractsPagesCount"]) ? $context["canceledContractsPagesCount"] : $this->getContext($context, "canceledContractsPagesCount")), 1, "canceled");
        echo "

    ";
        // line 49
        $this->env->loadTemplate("IntranetBundle::paginationForTabbedContent.html.twig")->display($context);
        // line 50
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 50,  127 => 49,  122 => 47,  118 => 46,  114 => 45,  111 => 44,  109 => 43,  99 => 36,  91 => 31,  83 => 26,  73 => 19,  69 => 18,  65 => 17,  60 => 14,  54 => 11,  48 => 10,  45 => 9,  43 => 8,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
