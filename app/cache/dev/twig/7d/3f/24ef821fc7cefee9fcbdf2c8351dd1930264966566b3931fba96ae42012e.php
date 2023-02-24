<?php

/* IntranetBundle:TimeTrackReport:hierarchyItem.html.twig */
class __TwigTemplate_7d3f24ef821fc7cefee9fcbdf2c8351dd1930264966566b3931fba96ae42012e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentItem"]) ? $context["currentItem"] : $this->getContext($context, "currentItem")), "getLabel", array(), "method"), "html", null, true);
        echo "
<ul>
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentItem"]) ? $context["currentItem"] : $this->getContext($context, "currentItem")), "getCummulatedData", array(), "method"));
        foreach ($context['_seq'] as $context["tariff"] => $context["hours"]) {
            // line 4
            echo "        ";
            if (($context["hours"] != 0)) {
                // line 5
                echo "            <li class=\"data\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->ttCalcPriceFilter($context["hours"], $context["tariff"]), "html", null, true);
                echo "</li>
        ";
            }
            // line 7
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tariff'], $context['hours'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentItem"]) ? $context["currentItem"] : $this->getContext($context, "currentItem")), "getChildren", array(), "method"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 9
            echo "        <li>";
            $this->env->loadTemplate("IntranetBundle:TimeTrackReport:hierarchyItem.html.twig")->display(array_merge($context, array("currentItem" => $context["child"])));
            echo "</li>
    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:TimeTrackReport:hierarchyItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 11,  61 => 9,  43 => 8,  37 => 7,  31 => 5,  28 => 4,  24 => 3,  19 => 1,);
    }
}
