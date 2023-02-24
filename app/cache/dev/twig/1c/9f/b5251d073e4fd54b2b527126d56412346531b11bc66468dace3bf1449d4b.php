<?php

/* IntranetBundle:Note:index.html.twig */
class __TwigTemplate_1c9fb5251d073e4fd54b2b527126d56412346531b11bc66468dace3bf1449d4b extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
        echo "</h1>
    <div class=\"btn-toolbar\">
\t";
        // line 6
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "monitoredUrl"), "method")) {
            // line 7
            echo "\t\t<a href=\"";
            echo $this->env->getExtension('routing')->getPath("monitoredurl");
            echo "\" class=\"btn\"><i class=\"icon-plus\"></i>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to monitored url", array(), "messages");
            echo "</a>
\t";
        } else {
            // line 9
            echo "\t    ";
            if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_NEW")) {
                // line 10
                echo "\t\t<a href=\"";
                echo $this->env->getExtension('routing')->getPath("note_new");
                echo "\" class=\"btn\"><i class=\"icon-plus\"></i> ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("New note", array(), "messages");
                echo "</a>
\t    ";
            }
            // line 12
            echo "\t";
        }
        // line 13
        echo "\t
\t";
        // line 14
        echo (isset($context["filterForm"]) ? $context["filterForm"] : $this->getContext($context, "filterForm"));
        echo "
\t
    </div>  
    <div class=\"well\">
        ";
        // line 18
        $this->env->loadTemplate("IntranetBundle:Note:indexTable.html.twig")->display($context);
        // line 19
        echo "    </div>
    ";
        // line 20
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 20,  73 => 19,  71 => 18,  64 => 14,  61 => 13,  58 => 12,  50 => 10,  47 => 9,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
