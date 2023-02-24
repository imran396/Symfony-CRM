<?php

/* IntranetBundle:Dashboard:_unifiedlist.html.twig */
class __TwigTemplate_3584abb2022347253cc3727976d2d1bbd9a92ea2eac0ca6f1e5940f8e859a669 extends Twig_Template
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
        echo "<div class=\"block \">

    <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("Timeline", array(), "messages");
        echo "</div>
    <div id=\"tablewidget\" class=\"block-body collapse in\">


        <table class=\"table\">
            <thead>
            <tr>
                <th>";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
        echo "</th>
                <th>";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
        echo "</th>
                <th>";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Approved", array(), "messages");
        echo "</th>
                <th>";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
                <th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Action", array(), "messages");
        echo "</th>
            </tr>

            </thead>
            <tbody>

            ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["unifiedData"]) ? $context["unifiedData"] : $this->getContext($context, "unifiedData")));
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
        foreach ($context['_seq'] as $context["key"] => $context["entity"]) {
            // line 21
            echo "
                ";
            // line 22
            if ($this->getAttribute($context["entity"], "campaign", array(), "any", true, true)) {
                // line 23
                echo "                    ";
                $context["type"] = "campaign";
                // line 24
                echo "                    ";
                $context["path_url"] = "campaign_show";
                // line 25
                echo "                    ";
                $context["todo"] = ((!$this->getAttribute($context["entity"], "approved", array())) && $this->getAttribute($context["entity"], "approvalmailsent", array()));
                // line 26
                echo "                ";
            } elseif ($this->getAttribute($context["entity"], "note", array(), "any", true, true)) {
                // line 27
                echo "                    ";
                $context["type"] = "note";
                // line 28
                echo "                    ";
                $context["path_url"] = "note_show";
                // line 29
                echo "                    ";
                $context["todo"] = false;
                // line 30
                echo "                ";
            } elseif ($this->getAttribute($context["entity"], "press", array(), "any", true, true)) {
                // line 31
                echo "                    ";
                $context["type"] = "pressrelease";
                // line 32
                echo "                    ";
                $context["path_url"] = "pressrelease_show";
                // line 33
                echo "                    ";
                $context["todo"] = ((!$this->getAttribute($context["entity"], "approved", array())) && $this->getAttribute($context["entity"], "approvalmailsent", array()));
                // line 34
                echo "
                ";
            } elseif ($this->getAttribute($context["entity"], "task", array(), "any", true, true)) {
                // line 36
                echo "                    ";
                $context["type"] = "task";
                // line 37
                echo "                    ";
                $context["path_url"] = "task_show";
                // line 38
                echo "                    ";
                $context["todo"] = ((!$this->getAttribute($context["entity"], "approved", array())) && $this->getAttribute($context["entity"], "approvalmailsent", array()));
                // line 39
                echo "                ";
            }
            // line 40
            echo "
                ";
            // line 41
            if (($this->env->getExtension('security')->isGranted("ROLE_NOTES_INTERNAL") || (!($this->getAttribute($context["entity"], "internalUseOnly", array(), "any", true, true) && ($this->getAttribute($context["entity"], "internalUseOnly", array()) == true))))) {
                // line 42
                echo "                    ";
                $this->env->loadTemplate("IntranetBundle:Dashboard:_unifiedlistChunk.html.twig")->display($context);
                // line 43
                echo "                ";
            }
            // line 44
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "
            </tbody>

        </table>


    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Dashboard:_unifiedlist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 46,  140 => 44,  137 => 43,  134 => 42,  132 => 41,  129 => 40,  126 => 39,  123 => 38,  120 => 37,  117 => 36,  113 => 34,  110 => 33,  107 => 32,  104 => 31,  101 => 30,  98 => 29,  95 => 28,  92 => 27,  89 => 26,  86 => 25,  83 => 24,  80 => 23,  78 => 22,  75 => 21,  58 => 20,  49 => 14,  45 => 13,  41 => 12,  37 => 11,  33 => 10,  23 => 3,  19 => 1,);
    }
}
