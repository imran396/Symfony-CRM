<?php

/* IntranetBundle:Campaign:mailConfirmation.html.twig */
class __TwigTemplate_a89f492be4442ca28b0c76f3985fdb9335dccf55e79255e65c8739902082a6c7 extends Twig_Template
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
        echo "<p>Sehr geehrte Damen und Herren,</p><p>hiermit bestellen wir folgende Leistung:</p>
";
        // line 2
        $this->env->loadTemplate("IntranetBundle:Campaign:showTable.html.twig")->display($context);
        // line 3
        echo "<p>Bitte laden Sie Ihre Rechnung adressiert an die oben genannte Rechnungsadresse unter diesem <a target=\"_blank\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["externalUploadUrl"]) ? $context["externalUploadUrl"] : $this->getContext($context, "externalUploadUrl")), "html", null, true);
        echo "\">link</a> hoch. Bitte geben Sie auf der Rechnung die Bestellnummer sowie den Namen des Betriebes an. Bitte senden Sie uns ebenfalls über diesen Link Belegexemplare als PDF oder JPEG.</p>
<p>Wir freuen uns auf eine gute Zusammenarbeit.</p>
<p>";
        // line 5
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["sender"]) ? $context["sender"] : $this->getContext($context, "sender")), "getClosing", array(), "method"), "html", null, true));
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:mailConfirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
