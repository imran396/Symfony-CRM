<?php

/* IntranetBundle:Customer:entitiesMacro.html.twig */
class __TwigTemplate_be0aa0a2cf55009a80c7b2e2d62b750899d75aa7355df33c22f1b1c8222456d6 extends Twig_Template
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
    }

    // line 1
    public function getentitiesIndex($__entities__ = null, $__level__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "level" => $__level__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <table class=\"table\">
        <thead>
        <tr>
            ";
            // line 6
            if ((((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 2) || ((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 4))) {
                // line 7
                echo "            <th>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
                echo "</th>
            ";
            } elseif (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) > 2)) {
                // line 9
                echo "            <th>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
                echo "</th>
            ";
            }
            // line 11
            echo "            <th>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
            echo "</th>
            ";
            // line 12
            if (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 2)) {
                // line 13
                echo "            <th>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Address", array(), "messages");
                echo "</th>
            ";
            }
            // line 15
            echo "            ";
            if (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 4)) {
                // line 16
                echo "            <th>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Discount info", array(), "messages");
                echo "</th>
            ";
            }
            // line 18
            echo "            <th>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
            echo "</th>
        </tr>
        </thead>
        <tbody>

        ";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 24
                echo "            <tr>
                ";
                // line 25
                if (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 2)) {
                    // line 26
                    echo "                <td style=\"width: 80px;\">";
                    echo twig_escape_filter($this->env, sprintf("KU%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
                    echo "</td>
                ";
                } elseif (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 4)) {
                    // line 28
                    echo "                <td style=\"width: 80px;\">";
                    echo twig_escape_filter($this->env, sprintf("KO%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
                    echo "</td>
                ";
                } elseif (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) > 2)) {
                    // line 30
                    echo "                <td>";
                    echo twig_escape_filter($this->env, ((($this->getAttribute($context["entity"], "parent", array()) && $this->getAttribute($this->getAttribute($context["entity"], "parent", array()), "name", array()))) ? ($this->getAttribute($this->getAttribute($context["entity"], "parent", array()), "name", array())) : ("None")), "html", null, true);
                    echo "</td>
                ";
                }
                // line 32
                echo "                <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
                echo "</td>
                ";
                // line 33
                if (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 2)) {
                    // line 34
                    echo "                <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "address", array()), "html", null, true);
                    echo "</td>
                ";
                }
                // line 36
                echo "                ";
                if (((isset($context["level"]) ? $context["level"] : $this->getContext($context, "level")) == 4)) {
                    // line 37
                    echo "                <td>";
                    echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($context["entity"], "discountInfo", array()), 30), "html", null, true);
                    echo "</td>
                ";
                }
                // line 39
                echo "                <td>
                    <a class=\"btn btn-table-actions\"
                       href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                echo "</a>
                    ";
                // line 42
                if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
                    // line 43
                    echo "                        <a class=\"btn btn-table-actions\"
                           href=\"";
                    // line 44
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
                    echo "</a>
                    ";
                }
                // line 46
                echo "                </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "        </tbody>
    </table>

";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:entitiesMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 49,  155 => 46,  148 => 44,  145 => 43,  143 => 42,  137 => 41,  133 => 39,  127 => 37,  124 => 36,  118 => 34,  116 => 33,  111 => 32,  105 => 30,  99 => 28,  93 => 26,  91 => 25,  88 => 24,  84 => 23,  75 => 18,  69 => 16,  66 => 15,  60 => 13,  58 => 12,  53 => 11,  47 => 9,  41 => 7,  39 => 6,  33 => 2,  21 => 1,);
    }
}
