<?php

/* IntranetBundle:City:show.html.twig */
class __TwigTemplate_51c0e76ad203d8e9bf3df6598cb232e628332a28b1ac0f331ffab898567f45fc extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("City", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                      <tbody>
                        <tr>
                            <th>";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
                            <td>";
        // line 16
        echo twig_escape_filter($this->env, sprintf("CT%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</td>
                        </tr>

                       <tr>
                <th>";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
                <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("Population", array(), "messages");
        echo "</th>
                <td>";
        // line 25
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "population", array()), 0, ","), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
        echo "</th>
                <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("Events", array(), "messages");
        echo "</th>
                <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "events", array()), "html", null, true);
        echo "</td>
            </tr>
                   </tbody>
                </table>

                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("city_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 42
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 43
        echo "                    </a>
                    ";
        // line 44
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
            </div>
        </div>

      ";
        // line 49
        $context["helper"] = $this->env->loadTemplate("IntranetBundle:Macroses:contactsMacro.html.twig");
        // line 50
        echo "            ";
        echo $context["helper"]->getcontactsList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contacts", array()));
        echo "
    </div>

    ";
        // line 53
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "suppliers", array(), "any", true, true)) {
            // line 54
            echo "             ";
            $this->env->loadTemplate("IntranetBundle:Supplier:listChunk.html.twig")->display($context);
            // line 55
            echo "    ";
        }
        // line 56
        echo "
    ";
        // line 57
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "customers", array(), "any", true, true)) {
            // line 58
            echo "             ";
            $this->env->loadTemplate("IntranetBundle:Customer:listChunk.html.twig")->display($context);
            // line 59
            echo "    ";
        }
        // line 60
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:City:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 60,  144 => 59,  141 => 58,  139 => 57,  136 => 56,  133 => 55,  130 => 54,  128 => 53,  121 => 50,  119 => 49,  111 => 44,  108 => 43,  106 => 42,  102 => 41,  91 => 33,  87 => 32,  81 => 29,  77 => 28,  71 => 25,  67 => 24,  61 => 21,  57 => 20,  50 => 16,  46 => 15,  37 => 9,  31 => 5,  28 => 4,);
    }
}
