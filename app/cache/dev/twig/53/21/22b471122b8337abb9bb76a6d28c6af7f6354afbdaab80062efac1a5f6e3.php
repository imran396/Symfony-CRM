<?php

/* IntranetBundle:Campaign:mailApproved.html.twig */
class __TwigTemplate_532122b471122b8337abb9bb76a6d28c6af7f6354afbdaab80062efac1a5f6e3 extends Twig_Template
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

die Kampagne \"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
        echo "\" wurde von ";
        echo twig_escape_filter($this->env, (isset($context["approver"]) ? $context["approver"] : $this->getContext($context, "approver")), "html", null, true);
        echo " freigegeben.

<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:mailApproved.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 5,  25 => 3,  19 => 1,);
    }
}
