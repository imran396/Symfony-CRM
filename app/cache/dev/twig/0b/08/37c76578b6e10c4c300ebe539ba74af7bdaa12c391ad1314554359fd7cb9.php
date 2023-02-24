<?php

/* ::base.html.twig */
class __TwigTemplate_0b0837c76578b6e10c4c300ebe539ba74af7bdaa12c391ad1314554359fd7cb9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 9
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\" />
    <title>";
        // line 14
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 15
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
</head>
<body>
";
        // line 19
        $this->displayBlock('body', $context, $blocks);
        // line 20
        $this->displayBlock('javascripts', $context, $blocks);
        // line 21
        echo "</body>
</html>
";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 15
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
    }

    // line 20
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 20,  64 => 19,  59 => 15,  53 => 14,  47 => 21,  45 => 20,  43 => 19,  36 => 16,  34 => 15,  30 => 14,  23 => 9,);
    }
}
