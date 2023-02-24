<?php

/* IntranetBundle:ExcelImport:select.html.twig */
class __TwigTemplate_272e9268573e1d7c307857623e26bd20544414f050ffb7ea914a87b281794b96 extends Twig_Template
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
        echo "    ";
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 5
        echo "    
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">Excel import</div>
            
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 11
        if ((isset($context["unmatchedRows"]) ? $context["unmatchedRows"] : $this->getContext($context, "unmatchedRows"))) {
            // line 12
            echo "                    <h2>Achtung! Die folgenden Betrieb konnten nicht zugeordnet werden.</h2>
                    <ul>
                    ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["unmatchedRows"]) ? $context["unmatchedRows"] : $this->getContext($context, "unmatchedRows")));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 15
                echo "                        <li>";
                echo twig_escape_filter($this->env, $context["row"], "html", null, true);
                echo "</li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "                    </ul>
                    <p>Diese Betriebe werden im folgenden vollkommen ignoriert. Gegebenfalls Datei erneut hochladen.</p>
                ";
        }
        // line 20
        echo "                
                ";
        // line 21
        if ((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output"))) {
            // line 22
            echo "                    <h2>";
            if ((isset($context["done"]) ? $context["done"] : $this->getContext($context, "done"))) {
                echo "Ergebnis";
            } else {
                echo "Testlauf";
            }
            echo "</h2>
                    <ul>
                    ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 25
                echo "                        <li>
                            ";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "task", array()), "html", null, true);
                echo "
                            <ul>
                            ";
                // line 28
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "actions", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 29
                    echo "                                <li>
                                    ";
                    // line 30
                    echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "stakeholder", array()), "html", null, true);
                    echo "
                                    <ul>
                                        ";
                    // line 32
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "out", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["out"]) {
                        // line 33
                        echo "                                            <li>";
                        echo nl2br(twig_escape_filter($this->env, $context["out"], "html", null, true));
                        echo "</li>
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['out'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 35
                    echo "                                    </ul>
                                </li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                            </ul>
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                    </ul>
                ";
        }
        // line 43
        echo "                
                ";
        // line 44
        if ((!(isset($context["done"]) ? $context["done"] : $this->getContext($context, "done")))) {
            // line 45
            echo "                    <h2>Zuordnung</h2>
                    ";
            // line 46
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
            echo "
                ";
        }
        // line 48
        echo "            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:ExcelImport:select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 48,  146 => 46,  143 => 45,  141 => 44,  138 => 43,  134 => 41,  126 => 38,  118 => 35,  109 => 33,  105 => 32,  100 => 30,  97 => 29,  93 => 28,  88 => 26,  85 => 25,  81 => 24,  71 => 22,  69 => 21,  66 => 20,  61 => 17,  52 => 15,  48 => 14,  44 => 12,  42 => 11,  34 => 5,  31 => 4,  28 => 3,);
    }
}
