<?php

/* IntranetBundle:Form:fields.html.twig */
class __TwigTemplate_48277a5dabd39d8b8b40b525696452e7e73cd8acaf99d38f97a5423374d1c6b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'submit_widget' => array($this, 'block_submit_widget'),
            'form_start' => array($this, 'block_form_start'),
            'form_errors' => array($this, 'block_form_errors'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form_row', $context, $blocks);
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 17
        echo "

";
        // line 19
        $this->displayBlock('datetime_widget', $context, $blocks);
        // line 33
        echo "
";
        // line 34
        $this->displayBlock('submit_widget', $context, $blocks);
        // line 41
        echo "
";
        // line 42
        $this->displayBlock('form_start', $context, $blocks);
        // line 57
        echo "

";
        // line 59
        $this->displayBlock('form_errors', $context, $blocks);
        // line 72
        echo "
";
        // line 73
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 83
        echo "

";
        // line 86
        echo "
    ";
        // line 88
        echo "        ";
        // line 89
        echo "            ";
        // line 90
        echo "        ";
        // line 91
        echo "        ";
        // line 92
        echo "            ";
        // line 93
        echo "                ";
        // line 94
        echo "            ";
        // line 95
        echo "            ";
        // line 96
        echo "                ";
        // line 97
        echo "                ";
        // line 98
        echo "                ";
        // line 99
        echo "                    ";
        // line 100
        echo "                ";
        // line 101
        echo "            ";
        // line 102
        echo "            ";
        // line 103
        echo "            ";
        // line 104
        echo "        ";
        // line 105
        echo "    ";
        // line 107
        echo "
";
    }

    // line 1
    public function block_form_row($context, array $blocks = array())
    {
        // line 2
        echo "
    ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label');
        echo "
    ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget', twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("attr" => array("class" => ("input-xlarge" . (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? ((" " . $this->getAttribute((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), "class", array()))) : ("")))))));
        echo "

";
    }

    // line 9
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "        ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "text")) : ("text"));
        // line 12
        echo "
        <input type=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ((!twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\" ";
        }
        echo "/>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 19
    public function block_datetime_widget($context, array $blocks = array())
    {
        // line 20
        echo "    ";
        ob_start();
        // line 21
        echo "        ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 22
            echo "            ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
        ";
        } else {
            // line 24
            echo "            <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
                ";
            // line 25
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'errors');
            echo "
                ";
            // line 26
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time", array()), 'errors');
            echo "

                ";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time", array()), 'widget');
            echo "
            </div>
        ";
        }
        // line 31
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 34
    public function block_submit_widget($context, array $blocks = array())
    {
        // line 35
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (" btn btn-table-actions " . $this->getAttribute((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), "class", array()))));
        // line 36
        echo "    ";
        ob_start();
        // line 37
        echo "        ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "submit")) : ("submit"));
        // line 38
        echo "        ";
        $this->displayBlock("button_widget", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 42
    public function block_form_start($context, array $blocks = array())
    {
        // line 43
        echo "    ";
        ob_start();
        // line 44
        echo "        ";
        $context["method"] = twig_upper_filter($this->env, (isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")));
        // line 45
        echo "        ";
        if (twig_in_filter((isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), array(0 => "GET", 1 => "POST"))) {
            // line 46
            echo "            ";
            $context["form_method"] = (isset($context["method"]) ? $context["method"] : $this->getContext($context, "method"));
            // line 47
            echo "        ";
        } else {
            // line 48
            echo "            ";
            $context["form_method"] = "POST";
            // line 49
            echo "        ";
        }
        // line 50
        echo "        <form name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "name", array()), "html", null, true);
        echo "\"
              method=\"";
        // line 51
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["form_method"]) ? $context["form_method"] : $this->getContext($context, "form_method"))), "html", null, true);
        echo "\" action=\"";
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
        echo "\"";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        if ((isset($context["multipart"]) ? $context["multipart"] : $this->getContext($context, "multipart"))) {
            echo " enctype=\"multipart/form-data\"";
        }
        echo ">
        ";
        // line 52
        if (((isset($context["form_method"]) ? $context["form_method"] : $this->getContext($context, "form_method")) != (isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")))) {
            // line 53
            echo "            <input type=\"hidden\" name=\"_method\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["method"]) ? $context["method"] : $this->getContext($context, "method")), "html", null, true);
            echo "\"/>
        ";
        }
        // line 55
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_form_errors($context, array $blocks = array())
    {
        // line 60
        echo "    ";
        ob_start();
        // line 61
        echo "        ";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 62
            echo "            <div style=\"margin-top: 20px;\" class=\"alert alert-danger\">

                ";
            // line 64
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 65
                echo "                    <div>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "message", array()), "html", null, true);
                echo "</div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "
            </div>
        ";
        }
        // line 70
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 73
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 74
        echo "    ";
        ob_start();
        // line 75
        echo "        <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
            ";
        // line 76
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 77
            echo "                ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget');
            echo "
                ";
            // line 78
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'label', array("label_attr" => array("class" => "expandedNotMultipleLabel")));
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Form:fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  345 => 80,  337 => 78,  332 => 77,  328 => 76,  323 => 75,  320 => 74,  317 => 73,  312 => 70,  307 => 67,  298 => 65,  294 => 64,  290 => 62,  287 => 61,  284 => 60,  281 => 59,  276 => 55,  270 => 53,  268 => 52,  246 => 51,  241 => 50,  238 => 49,  235 => 48,  232 => 47,  229 => 46,  226 => 45,  223 => 44,  220 => 43,  217 => 42,  209 => 38,  206 => 37,  203 => 36,  200 => 35,  197 => 34,  192 => 31,  186 => 28,  181 => 26,  177 => 25,  172 => 24,  166 => 22,  163 => 21,  160 => 20,  157 => 19,  141 => 13,  138 => 12,  135 => 11,  132 => 10,  129 => 9,  122 => 5,  118 => 4,  114 => 3,  111 => 2,  108 => 1,  103 => 107,  101 => 105,  99 => 104,  97 => 103,  95 => 102,  93 => 101,  91 => 100,  89 => 99,  87 => 98,  85 => 97,  83 => 96,  81 => 95,  79 => 94,  77 => 93,  75 => 92,  73 => 91,  71 => 90,  69 => 89,  67 => 88,  64 => 86,  60 => 83,  58 => 73,  55 => 72,  53 => 59,  49 => 57,  47 => 42,  44 => 41,  42 => 34,  39 => 33,  37 => 19,  33 => 17,  31 => 9,  28 => 8,  26 => 1,);
    }
}
