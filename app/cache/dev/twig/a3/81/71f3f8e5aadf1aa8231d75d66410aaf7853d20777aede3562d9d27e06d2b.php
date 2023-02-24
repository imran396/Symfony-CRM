<?php

/* IntranetBundle:FacebookAuth:notification.html.twig */
class __TwigTemplate_a38171f3f8e5aadf1aa8231d75d66410aaf7853d20777aede3562d9d27e06d2b extends Twig_Template
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
        echo "Hi,

die Facebook-Authetifizierung ist abgelaufen. Bitte erneut authentifizieren: 

<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : $this->getContext($context, "baseUrl")), "html", null, true);
        echo $this->env->getExtension('routing')->getPath("facebook_auth_path");
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["baseUrl"]) ? $context["baseUrl"] : $this->getContext($context, "baseUrl")), "html", null, true);
        echo $this->env->getExtension('routing')->getPath("facebook_auth_path");
        echo "</a>


";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:FacebookAuth:notification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,);
    }
}
