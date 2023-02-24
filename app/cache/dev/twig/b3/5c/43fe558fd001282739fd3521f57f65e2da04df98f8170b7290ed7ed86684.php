<?php

/* IntranetBundle:Customer:listChunk.html.twig */
class __TwigTemplate_b35c43fe558fd001282739fd3521f57f65e2da04df98f8170b7290ed7ed86684 extends Twig_Template
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
";
        // line 2
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customers", array()))) {
            // line 3
            echo "
    ";
            // line 4
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customers", array());
            // line 5
            echo "
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 8
            echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
            // line 11
            $this->env->loadTemplate("IntranetBundle:Customer:listChunk.html.twig", "737587207")->display($context);
            // line 19
            echo "                </div>
            </div>
        </div>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 19,  40 => 11,  34 => 8,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}


/* IntranetBundle:Customer:listChunk.html.twig */
class __TwigTemplate_b35c43fe558fd001282739fd3521f57f65e2da04df98f8170b7290ed7ed86684_737587207 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Customer:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Customer:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 13
        echo "                            <td>
                                <a class=\"btn btn-table-actions\"
                                   href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                            </td>
                        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 15,  96 => 13,  93 => 12,  42 => 19,  40 => 11,  34 => 8,  29 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
