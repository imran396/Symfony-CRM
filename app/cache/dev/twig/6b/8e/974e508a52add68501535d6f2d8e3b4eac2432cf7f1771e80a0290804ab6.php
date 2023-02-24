<?php

/* IntranetBundle:Supplier:listChunk.html.twig */
class __TwigTemplate_6b8e974e508a52add68501535d6f2d8e3b4eac2432cf7f1771e80a0290804ab6 extends Twig_Template
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
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "suppliers", array()))) {
            // line 3
            echo "
    ";
            // line 4
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "suppliers", array());
            // line 5
            echo "
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 8
            echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier", array(), "messages");
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
            // line 11
            $this->env->loadTemplate("IntranetBundle:Supplier:listChunk.html.twig", "1933757703")->display($context);
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
        return "IntranetBundle:Supplier:listChunk.html.twig";
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


/* IntranetBundle:Supplier:listChunk.html.twig */
class __TwigTemplate_6b8e974e508a52add68501535d6f2d8e3b4eac2432cf7f1771e80a0290804ab6_1933757703 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Supplier:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Supplier:indexTable.html.twig";
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supplier_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                            </td>
                        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:listChunk.html.twig";
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
