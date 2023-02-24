<?php

/* IntranetBundle:CampaignSavingReport:hierarchyItem.html.twig */
class __TwigTemplate_c7b2bf7c55eb20e9f2c6efd8e04f099ac4f0897e7ce0a6e7a8b9d704b1a498ef extends Twig_Template
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
";
        // line 2
        $context["sums"] = $this->getAttribute((isset($context["currentItem"]) ? $context["currentItem"] : $this->getContext($context, "currentItem")), "getSums", array(), "method");
        // line 3
        echo "<div style=\"float: right; margin-right: 20px\" title=\"gespart: ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sums"]) ? $context["sums"] : $this->getContext($context, "sums")), "savings_percent", array(), "array"), "html", null, true);
        echo " %\">
    ";
        // line 4
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["sums"]) ? $context["sums"] : $this->getContext($context, "sums")), "budget", array(), "array"), 2, ",", "."), "html", null, true);
        echo " €
    ";
        // line 5
        if (($this->getAttribute((isset($context["sums"]) ? $context["sums"] : $this->getContext($context, "sums")), "budget", array(), "array") < $this->getAttribute((isset($context["sums"]) ? $context["sums"] : $this->getContext($context, "sums")), "regularPrice", array(), "array"))) {
            // line 6
            echo "        statt ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["sums"]) ? $context["sums"] : $this->getContext($context, "sums")), "regularPrice", array(), "array"), 2, ",", "."), "html", null, true);
            echo " €
    ";
        }
        // line 8
        echo "</div>
<ul>
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentItem"]) ? $context["currentItem"] : $this->getContext($context, "currentItem")), "getCampaigns", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["campaign"]) {
            // line 11
            echo "        <li class=\"data\">
            ";
            // line 12
            echo twig_escape_filter($this->env, $context["campaign"], "html", null, true);
            echo " 
            <div style=\"float: right; ; margin-right: 10px\" title=\"gespart: ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["campaign"], "discountPercent", array()), "html", null, true);
            echo " %\">
                ";
            // line 14
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["campaign"], "budget", array()), 2, ",", "."), "html", null, true);
            echo " €
\t            ";
            // line 15
            if (($this->getAttribute($context["campaign"], "budget", array()) < $this->getAttribute($context["campaign"], "regularPrice", array()))) {
                // line 16
                echo "                    statt ";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["campaign"], "regularPrice", array()), 2, ",", "."), "html", null, true);
                echo " €
\t            ";
            }
            // line 18
            echo "            </div>
\t    </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['campaign'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
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
            // line 22
            echo "        <li>";
            $this->env->loadTemplate("IntranetBundle:CampaignSavingReport:hierarchyItem.html.twig")->display(array_merge($context, array("currentItem" => $context["child"])));
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
        // line 24
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CampaignSavingReport:hierarchyItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 24,  99 => 22,  81 => 21,  73 => 18,  67 => 16,  65 => 15,  61 => 14,  57 => 13,  53 => 12,  50 => 11,  46 => 10,  42 => 8,  36 => 6,  34 => 5,  30 => 4,  25 => 3,  23 => 2,  19 => 1,);
    }
}
