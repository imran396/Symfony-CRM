<?php

/* IntranetBundle:Campaign:listChunk.html.twig */
class __TwigTemplate_fc4abf7edab8ec801fbcebec9a67a98f6fed3c2eabd567e7db3b3d00a4d6d305 extends Twig_Template
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
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "campaigns", array(), "any", true, true) && twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaigns", array()))) || (array_key_exists("campaign", $context) && twig_length_filter($this->env, (isset($context["campaign"]) ? $context["campaign"] : $this->getContext($context, "campaign")))))) {
            // line 3
            echo "    ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaigns", array())) {
                // line 4
                echo "      ";
                $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaigns", array());
                // line 5
                echo "    ";
            } else {
                // line 6
                echo "      ";
                $context["entities"] = (isset($context["campaign"]) ? $context["campaign"] : $this->getContext($context, "campaign"));
                // line 7
                echo "    ";
            }
            // line 8
            echo "
    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
            echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    ";
            // line 14
            $this->env->loadTemplate("IntranetBundle:Campaign:listChunk.html.twig", "451275228")->display($context);
            // line 22
            echo "                </div>
            </div>
        </div>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 22,  50 => 14,  44 => 11,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}


/* IntranetBundle:Campaign:listChunk.html.twig */
class __TwigTemplate_fc4abf7edab8ec801fbcebec9a67a98f6fed3c2eabd567e7db3b3d00a4d6d305_451275228 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Campaign:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Campaign:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 16
        echo "                            <td>
                                <a class=\"btn btn-table-actions\"
                                   href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                            </td>
                        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:listChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 18,  106 => 16,  103 => 15,  52 => 22,  50 => 14,  44 => 11,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
