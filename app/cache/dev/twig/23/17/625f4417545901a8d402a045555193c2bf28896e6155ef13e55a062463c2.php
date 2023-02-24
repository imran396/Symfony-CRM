<?php

/* IntranetBundle:Note:listChunk.html.twig */
class __TwigTemplate_2317625f4417545901a8d402a045555193c2bf28896e6155ef13e55a062463c2 extends Twig_Template
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
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array()))) {
            // line 2
            echo "    ";
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array());
            // line 3
            echo "
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 6
            echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
            // line 9
            $this->env->loadTemplate("IntranetBundle:Note:listChunk.html.twig", "1955733606")->display($context);
            // line 17
            echo "                </div>
            </div>
        </div>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 17,  35 => 9,  29 => 6,  24 => 3,  21 => 2,  19 => 1,);
    }
}


/* IntranetBundle:Note:listChunk.html.twig */
class __TwigTemplate_2317625f4417545901a8d402a045555193c2bf28896e6155ef13e55a062463c2_1955733606 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Note:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Note:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 11
        echo "                            <td>
                                <a class=\"btn btn-table-actions\"
                                   href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                            </td>
                        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 13,  91 => 11,  88 => 10,  37 => 17,  35 => 9,  29 => 6,  24 => 3,  21 => 2,  19 => 1,);
    }
}
