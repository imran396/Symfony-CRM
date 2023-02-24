<?php

/* IntranetBundle:Macroses:customerFacebookUrlMacro.html.twig */
class __TwigTemplate_ded18bdfe6fe0fe1e8a7dc6f08c89409ae678c1bd5f454b221aff8c3dc4997c3 extends Twig_Template
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
    public function getfbUrlList($__entities__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if (twig_length_filter($this->env, (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")))) {
                // line 3
                echo "        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
                // line 4
                echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
                echo "</div>
            <div class=\"block-body\">
                <table id=\"indexTable\" class=\"table\">
                    <thead>
                    <tr>
                        <th>";
                // line 9
                echo $this->env->getExtension('translator')->getTranslator()->trans("Url", array(), "messages");
                echo "</th>
                        <th>";
                // line 10
                echo $this->env->getExtension('translator')->getTranslator()->trans("Alias", array(), "messages");
                echo "</th>
                        <th>";
                // line 11
                echo $this->env->getExtension('translator')->getTranslator()->trans("Last post date", array(), "messages");
                echo "</th>
                        <th>";
                // line 12
                echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
                echo "</th>

                    </tr>
                    </thead>
                    <tbody>
                ";
                // line 17
                if ($this->getAttribute((isset($context["entities"]) ? $context["entities"] : null), "customer", array(), "any", true, true)) {
                    // line 18
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "customer", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                        // line 19
                        echo "

                        <tr>
                            <td>";
                        // line 22
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "facebook", array()), "facebookUrl", array()), "url", array()), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 23
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "facebook", array()), "facebookUrl", array()), "alias", array()), "html", null, true);
                        echo "</td>
                            <td>";
                        // line 24
                        if ($this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "facebook", array()), "facebookUrl", array()), "lastPost", array())) {
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "facebook", array()), "facebookUrl", array()), "lastPost", array()), "d.m.Y H:i"), "html", null, true);
                        }
                        echo "</td>

                            <td>
                                <a class=\"btn btn-table-actions\"
                                   href=\"";
                        // line 28
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("facebookurl_show", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "facebook", array()), "facebookUrl", array()), "id", array()))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                        echo "</a>
                            </td>

                        </tr>

                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 34
                    echo "                ";
                }
                // line 35
                echo "                    </tbody>
                </table>
                ";
                // line 37
                if ($this->getAttribute((isset($context["entities"]) ? $context["entities"] : null), "message", array(), "any", true, true)) {
                    // line 38
                    echo "                    <p style=\"font-size: 15px; font-weight: bold; border-bottom: 1px solid #DDD\">";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Last post", array(), "messages");
                    echo "</p>
                    <div>";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "message", array()), "html", null, true);
                    echo "</div>
                ";
                }
                // line 41
                echo "            </div>
        </div>
    ";
            }
            // line 44
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:customerFacebookUrlMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 44,  128 => 41,  123 => 39,  118 => 38,  116 => 37,  112 => 35,  109 => 34,  95 => 28,  86 => 24,  82 => 23,  78 => 22,  73 => 19,  68 => 18,  66 => 17,  58 => 12,  54 => 11,  50 => 10,  46 => 9,  38 => 4,  35 => 3,  32 => 2,  21 => 1,);
    }
}
