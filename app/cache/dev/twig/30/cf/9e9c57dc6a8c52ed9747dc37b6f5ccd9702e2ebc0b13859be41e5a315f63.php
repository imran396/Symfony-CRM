<?php

/* IntranetBundle:TimeTrackReport:export.html.twig */
class __TwigTemplate_30cf9e9c57dc6a8c52ed9747dc37b6f5ccd9702e2ebc0b13859be41e5a315f63 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Username", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Beteiligter", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Day", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Hours", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Note", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Tariff", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Price", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Task", array(), "messages");
        echo ";";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
        // line 2
        echo "
";
        // line 3
        if ((isset($context["timeTrackingEntity"]) ? $context["timeTrackingEntity"] : $this->getContext($context, "timeTrackingEntity"))) {
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["timeTrackingEntity"]);
            foreach ($context['_seq'] as $context["_key"] => $context["timeTrackingEntity"]) {
                // line 5
                echo twig_escape_filter($this->env, $this->getAttribute($context["timeTrackingEntity"], "id", array()), "html", null, true);
                echo ";\"";
                if ($this->getAttribute($context["timeTrackingEntity"], "user", array())) {
                    echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->getAttribute($this->getAttribute($context["timeTrackingEntity"], "user", array()), "displayName", array()));
                }
                echo "\";\"";
                if ($this->getAttribute($context["timeTrackingEntity"], "parentCustomer", array())) {
                    echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->getAttribute($this->getAttribute($context["timeTrackingEntity"], "parentCustomer", array()), "name", array()));
                }
                echo "\";\"";
                if ($this->getAttribute($context["timeTrackingEntity"], "customer", array())) {
                    echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->getAttribute($this->getAttribute($context["timeTrackingEntity"], "customer", array()), "name", array()));
                }
                echo "\";";
                echo twig_date_format_filter($this->env, $this->getAttribute($context["timeTrackingEntity"], "day", array()), "Y-m-d");
                echo ";\"";
                echo strtr($this->getAttribute($context["timeTrackingEntity"], "hours", array()), ".", ",");
                echo "\";\"";
                echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->getAttribute($context["timeTrackingEntity"], "note", array()));
                echo "\";\"";
                echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->env->getExtension('beon_extension')->ttTariffFilter($this->getAttribute($context["timeTrackingEntity"], "tariff", array())));
                echo "\";";
                echo $this->env->getExtension('beon_extension')->ttRateFilter($this->getAttribute($context["timeTrackingEntity"], "tariff", array()));
                echo ";\"";
                echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->getAttribute($context["timeTrackingEntity"], "task", array()));
                echo "\";\"";
                echo $this->env->getExtension('beon_extension')->excelCompatFilter($this->getAttribute($context["timeTrackingEntity"], "campaign", array()));
                echo "\"
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timeTrackingEntity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:TimeTrackReport:export.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 5,  46 => 4,  44 => 3,  41 => 2,  19 => 1,);
    }
}
