<?php

/* IntranetBundle:Macroses:citiesMacro.html.twig */
class __TwigTemplate_0bddd03463b6336a292056aa2022ba594e7162c4974fa21fb779c1907e3ed1c4 extends Twig_Template
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
    public function getcitiesList($__cities__ = null, $__contactId__ = null, $__addCityForm__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "cities" => $__cities__,
            "contactId" => $__contactId__,
            "addCityForm" => $__addCityForm__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
  <div class=\"row-fluid\">
    <div class=\"block\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#cityewidget\">";
            // line 5
            echo $this->env->getExtension('translator')->getTranslator()->trans("Cities", array(), "messages");
            echo "</div>
        <div class=\"block-body\" id=\"cityewidget\" class=\"block-body collapse in\">
        ";
            // line 7
            if (twig_length_filter($this->env, (isset($context["cities"]) ? $context["cities"] : $this->getContext($context, "cities")))) {
                // line 8
                echo "            <table class=\"table\" >
              <thead>
                <tr>
                    <th>";
                // line 11
                echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
                echo "</th>
                </tr>
              </thead>
                <tbody>
                ";
                // line 15
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["cities"]) ? $context["cities"] : $this->getContext($context, "cities")));
                foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
                    // line 16
                    echo "                    <tr>
                        <td>";
                    // line 17
                    echo twig_escape_filter($this->env, $this->getAttribute($context["city"], "name", array()), "html", null, true);
                    echo "</td>
                        ";
                    // line 18
                    if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
                        // line 19
                        echo "                            <td><a onclick=\"return confirm('Are you sure?')\" class=\"btn btn-table-actions\"
                                   href=\"";
                        // line 20
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("city_contact_delete", array("id" => $this->getAttribute($context["city"], "id", array()), "contactId" => (isset($context["contactId"]) ? $context["contactId"] : $this->getContext($context, "contactId")))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("Delete", array(), "messages");
                        echo "</a>
                       <a class = \"btn btn-table-actions\"  href=\"";
                        // line 21
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("city_show", array("id" => $this->getAttribute($context["city"], "id", array()))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                        echo "</a></td>
                        ";
                    }
                    // line 23
                    echo "                    </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "                </tbody>
            </table>
        ";
            }
            // line 28
            echo "
            <div id=\"cityContactForm\" style=\"display: none\">
                <div id=\"addCity\">
                    ";
            // line 31
            if ((isset($context["addCityForm"]) ? $context["addCityForm"] : $this->getContext($context, "addCityForm"))) {
                // line 32
                echo "                     ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["addCityForm"]) ? $context["addCityForm"] : $this->getContext($context, "addCityForm")), 'form');
                echo "
            ";
            }
            // line 34
            echo "                </div>
            </div>
            <a class=\"btn btn-table-actions\" href=\"javascript:void(0);\" id=\"cityContact\">";
            // line 36
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add City", array(), "messages");
            echo "</a>
        </div>


        </div>
    </div>

";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:citiesMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 36,  112 => 34,  106 => 32,  104 => 31,  99 => 28,  94 => 25,  87 => 23,  80 => 21,  74 => 20,  71 => 19,  69 => 18,  65 => 17,  62 => 16,  58 => 15,  51 => 11,  46 => 8,  44 => 7,  39 => 5,  34 => 2,  21 => 1,);
    }
}
