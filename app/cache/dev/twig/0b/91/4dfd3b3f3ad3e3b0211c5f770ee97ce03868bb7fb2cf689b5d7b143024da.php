<?php

/* IntranetBundle:Supplier:showChunk.html.twig */
class __TwigTemplate_0b914dfd3b3f3ad3e3b0211c5f770ee97ce03868bb7fb2cf689b5d7b143024da extends Twig_Template
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
        if (((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")) == (isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")))) {
            // line 2
            echo "<div class=\"row-fluid\">
    ";
        }
        // line 4
        echo "
    <div class=\"block span6\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget3container\">";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier", array(), "messages");
        echo "</div>
        <div id=\"widget3container\" class=\"block-body collapse in\">
            <h2>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "name", array()), "html", null, true);
        echo "</h2>

            <div id=\"tablewidget\" class=\"block-body collapse in\">
                <table class=\"table table-bordered\">
                    <tbody>
                    <tr>
                        <th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
                        <td><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supplier_show", array("id" => $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, sprintf("PD%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</a></td>
                    </tr>
                    <tr>
                        <th>";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
                        <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "name", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->audienceLabelFilter($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "supplierType", array())), "html", null, true);
        echo "</th>
                        <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "audiencesize", array()), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>";
        // line 26
        echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
        echo "</th>
                        <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "supplierType", array()), "html", null, true);
        echo "</td>
                    </tr>

                    ";
        // line 30
        if ($this->env->getExtension('beon_extension')->supplierPrint($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "supplierType", array()))) {
            // line 31
            echo "                        <tr>
                            <th>";
            // line 32
            echo $this->env->getExtension('translator')->getTranslator()->trans("Frequency", array(), "messages");
            echo "</th>
                            <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->supplierFrequencyFilter($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "frequency", array())), "html", null, true);
            echo "</td>
                        </tr>
                        <tr>
                            <th>";
            // line 36
            echo $this->env->getExtension('translator')->getTranslator()->trans("Pagesize", array(), "messages");
            echo "</th>
                            <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "pagesizeWidth", array()), "html", null, true);
            echo " × ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "pagesizeHeight", array()), "html", null, true);
            echo " mm (";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "pagesizeWidth", array()) * $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "pagesizeHeight", array())), "html", null, true);
            echo "  mm²)</td>
                        </tr>

                    ";
        }
        // line 41
        echo "                     <tr>
                            <th>";
        // line 42
        echo $this->env->getExtension('translator')->getTranslator()->trans("City", array(), "messages");
        echo "</th>
                            <td>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "city", array()), "html", null, true);
        echo "</td>
                        </tr>

                    ";
        // line 46
        if ($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "group", array())) {
            // line 47
            echo "                        <tr>
                            <th>";
            // line 48
            echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier group", array(), "messages");
            echo "</th>
                            <td><a href=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("suppliergroup_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "group", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "group", array()), "html", null, true);
            echo "</a></td>
                        </tr>
                    ";
        }
        // line 52
        echo "
                    </tbody>
                </table>
            </div>

            ";
        // line 57
        if (((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")) == (isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")))) {
            // line 58
            echo "                ";
            if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
                // line 59
                echo "                    <div class=\"inline-forms\">
                        <a class=\"btn btn-table-actions\" href=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supplier_edit", array("id" => $this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "id", array()))), "html", null, true);
                echo "\">
                            ";
                // line 61
                echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
                // line 62
                echo "                        </a>
                        ";
                // line 63
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
                echo "
                    </div>
                ";
            }
            // line 66
            echo "\t\t<div>
\t\t    <a class=\"btn btn-table-actions\" href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_new", array("supplier" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
\t\t\t";
            // line 68
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create Campaign", array(), "messages");
            // line 69
            echo "\t\t    </a>
                </div>
                <div>
                    <a href=\"";
            // line 72
            echo $this->env->getExtension('routing')->getPath("supplier");
            echo "\">
                        ";
            // line 73
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
            // line 74
            echo "                    </a>
                </div>
            ";
        }
        // line 77
        echo "
        </div>
    </div>

    ";
        // line 81
        $context["helper"] = $this->env->loadTemplate("IntranetBundle:Macroses:contactsMacro.html.twig");
        // line 82
        echo "    ";
        if (array_key_exists("campaign", $context)) {
            // line 83
            echo "        ";
            if ($this->getAttribute((isset($context["campaign"]) ? $context["campaign"] : $this->getContext($context, "campaign")), "contact", array())) {
                // line 84
                echo "            ";
                echo $context["helper"]->getshowContact($this->getAttribute((isset($context["campaign"]) ? $context["campaign"] : $this->getContext($context, "campaign")), "contact", array()));
                echo "
        ";
            }
            // line 86
            echo "    ";
        } else {
            // line 87
            echo "    \t";
            $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
            // line 88
            echo "
\t    ";
            // line 89
            echo $context["upload"]->gettemplateSupplier((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier");
            echo "
        ";
            // line 90
            echo $context["helper"]->getcontactsList($this->getAttribute((isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")), "contacts", array()));
            echo "
    ";
        }
        // line 92
        echo "
    ";
        // line 93
        if (((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")) == (isset($context["supplier"]) ? $context["supplier"] : $this->getContext($context, "supplier")))) {
            // line 94
            echo "

</div>

";
        }
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:showChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 94,  241 => 93,  238 => 92,  233 => 90,  229 => 89,  226 => 88,  223 => 87,  220 => 86,  214 => 84,  211 => 83,  208 => 82,  206 => 81,  200 => 77,  195 => 74,  193 => 73,  189 => 72,  184 => 69,  182 => 68,  178 => 67,  175 => 66,  169 => 63,  166 => 62,  164 => 61,  160 => 60,  157 => 59,  154 => 58,  152 => 57,  145 => 52,  137 => 49,  133 => 48,  130 => 47,  128 => 46,  122 => 43,  118 => 42,  115 => 41,  104 => 37,  100 => 36,  94 => 33,  90 => 32,  87 => 31,  85 => 30,  79 => 27,  75 => 26,  69 => 23,  65 => 22,  59 => 19,  55 => 18,  47 => 15,  43 => 14,  34 => 8,  29 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }
}
