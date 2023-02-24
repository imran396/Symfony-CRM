<?php

/* IntranetBundle:MonitoredUrl:show.html.twig */
class __TwigTemplate_55f9974db5fcf122616e5bd11d87eb57e0f4cf91ca3651efec8954f3a82a449b extends Twig_Template
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
        echo "\t<div class=\"row-fluid\">
\t\t<div class=\"block span12\">
\t\t\t<div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Monitored Url", array(), "messages");
        echo "</div>
\t\t\t<div id=\"widget1container\" class=\"block-body collapse in\">
\t\t\t\t<div id=\"tablewidget\" class=\"\">";
        // line 9
        echo "\t\t\t\t\t<table class=\"table table-bordered\">
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo "</th>
\t\t\t\t\t\t\t\t<td><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
        echo "</a></td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("Url", array(), "messages");
        echo "</th>
\t\t\t\t\t\t\t\t<td><a target=\"_blank\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "url", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "url", array()), 50), "html", null, true);
        echo "</a></td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("Is own website", array(), "messages");
        echo "</th>
\t\t\t\t\t\t\t\t<td>";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "isOwnWebsite", array()))), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("Lastcheck", array(), "messages");
        echo "</th>
\t\t\t\t\t\t\t\t<td>";
        // line 25
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastCheck", array()), "d.m.Y H:i"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t\t<div class=\"inline-forms\">
\t\t\t\t\t<a class=\"btn btn-table-actions\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
\t\t\t\t\t\t";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 33
        echo "\t\t\t\t\t</a>
\t\t\t\t\t";
        // line 34
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
\t\t\t\t</div>
                                <div class=\"inline-forms mb10\">
\t\t\t\t\t<a class=\"btn btn-table-actions\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "complaint")), "html", null, true);
        echo "\">
\t\t\t\t\t\t";
        // line 38
        echo $this->env->getExtension('translator')->getTranslator()->trans("Create complaint", array(), "messages");
        // line 39
        echo "\t\t\t\t\t</a>
\t\t\t\t\t<a class=\"btn btn-table-actions\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_new", array("monitoredUrl" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
\t\t\t\t\t\t";
        // line 41
        echo $this->env->getExtension('translator')->getTranslator()->trans("Create Note", array(), "messages");
        // line 42
        echo "\t\t\t\t\t</a>\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

    ";
        // line 48
        $this->env->loadTemplate("IntranetBundle:Note:listChunk.html.twig")->display($context);
        // line 49
        echo "    ";
        $this->env->loadTemplate("IntranetBundle:MonitoredUrl:logList.html.twig")->display($context);
        // line 50
        echo "    ";
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:MonitoredUrl:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 50,  132 => 49,  130 => 48,  122 => 42,  120 => 41,  116 => 40,  113 => 39,  111 => 38,  107 => 37,  101 => 34,  98 => 33,  96 => 32,  92 => 31,  83 => 25,  79 => 24,  73 => 21,  69 => 20,  61 => 17,  57 => 16,  49 => 13,  45 => 12,  40 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
