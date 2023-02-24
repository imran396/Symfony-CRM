<?php

/* IntranetBundle:UserCustomerFilter:filter.html.twig */
class __TwigTemplate_ab5fa3875cdc40f9a1e58f3928870a9ceb30c2dad26aeae28e160a714286cef8 extends Twig_Template
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
        echo "<div class=\"btn-group\">
  ";
        // line 2
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), 'form_start', array("attr" => array("id" => "userFilter")));
        echo "
  ";
        // line 3
        if ($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : null), "user", array(), "any", true, true)) {
            // line 4
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "user", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a user"))));
            echo "
  ";
        }
        // line 6
        echo "  ";
        if ($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : null), "stakeholder", array(), "any", true, true)) {
            // line 7
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "stakeholder", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a stakeholder"))));
            echo "
  ";
        }
        // line 9
        echo "  ";
        if ($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : null), "city", array(), "any", true, true)) {
            // line 10
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "city", array()), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select a city"))));
            echo "
  ";
        }
        // line 12
        echo "  ";
        if ($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : null), "supplierType", array(), "any", true, true)) {
            // line 13
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "supplierType", array()), 'widget');
            echo "
  ";
        }
        // line 15
        echo "  ";
        if ($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : null), "noteType", array(), "any", true, true)) {
            // line 16
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "noteType", array()), 'widget');
            echo "
  ";
        }
        // line 18
        echo "  ";
        if ($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : null), "plainText", array(), "any", true, true)) {
            // line 19
            echo "    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "plainText", array()), 'widget');
            echo "
  ";
        }
        // line 21
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "submit", array()), 'widget');
        echo "
  ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), "clear", array()), 'widget');
        echo "
  ";
        // line 23
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["userChoiceForm"]) ? $context["userChoiceForm"] : $this->getContext($context, "userChoiceForm")), 'form_end');
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:UserCustomerFilter:filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 23,  84 => 22,  79 => 21,  73 => 19,  70 => 18,  64 => 16,  61 => 15,  55 => 13,  52 => 12,  46 => 10,  43 => 9,  37 => 7,  34 => 6,  28 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
