<?php

/* IntranetBundle:Task:mailApproved.html.twig */
class __TwigTemplate_d6f54f1b48d811058806c666e2c56fa7e4ec21ff98c204831aa76caacdfc3bc1 extends Twig_Template
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
        echo "Hi ";
        echo twig_escape_filter($this->env, (isset($context["recipient"]) ? $context["recipient"] : $this->getContext($context, "recipient")), "html", null, true);
        echo ", 

der Auftrag ";
        // line 3
        echo twig_escape_filter($this->env, sprintf("AG%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "\" ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array())) {
            echo "von ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "name", array()), "html", null, true);
            echo " ";
        }
        echo "wurde durch ";
        echo twig_escape_filter($this->env, (isset($context["approver"]) ? $context["approver"] : $this->getContext($context, "approver")), "html", null, true);
        echo " freigegeben.

";
        // line 5
        if ((isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason"))) {
            // line 6
            echo twig_escape_filter($this->env, (isset($context["reason"]) ? $context["reason"] : $this->getContext($context, "reason")), "html", null, true);
            echo "
";
        }
        // line 8
        echo "
<a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:mailApproved.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  47 => 8,  42 => 6,  40 => 5,  25 => 3,  19 => 1,);
    }
}
