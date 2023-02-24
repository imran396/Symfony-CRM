<?php

/* IntranetBundle:Campaign:mailExternalUpload.html.twig */
class __TwigTemplate_1ce6400e1067adfba3986eea45f0924a5dedcf95f8bc55010c6f75afa99c2138 extends Twig_Template
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
        echo "<p>Sehr geehrte Damen und Herren,</p>
<p>bitte laden Sie Ihre Rechnung adressiert an die unten genannte Rechnungsadresse unter diesem <a target=\"_blank\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["externalUploadUrl"]) ? $context["externalUploadUrl"] : $this->getContext($context, "externalUploadUrl")), "html", null, true);
        echo "\">link</a> hoch. Bitte geben Sie auf der Rechnung die Bestellnummer sowie den Namen des Betriebes an. Bitte senden Sie uns ebenfalls über diesen Link Belegexemplare als PDF oder JPEG.</p>
";
        // line 3
        $this->env->loadTemplate("IntranetBundle:Campaign:showTable.html.twig")->display($context);
        // line 4
        echo "<p>Vielen Dank für Ihre Unterstützung.</p>
<p>";
        // line 5
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true));
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:mailExternalUpload.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  28 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
