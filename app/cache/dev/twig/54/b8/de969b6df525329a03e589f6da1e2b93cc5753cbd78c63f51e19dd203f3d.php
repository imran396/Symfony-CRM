<?php

/* IntranetBundle:MonitoredUrl:indexTabPaneMacro.html.twig */
class __TwigTemplate_54b8de969b6df525329a03e589f6da1e2b93cc5753cbd78c63f51e19dd203f3d extends Twig_Template
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
            $this->env->loadTemplate("IntranetBundle:MonitoredUrl:indexTable.html.twig")->display($context);
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
        return "IntranetBundle:MonitoredUrl:indexTabPaneMacro.html.twig";
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
