<?php

/* IntranetBundle:SurveyAnalysis:reportTable.html.twig */
class __TwigTemplate_fff9a24f8c31fe452f275e5aa66dde99a99045977dba6752fb6edf3a13fdd57a extends Twig_Template
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
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "lengthOfStay", array(), "any", true, true)) {
            // line 2
            echo " <table class=\"table\">
    <tr>
        <th width=\"40%\">Question: ";
            // line 4
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "question", array())), "html", null, true);
            echo " </th>
        <th width=\"60%\">&nbsp;</th>
    </tr>
    ";
            // line 7
            if ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "lengthOfStay", array(), "any", false, true), "customer", array(), "any", true, true)) {
                // line 8
                echo "    <tr>
        <td>";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerName", array()), "html", null, true);
                echo "</td>
        <td> ";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "customer", array()), "hours", array()), "html", null, true);
                echo " Hour ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "customer", array()), "minutes", array()), "html", null, true);
                echo " Minutes Average Stay  </td>
    </tr>
    ";
            }
            // line 13
            echo "    ";
            if ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "lengthOfStay", array(), "any", false, true), "parent", array(), "any", true, true)) {
                // line 14
                echo "    <tr>
        <td>";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parentName", array()), "html", null, true);
                echo "</td>
        <td> ";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "parent", array()), "hours", array()), "html", null, true);
                echo " Hour ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "parent", array()), "minutes", array()), "html", null, true);
                echo " Minutes Average Stay  </td>
    </tr>
    ";
            }
            // line 19
            echo "    ";
            if ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "lengthOfStay", array(), "any", false, true), "grandParent", array(), "any", true, true)) {
                // line 20
                echo "    <tr>
        <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "grandParentName", array()), "html", null, true);
                echo "</td>
        <td> ";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "grandParent", array()), "hours", array()), "html", null, true);
                echo " Hour ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "lengthOfStay", array()), "grandParent", array()), "minutes", array()), "html", null, true);
                echo " Minutes Average Stay  </td>
    </tr>
    ";
            }
            // line 25
            echo "</table>
";
        }
        // line 27
        echo "
";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 29
            if ($this->getAttribute($context["question"], "type", array(), "any", true, true)) {
                // line 30
                $context["cTotal"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerTotal", array());
                // line 31
                if ($this->getAttribute($this->getAttribute($context["question"], "customer", array(), "any", false, true), "ka", array(), "any", true, true)) {
                    // line 32
                    echo "    ";
                    $context["cKa"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "ka", array()), "count", array());
                    // line 33
                    echo "    ";
                    $context["cTotal"] = ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerTotal", array()) - (isset($context["cKa"]) ? $context["cKa"] : $this->getContext($context, "cKa")));
                }
                // line 35
                echo "
";
                // line 36
                $context["pTotal"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parentTotal", array());
                // line 37
                if ($this->getAttribute($this->getAttribute($context["question"], "parent", array(), "any", false, true), "ka", array(), "any", true, true)) {
                    // line 38
                    echo "    ";
                    $context["pKa"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "ka", array()), "count", array());
                    // line 39
                    echo "    ";
                    $context["pTotal"] = ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parentTotal", array()) - (isset($context["pKa"]) ? $context["pKa"] : $this->getContext($context, "pKa")));
                }
                // line 41
                echo "
";
                // line 42
                $context["gpTotal"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "grandParentTotal", array());
                // line 43
                if ($this->getAttribute($this->getAttribute($context["question"], "grandParent", array(), "any", false, true), "ka", array(), "any", true, true)) {
                    // line 44
                    echo "    ";
                    $context["gpKa"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "ka", array()), "count", array());
                    // line 45
                    echo "    ";
                    $context["gpTotal"] = ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "grandParentTotal", array()) - (isset($context["gpKa"]) ? $context["gpKa"] : $this->getContext($context, "gpKa")));
                }
                // line 47
                echo "    <table class=\"table\">
        <tr>
            <th width=\"40%\">Question: ";
                // line 49
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["question"], "question", array())), "html", null, true);
                echo " </th>
            <th width=\"60%\">&nbsp;</th>
        </tr>
        ";
                // line 52
                if ($this->getAttribute($context["question"], "customer", array(), "any", true, true)) {
                    // line 53
                    echo "        <tr>
            <td>";
                    // line 54
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerName", array()), "html", null, true);
                    echo "</td>
            <td>
            ";
                    // line 56
                    if ((1 == $this->getAttribute($context["question"], "type", array()))) {
                        // line 57
                        echo "                ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["question"], "customer", array()));
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 58
                            echo "                    ";
                            if ((((twig_test_iterable($context["value"]) && ($context["key"] != "ka")) && ($this->getAttribute($context["value"], "count", array()) > 0)) && ((isset($context["cTotal"]) ? $context["cTotal"] : $this->getContext($context, "cTotal")) > 0))) {
                                // line 59
                                echo "                        ";
                                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($context["value"], "count", array()) / (isset($context["cTotal"]) ? $context["cTotal"] : $this->getContext($context, "cTotal"))) * 100), 2, "."), "html", null, true);
                                echo "%  ";
                                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                                echo ", 
                    ";
                            }
                            // line 61
                            echo "                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 62
                        echo "                ";
                        if (($this->getAttribute($this->getAttribute($context["question"], "customer", array(), "any", false, true), "ka", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "ka", array()), "count", array()) > 0))) {
                            // line 63
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "ka", array()), "count", array()) / $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerTotal", array())) * 100), 2, "."), "html", null, true);
                            echo "%  k.A.
                ";
                        }
                        // line 65
                        echo "             ";
                    } elseif ((0 == $this->getAttribute($context["question"], "type", array()))) {
                        // line 66
                        echo "                ";
                        if ((($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "sum", array()) > 0) && ((isset($context["cTotal"]) ? $context["cTotal"] : $this->getContext($context, "cTotal")) > 0))) {
                            // line 67
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "sum", array()) / (isset($context["cTotal"]) ? $context["cTotal"] : $this->getContext($context, "cTotal"))), 2, "."), "html", null, true);
                            echo "  Average,  
                ";
                        }
                        // line 69
                        echo "                
                ";
                        // line 70
                        if (($this->getAttribute($this->getAttribute($context["question"], "customer", array(), "any", false, true), "ka", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "ka", array()), "count", array()) > 0))) {
                            // line 71
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "customer", array()), "ka", array()), "count", array()) / $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerTotal", array())) * 100), 2, "."), "html", null, true);
                            echo "%  k.A.
                ";
                        }
                        // line 73
                        echo "             ";
                    }
                    // line 74
                    echo "            </td>
        </tr>
        ";
                }
                // line 77
                echo "        ";
                if ($this->getAttribute($context["question"], "parent", array(), "any", true, true)) {
                    // line 78
                    echo "        <tr>
            <td>";
                    // line 79
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parentName", array()), "html", null, true);
                    echo "</td>
            <td>
            ";
                    // line 81
                    if ((1 == $this->getAttribute($context["question"], "type", array()))) {
                        // line 82
                        echo "                ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["question"], "parent", array()));
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 83
                            echo "                    ";
                            if ((((twig_test_iterable($context["value"]) && ($context["key"] != "ka")) && ($this->getAttribute($context["value"], "count", array()) > 0)) && ((isset($context["pTotal"]) ? $context["pTotal"] : $this->getContext($context, "pTotal")) > 0))) {
                                // line 84
                                echo "                        ";
                                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($context["value"], "count", array()) / (isset($context["pTotal"]) ? $context["pTotal"] : $this->getContext($context, "pTotal"))) * 100), 2, "."), "html", null, true);
                                echo "%  ";
                                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                                echo ", 
                    ";
                            }
                            // line 86
                            echo "                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 87
                        echo "                ";
                        if (($this->getAttribute($this->getAttribute($context["question"], "parent", array(), "any", false, true), "ka", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "ka", array()), "count", array()) > 0))) {
                            // line 88
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "ka", array()), "count", array()) / $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parentTotal", array())) * 100), 2, "."), "html", null, true);
                            echo "%  k.A.
                ";
                        }
                        // line 90
                        echo "            ";
                    } elseif ((0 == $this->getAttribute($context["question"], "type", array()))) {
                        // line 91
                        echo "                ";
                        if ((($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "sum", array()) > 0) && ((isset($context["pTotal"]) ? $context["pTotal"] : $this->getContext($context, "pTotal")) > 0))) {
                            // line 92
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "sum", array()) / (isset($context["pTotal"]) ? $context["pTotal"] : $this->getContext($context, "pTotal"))), 2, "."), "html", null, true);
                            echo "  Average,  
                ";
                        }
                        // line 94
                        echo "                
                ";
                        // line 95
                        if (($this->getAttribute($this->getAttribute($context["question"], "parent", array(), "any", false, true), "ka", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "ka", array()), "count", array()) > 0))) {
                            // line 96
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "parent", array()), "ka", array()), "count", array()) / $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parentTotal", array())) * 100), 2, "."), "html", null, true);
                            echo "%  k.A.
                ";
                        }
                        // line 98
                        echo "            ";
                    }
                    // line 99
                    echo "            </td>
        </tr>
        ";
                }
                // line 102
                echo "        ";
                if ($this->getAttribute($context["question"], "grandParent", array(), "any", true, true)) {
                    // line 103
                    echo "        <tr>
            <td>";
                    // line 104
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "grandParentName", array()), "html", null, true);
                    echo "</td>
            <td>
            ";
                    // line 106
                    if ((1 == $this->getAttribute($context["question"], "type", array()))) {
                        // line 107
                        echo "                ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["question"], "grandParent", array()));
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 108
                            echo "                    ";
                            if ((((twig_test_iterable($context["value"]) && ($context["key"] != "ka")) && ($this->getAttribute($context["value"], "count", array()) > 0)) && ((isset($context["gpTotal"]) ? $context["gpTotal"] : $this->getContext($context, "gpTotal")) > 0))) {
                                // line 109
                                echo "                        ";
                                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($context["value"], "count", array()) / (isset($context["gpTotal"]) ? $context["gpTotal"] : $this->getContext($context, "gpTotal"))) * 100), 2, "."), "html", null, true);
                                echo "%  ";
                                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                                echo ",
                    ";
                            }
                            // line 111
                            echo "                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 112
                        echo "                ";
                        if (($this->getAttribute($this->getAttribute($context["question"], "grandParent", array(), "any", false, true), "ka", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "ka", array()), "count", array()) > 0))) {
                            // line 113
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "ka", array()), "count", array()) / $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "grandParentTotal", array())) * 100), 2, "."), "html", null, true);
                            echo "%  k.A.
                ";
                        }
                        // line 115
                        echo "            ";
                    } elseif ((0 == $this->getAttribute($context["question"], "type", array()))) {
                        // line 116
                        echo "                ";
                        if ((($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "sum", array()) > 0) && ((isset($context["gpTotal"]) ? $context["gpTotal"] : $this->getContext($context, "gpTotal")) > 0))) {
                            // line 117
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "sum", array()) / (isset($context["gpTotal"]) ? $context["gpTotal"] : $this->getContext($context, "gpTotal"))), 2, "."), "html", null, true);
                            echo "  Average,  
                ";
                        }
                        // line 119
                        echo "                
                ";
                        // line 120
                        if (($this->getAttribute($this->getAttribute($context["question"], "grandParent", array(), "any", false, true), "ka", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "ka", array()), "count", array()) > 0))) {
                            // line 121
                            echo "                    ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["question"], "grandParent", array()), "ka", array()), "count", array()) / $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "grandParentTotal", array())) * 100), 2, "."), "html", null, true);
                            echo "%  k.A.
                ";
                        }
                        // line 123
                        echo "            ";
                    }
                    // line 124
                    echo "            </td>
        </tr>
        ";
                }
                // line 127
                echo "    </table>
";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SurveyAnalysis:reportTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 127,  365 => 124,  362 => 123,  356 => 121,  354 => 120,  351 => 119,  345 => 117,  342 => 116,  339 => 115,  333 => 113,  330 => 112,  324 => 111,  316 => 109,  313 => 108,  308 => 107,  306 => 106,  301 => 104,  298 => 103,  295 => 102,  290 => 99,  287 => 98,  281 => 96,  279 => 95,  276 => 94,  270 => 92,  267 => 91,  264 => 90,  258 => 88,  255 => 87,  249 => 86,  241 => 84,  238 => 83,  233 => 82,  231 => 81,  226 => 79,  223 => 78,  220 => 77,  215 => 74,  212 => 73,  206 => 71,  204 => 70,  201 => 69,  195 => 67,  192 => 66,  189 => 65,  183 => 63,  180 => 62,  174 => 61,  166 => 59,  163 => 58,  158 => 57,  156 => 56,  151 => 54,  148 => 53,  146 => 52,  140 => 49,  136 => 47,  132 => 45,  129 => 44,  127 => 43,  125 => 42,  122 => 41,  118 => 39,  115 => 38,  113 => 37,  111 => 36,  108 => 35,  104 => 33,  101 => 32,  99 => 31,  97 => 30,  95 => 29,  91 => 28,  88 => 27,  84 => 25,  76 => 22,  72 => 21,  69 => 20,  66 => 19,  58 => 16,  54 => 15,  51 => 14,  48 => 13,  40 => 10,  36 => 9,  33 => 8,  31 => 7,  25 => 4,  21 => 2,  19 => 1,);
    }
}
