<?php

/* IntranetBundle:FacebookReport:report.html.twig */
class __TwigTemplate_a1c430a9fb11437deb4729e1ea0c9a592a92d885c694a535f27633148189449e extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Report", array(), "messages");
        echo "</h1> 
<div class=\"clear\">&nbsp;</div>
";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("id" => "timeTrackReportFilter")));
        echo "
    <div class=\"span3 date-form\">";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fromDate", array()), 'widget');
        echo "</div>\t
    <div class=\"span3 date-form\">";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "toDate", array()), 'widget');
        echo "</div>
    <div class=\"span3\">";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "generate", array()), 'widget');
        echo " </div>
";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

<div class=\"clear\">&nbsp;</div>
\t<div class=\"well\">
";
        // line 15
        if ((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data"))) {
            // line 16
            echo "\t
\t\t<table class=\"table\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>#</th>
\t\t\t\t\t<th>";
            // line 21
            echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook URL", array(), "messages");
            echo "</th>
\t\t\t\t\t<th>";
            // line 22
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stake holder", array(), "messages");
            echo "</th>
\t\t\t\t\t<th>";
            // line 23
            echo $this->env->getExtension('translator')->getTranslator()->trans("Number of like", array(), "messages");
            echo "</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 28
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], 0, array(), "array"), "getUrl", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], 0, array(), "array"), "customerfacebookurls", array()), 0, array(), "array"), "customer", array()), "name", array()), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "max_likes", array(), "array"), "html", null, true);
                echo " (+&thinsp;";
                echo twig_escape_filter($this->env, ($this->getAttribute($context["row"], "max_likes", array(), "array") - $this->getAttribute($context["row"], "min_likes", array(), "array")), "html", null, true);
                echo ")</td>
\t\t\t\t\t</tr>
\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo " 
\t\t\t\t
\t\t\t</tbody>
\t\t</table>
\t
";
        }
        // line 40
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:FacebookReport:report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 40,  137 => 34,  118 => 32,  114 => 31,  110 => 30,  106 => 29,  103 => 28,  86 => 27,  79 => 23,  75 => 22,  71 => 21,  64 => 16,  62 => 15,  55 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
