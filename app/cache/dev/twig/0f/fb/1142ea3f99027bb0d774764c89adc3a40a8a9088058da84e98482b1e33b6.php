<?php

/* IntranetBundle:EnumValue:show.html.twig */
class __TwigTemplate_0ffb1142ea3f99027bb0d774764c89adc3a40a8a9088058da84e98482b1e33b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Enum Value", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                      <tbody>
            <tr>
                <th>Classname</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "className", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Value</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "value", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Reusable</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "reusable", array())), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
                </table>

                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enumvalue_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 33
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 34
        echo "                    </a>
                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:EnumValue:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 34,  76 => 33,  72 => 32,  61 => 24,  54 => 20,  47 => 16,  37 => 9,  31 => 5,  28 => 4,);
    }
}
