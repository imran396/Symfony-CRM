<?php

/* IntranetBundle:SupplierGroup:show.html.twig */
class __TwigTemplate_941688325e4aabfcf044aab32302c2b68d2e39e607dcdbe610d30317b2ef3e10 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier group", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"record_properties table table-bordered\">
                        <tbody>

                        <tr>
                            <th>";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
                            <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("Framework contract", array(), "messages");
        echo "</th>
                            <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "frameworkContract", array()))), "html", null, true);
        echo "</td>
                        </tr>

                        ";
        // line 24
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discount", array())) {
            // line 25
            echo "                        <tr>
                            <th>";
            // line 26
            echo $this->env->getExtension('translator')->getTranslator()->trans("Discount", array(), "messages");
            echo "</th>
                            <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discount", array()), "html", null, true);
            echo " %</td>
                        </tr>
                        ";
        }
        // line 30
        echo "
                        <tr>
                            <th>";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("Bonus in kind", array(), "messages");
        echo "</th>
                            <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "bonusInKind", array()), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 37
        echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
        echo "</th>
                            <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array()), "html", null, true);
        echo "</td>
                        </tr>

                        </tbody>
                    </table>
                </div>


                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("suppliergroup_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 48
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 49
        echo "                    </a>
                    ";
        // line 50
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
                <div class=\"inline-forms mb10\">
                    ";
        // line 53
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
            // line 54
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("suppliergroup_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "supplier")), "html", null, true);
            echo "\" class=\"btn\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create Supplier", array(), "messages");
            echo "</a>
                    ";
        }
        // line 56
        echo "                </div>

                <div>
                    <a href=\"";
        // line 59
        echo $this->env->getExtension('routing')->getPath("suppliergroup");
        echo "\">
                       ";
        // line 60
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 61
        echo "                    </a>
                </div>
            </div>
        </div>

        ";
        // line 66
        $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
        // line 67
        echo "        ";
        echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campaign");
        echo "
            ";
        // line 68
        $context["helper"] = $this->env->loadTemplate("IntranetBundle:Macroses:contactsMacro.html.twig");
        // line 69
        echo "            ";
        echo $context["helper"]->getcontactsList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contacts", array()));
        echo "

    </div>
    ";
        // line 72
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "suppliers", array(), "any", true, true)) {
            // line 73
            echo "        ";
            $this->env->loadTemplate("IntranetBundle:Supplier:listChunk.html.twig")->display($context);
            // line 74
            echo "    ";
        }
        // line 75
        echo "    ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "campaigns", array(), "any", true, true)) {
            // line 76
            echo "        ";
            $this->env->loadTemplate("IntranetBundle:Campaign:listChunk.html.twig")->display($context);
            // line 77
            echo "    ";
        }
        // line 78
        echo "    ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "tasks", array(), "any", true, true)) {
            // line 79
            echo "        ";
            $this->env->loadTemplate("IntranetBundle:Task:listChunk.html.twig")->display($context);
            // line 80
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:SupplierGroup:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 80,  193 => 79,  190 => 78,  187 => 77,  184 => 76,  181 => 75,  178 => 74,  175 => 73,  173 => 72,  166 => 69,  164 => 68,  159 => 67,  157 => 66,  150 => 61,  148 => 60,  144 => 59,  139 => 56,  131 => 54,  129 => 53,  123 => 50,  120 => 49,  118 => 48,  114 => 47,  102 => 38,  98 => 37,  91 => 33,  87 => 32,  83 => 30,  77 => 27,  73 => 26,  70 => 25,  68 => 24,  62 => 21,  58 => 20,  51 => 16,  47 => 15,  37 => 8,  31 => 4,  28 => 3,);
    }
}
