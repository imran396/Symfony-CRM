<?php

/* IntranetBundle:Contact:show.html.twig */
class __TwigTemplate_890311e154f0bf35d7e67009bc3935a8f0934b19234274c574458cd9fe100065 extends Twig_Template
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
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <h2>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "firstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastName", array()), "html", null, true);
        echo "</h2>
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                            <tr>
                                <th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("First name", array(), "messages");
        echo "</th>
                                <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "firstName", array()), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                                <th>";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Last name", array(), "messages");
        echo "</th>
                                <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastName", array()), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                                <th>";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Phone", array(), "messages");
        echo "</th>
                                <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "phone", array()), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                                <th>";
        // line 26
        echo $this->env->getExtension('translator')->getTranslator()->trans("Mobile", array(), "messages");
        echo "</th>
                                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "mobile", array()), "html", null, true);
        echo "</td>
                            </tr>
                            ";
        // line 29
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "birthday", array())) {
            // line 30
            echo "                            <tr>
                                <th>";
            // line 31
            echo $this->env->getExtension('translator')->getTranslator()->trans("Birthday", array(), "messages");
            echo "</th>
                                <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "birthday", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "</td>
                            </tr>
                           ";
        }
        // line 35
        echo "                            <tr>
                                <th>";
        // line 36
        echo $this->env->getExtension('translator')->getTranslator()->trans("Email", array(), "messages");
        echo "</th>
                                <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "email", array()), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                                <th>";
        // line 40
        echo $this->env->getExtension('translator')->getTranslator()->trans("Role", array(), "messages");
        echo "</th>
                                <td>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "role", array()), "html", null, true);
        echo "</td>
                            </tr>
                        ";
        // line 43
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array())) {
            // line 44
            echo "                            <tr>
                                <th>";
            // line 45
            echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
            echo "</th>
                                <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "notes", array()), "html", null, true);
            echo "</td>
                            </tr>
                           ";
        }
        // line 49
        echo "
                        </tbody>
                    </table>
                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\"  href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contact_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        echo "</a>
                    ";
        // line 56
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>
                <div>
                    <a href=\"";
        // line 59
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        echo "</a>
                </div>
            </div>
        </div>
        
        ";
        // line 64
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
            // line 65
            echo "            ";
            $context["helper"] = $this->env->loadTemplate("IntranetBundle:Macroses:suppliersMacro.html.twig");
            // line 66
            echo "            ";
            echo $context["helper"]->getsuppliersList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "suppliers", array()), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getId", array(), "method"), (isset($context["addSupplierForm"]) ? $context["addSupplierForm"] : $this->getContext($context, "addSupplierForm")));
            echo "
        ";
        }
        // line 68
        echo "    </div>

    ";
        // line 70
        if ($this->env->getExtension('security')->isGranted("ROLE_CITIES")) {
            // line 71
            echo "        ";
            $context["cityhelper"] = $this->env->loadTemplate("IntranetBundle:Macroses:citiesMacro.html.twig");
            // line 72
            echo "        ";
            echo $context["cityhelper"]->getcitiesList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cities", array()), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getId", array(), "method"), (isset($context["addCityForm"]) ? $context["addCityForm"] : $this->getContext($context, "addCityForm")));
            echo "
    ";
        }
        // line 74
        echo "
    ";
        // line 75
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
            // line 76
            echo "        ";
            $context["suppliergrouphelper"] = $this->env->loadTemplate("IntranetBundle:Macroses:suppliergroupsMacro.html.twig");
            // line 77
            echo "        ";
            echo $context["suppliergrouphelper"]->getsuppliergroupsList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "suppliergroups", array()), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getId", array(), "method"), (isset($context["addSuppliergroupForm"]) ? $context["addSuppliergroupForm"] : $this->getContext($context, "addSuppliergroupForm")));
            echo "
    ";
        }
        // line 79
        echo "
    ";
        // line 80
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS")) {
            // line 81
            echo "        ";
            $context["customerhelper"] = $this->env->loadTemplate("IntranetBundle:Macroses:customers-contactMacro.html.twig");
            // line 82
            echo "        ";
            echo $context["customerhelper"]->getcustomersList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customers", array()), $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getId", array(), "method"), (isset($context["addCustomerForm"]) ? $context["addCustomerForm"] : $this->getContext($context, "addCustomerForm")));
            echo "
    ";
        }
        // line 84
        echo "
    ";
        // line 85
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
            // line 86
            echo "        ";
            $context["pressrleaseTemplate"] = $this->env->loadTemplate("IntranetBundle:Macroses:pressreleaseMacro.html.twig");
            // line 87
            echo "        ";
            echo $context["pressrleaseTemplate"]->getpressreleaseList((isset($context["pressreleases"]) ? $context["pressreleases"] : $this->getContext($context, "pressreleases")));
            echo "
    ";
        }
        // line 89
        echo "
    ";
        // line 90
        $this->env->loadTemplate("IntranetBundle:Macroses:contactRelation.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Contact:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 90,  240 => 89,  234 => 87,  231 => 86,  229 => 85,  226 => 84,  220 => 82,  217 => 81,  215 => 80,  212 => 79,  206 => 77,  203 => 76,  201 => 75,  198 => 74,  192 => 72,  189 => 71,  187 => 70,  183 => 68,  177 => 66,  174 => 65,  172 => 64,  162 => 59,  156 => 56,  150 => 55,  142 => 49,  136 => 46,  132 => 45,  129 => 44,  127 => 43,  122 => 41,  118 => 40,  112 => 37,  108 => 36,  105 => 35,  99 => 32,  95 => 31,  92 => 30,  90 => 29,  85 => 27,  81 => 26,  75 => 23,  71 => 22,  65 => 19,  61 => 18,  55 => 15,  51 => 14,  41 => 9,  36 => 7,  31 => 4,  28 => 3,);
    }
}
