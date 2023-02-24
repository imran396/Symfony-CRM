<?php

/* IntranetBundle:ConfigValue:show.html.twig */
class __TwigTemplate_22e47ed373c7fe716a870d93dbfac0165eff57793392925e74ec13bf3ff805c0 extends Twig_Template
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Config", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                     <table class=\"table table-bordered\">
                        <tbody>
                        <tr>
                            <th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Description", array(), "messages");
        echo "</th>
                            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "description", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Value", array(), "messages");
        echo "</th>
                            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "value", array()), "html", null, true);
        echo "</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("configvalue_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 29
        echo "                    </a>
                    ";
        // line 30
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
            </div>
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:ConfigValue:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 30,  77 => 29,  75 => 28,  71 => 27,  60 => 19,  56 => 18,  50 => 15,  46 => 14,  37 => 8,  31 => 4,  28 => 3,);
    }
}
