<?php

/* IntranetBundle:MonitoredUrl:index.html.twig */
class __TwigTemplate_26b071bcdfbce6ec148e8abe03a4f41c9929ea8a10b301a22772d7326143f425 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Monitored Url", array(), "messages");
        echo "</h1>
    
    <div class=\"btn-toolbar\">
        
        <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("monitoredurl_new");
        echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New monitored url", array(), "messages");
        echo "</a>
\t
\t";
        // line 11
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
\t
    </div>
    
    <div class=\"well\">

\t<!-- Nav tabs -->
\t<ul class=\"nav nav-tabs unstyled\">
\t    <li class=\"active\"><a href=\"#ownUrl\" data-toggle=\"tab\">";
        // line 19
        echo $this->env->getExtension('translator')->getTranslator()->trans("Own Urls", array(), "messages");
        echo "</a></li>
\t    <li><a href=\"#otherUrl\" data-toggle=\"tab\">";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("Other Urls", array(), "messages");
        echo "</a></li>
\t</ul>
\t
\t<!-- Tab panes -->
\t<div class=\"tab-content\">
\t    ";
        // line 25
        $context["tabs"] = $this->env->loadTemplate("IntranetBundle:MonitoredUrl:indexTabPaneMacro.html.twig");
        // line 26
        echo "\t    ";
        echo $context["tabs"]->getpane((isset($context["ownUrl"]) ? $context["ownUrl"] : $this->getContext($context, "ownUrl")), "ownUrl", "active");
        echo "
\t    ";
        // line 27
        echo $context["tabs"]->getpane((isset($context["otherUrl"]) ? $context["otherUrl"] : $this->getContext($context, "otherUrl")), "otherUrl", "");
        echo "
\t</div>
    </div>
    
    ";
        // line 31
        $context["paginator"] = $this->env->loadTemplate("IntranetBundle:Macroses:paginator.html.twig");
        // line 32
        echo "    ";
        echo $context["paginator"]->getpager((isset($context["ownUrlPageCount"]) ? $context["ownUrlPageCount"] : $this->getContext($context, "ownUrlPageCount")), 1, "ownUrl");
        echo "
    ";
        // line 33
        echo $context["paginator"]->getpager((isset($context["otherUrlPageCount"]) ? $context["otherUrlPageCount"] : $this->getContext($context, "otherUrlPageCount")), 1, "otherUrl");
        echo "

    ";
        // line 35
        $this->env->loadTemplate("IntranetBundle::paginationForTabbedContent.html.twig")->display($context);
        // line 36
        echo "
<script>
    \$(function () {
        \$(document).on(\"click\", \"a.markdone\", function (e) {
            e.preventDefault();
            var button = \$(this);
            \$.ajax(\$(this).attr('href')).done(function (data) {
                button.attr('disabled', true).closest('td').prev().text(data);
            });
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:MonitoredUrl:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 36,  95 => 35,  90 => 33,  85 => 32,  83 => 31,  76 => 27,  71 => 26,  69 => 25,  61 => 20,  57 => 19,  46 => 11,  39 => 9,  31 => 5,  28 => 4,);
    }
}
