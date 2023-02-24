<?php

/* IntranetBundle:Complaint:indexTabPaneMacro.html.twig */
class __TwigTemplate_5734b0c3447d3ef9df2f435fbfb119f8cb964e60ef8b0fedc4852aa4e0061489 extends Twig_Template
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
    public function getpane($__entities__ = null, $__paneid__ = null, $__paneclass__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "paneid" => $__paneid__,
            "paneclass" => $__paneclass__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"tab-pane ";
            // line 3
            echo twig_escape_filter($this->env, (isset($context["paneclass"]) ? $context["paneclass"] : $this->getContext($context, "paneclass")), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, (isset($context["paneid"]) ? $context["paneid"] : $this->getContext($context, "paneid")), "html", null, true);
            echo "\">
        ";
            // line 4
            $this->env->loadTemplate("IntranetBundle:Complaint:indexTable.html.twig")->display($context);
            // line 5
            echo "    </div>

";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:indexTabPaneMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 5,  43 => 4,  37 => 3,  34 => 2,  21 => 1,);
    }
}
