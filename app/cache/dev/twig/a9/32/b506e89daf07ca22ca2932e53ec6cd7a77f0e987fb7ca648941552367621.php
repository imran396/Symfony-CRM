<?php

/* IntranetBundle:BudgetPeriod:index.html.twig */
class __TwigTemplate_a932b506e89daf07ca22ca2932e53ec6cd7a77f0e987fb7ca648941552367621 extends Twig_Template
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
        echo "

    ";
        // line 6
        $context["list"] = $this->env->loadTemplate("IntranetBundle:Macroses:budgetPeriodMacro.html.twig");
        // line 7
        echo "    ";
        echo $context["list"]->getbudgetList((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), true, (isset($context["addBudgetWithForm"]) ? $context["addBudgetWithForm"] : $this->getContext($context, "addBudgetWithForm")));
        echo "

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:BudgetPeriod:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  35 => 6,  31 => 4,  28 => 3,);
    }
}
