<?php

/* IntranetBundle:Note:mailNotify.html.twig */
class __TwigTemplate_892908d3e83181eb858aab3551065bc261c73a316554432d600c59bf1cdf838b extends Twig_Template
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
        echo "Dear ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "displayName", array()), "html", null, true);
        echo ",

This email is to notify you about a note that was created for task \"<a href=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["link_task"]) ? $context["link_task"] : $this->getContext($context, "link_task")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["task"]) ? $context["task"] : $this->getContext($context, "task")), "html", null, true);
        echo "</a>\".

Click <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["link_note"]) ? $context["link_note"] : $this->getContext($context, "link_note")), "html", null, true);
        echo "\">here</a> to view the note.

Thanks,
Beon Communication
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:mailNotify.html.twig";
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
