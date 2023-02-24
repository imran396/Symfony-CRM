<?php

/* IntranetBundle:Macroses:stakeHolderChildrenMacro.html.twig */
class __TwigTemplate_aa04bd51ab440b4b2134dbc6a7176a3abc1050a269248b30407b3723aa4defb9 extends Twig_Template
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
    public function getentitiesIndex($__entities__ = null, $__parentLevel__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "parentLevel" => $__parentLevel__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <div class=\"block\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
            // line 3
            echo twig_escape_filter($this->env, (isset($context["parentLevel"]) ? $context["parentLevel"] : $this->getContext($context, "parentLevel")), "html", null, true);
            echo "</div>
        <div class=\"block-body\">
            <table class=\"table\">
                <thead>
                <tr>

                    <th>";
            // line 9
            echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
            echo "</th>
                    <th>";
            // line 10
            echo $this->env->getExtension('translator')->getTranslator()->trans("Address", array(), "messages");
            echo "</th>
                    <th>";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
            echo "</th>
                </tr>
                </thead>
                <tbody>

                ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 17
                echo "                    <tr>
                        <td>";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "name", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "address", array()), "html", null, true);
                echo "</td>
                        <td>
                            <a class=\"btn btn-table-actions\"
                               href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
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
            // line 27
            echo "                </tbody>
            </table>
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
        return "IntranetBundle:Macroses:stakeHolderChildrenMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 27,  78 => 22,  72 => 19,  68 => 18,  65 => 17,  61 => 16,  53 => 11,  49 => 10,  45 => 9,  36 => 3,  33 => 2,  21 => 1,);
    }
}
