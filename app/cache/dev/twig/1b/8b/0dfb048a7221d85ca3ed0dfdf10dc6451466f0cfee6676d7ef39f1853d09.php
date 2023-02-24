<?php

/* IntranetBundle:FacebookUrl:index.html.twig */
class __TwigTemplate_1b8b0dfb048a7221d85ca3ed0dfdf10dc6451466f0cfee6676d7ef39f1853d09 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</h1>

    <div class=\"btn-toolbar\">
        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("facebookurl_new");
        echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("New facebook url", array(), "messages");
        echo "</a>

        <div class=\"btn-group\">
        </div>
    </div>

    <div class=\"well\">
        ";
        // line 14
        $this->env->loadTemplate("IntranetBundle:FacebookUrl:indexTable.html.twig")->display($context);
        // line 15
        echo "    </div>
    ";
        // line 16
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
        // line 17
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
        return "IntranetBundle:FacebookUrl:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 17,  55 => 16,  52 => 15,  50 => 14,  38 => 7,  31 => 4,  28 => 3,);
    }
}
