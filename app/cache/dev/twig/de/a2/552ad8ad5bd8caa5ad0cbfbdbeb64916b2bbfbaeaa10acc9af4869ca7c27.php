<?php

/* IntranetBundle:Macroses:logsMacro.html.twig */
class __TwigTemplate_dea2552ad8ad5bd8caa5ad0cbfbdbeb64916b2bbfbaeaa10acc9af4869ca7c27 extends Twig_Template
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
    public function gettemplate($__entities__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))) > 0)) {
                // line 3
                echo "    <div class=\"row-fluid\">
        <div class=\"block span12\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablelogwidget\">";
                // line 5
                echo $this->env->getExtension('translator')->getTranslator()->trans("Approval logs", array(), "messages");
                echo "</div>
            <div id=\"tablelogwidget\" class=\"block-body collapse in\">
            <table id=\"indexTable\" class=\"table\">
                <thead>
                <tr>
                    <th>";
                // line 10
                echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
                echo "</th>
                    <th>";
                // line 11
                echo $this->env->getExtension('translator')->getTranslator()->trans("Action", array(), "messages");
                echo "</th>
                    <th>";
                // line 12
                echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
                echo "</th>
                </tr>
                </thead>

                <tbody>
                ";
                // line 17
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
                foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                    // line 18
                    echo "                    <tr>
                        <td>";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
                    echo "</td>
                        <td>";
                    // line 20
                    echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->logActionFilter($context["entity"]), "html", null, true);
                    echo "</td>
                        <td>";
                    // line 21
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "createdAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
                    echo "</td>
                    </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 24
                echo "                </tbody>
            </table>
            </div>
        </div>
    </div>
";
            }
            // line 30
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
        return "IntranetBundle:Macroses:logsMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 30,  87 => 24,  78 => 21,  74 => 20,  70 => 19,  67 => 18,  63 => 17,  55 => 12,  51 => 11,  47 => 10,  39 => 5,  35 => 3,  32 => 2,  21 => 1,);
    }
}
