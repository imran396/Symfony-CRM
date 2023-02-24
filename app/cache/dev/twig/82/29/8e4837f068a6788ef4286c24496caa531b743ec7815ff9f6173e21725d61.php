<?php

/* IntranetBundle:Campaign:modalForm.html.twig */
class __TwigTemplate_82298e4837f068a6788ef4286c24496caa531b743ec7815ff9f6173e21725d61 extends Twig_Template
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
        echo "<div class=\"modal small hide fade\" id=\"changeAudienceSizeConfirm\" tabindex=\"-1\" role=\"dialog\"
     aria-labelledby=\"myModalLabel\"
     aria-hidden=\"true\" style=\"display: none;\">
    <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
        <h3 id=\"modalLabel\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign audience size", array(), "messages");
        echo "</h3>
    </div>
    <div class=\"modal-body\">

        <p class=\"error-text\"><i class=\"icon-warning-sign modal-icon\"></i>";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("Do you want to prepopulate audience size from choosen supplier?", array(), "messages");
        echo "</p>
    </div>
    <div class=\"modal-footer\">
        <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("No", array(), "messages");
        echo "</button>
        <button class=\"btn btn-danger\" data-dismiss=\"changeAudienceSizeAction\">";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Yes", array(), "messages");
        echo "</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:modalForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 14,  39 => 13,  33 => 10,  26 => 6,  19 => 1,);
    }
}
