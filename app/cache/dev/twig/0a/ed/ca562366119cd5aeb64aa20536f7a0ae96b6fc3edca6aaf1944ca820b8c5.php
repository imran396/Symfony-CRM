<?php

/* IntranetBundle:Dashboard:_fblog.html.twig */
class __TwigTemplate_0aedca562366119cd5aeb64aa20536f7a0ae96b6fc3edca6aaf1944ca820b8c5 extends Twig_Template
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
        echo "
  <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\"> ";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Fans", array(), "messages");
        echo "</div>

\t\t     <div style=\"height: 400px; width: 97%; margin: 1em\" id=\"facebookLog\" class=\"demo-placeholder\"></div>

 </div>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Dashboard:_fblog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
