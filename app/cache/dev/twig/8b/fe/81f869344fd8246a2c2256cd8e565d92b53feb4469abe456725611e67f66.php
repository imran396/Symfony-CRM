<?php

/* IntranetBundle:Macroses:suppliersMacro.html.twig */
class __TwigTemplate_8bfe81f869344fd8246a2c2256cd8e565d92b53feb4469abe456725611e67f66 extends Twig_Template
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
        // line 46
        echo "

";
    }

    // line 1
    public function getsuppliersList($__suppliers__ = null, $__contactId__ = null, $__addSupplierForm__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "suppliers" => $__suppliers__,
            "contactId" => $__contactId__,
            "addSupplierForm" => $__addSupplierForm__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"block span6\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#suppliercontactWigdget\">";
            // line 4
            echo $this->env->getExtension('translator')->getTranslator()->trans("Suppliers", array(), "messages");
            echo "</div>
        <div class=\"block-body\" id=\"suppliercontactWigdget\">
    ";
            // line 6
            if (twig_length_filter($this->env, (isset($context["suppliers"]) ? $context["suppliers"] : $this->getContext($context, "suppliers")))) {
                // line 7
                echo "
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>";
                // line 11
                echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
                echo "</th>
                    </tr>
                </thead>
                <tbody>

                ";
                // line 16
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["suppliers"]) ? $context["suppliers"] : $this->getContext($context, "suppliers")));
                foreach ($context['_seq'] as $context["_key"] => $context["supplier"]) {
                    // line 17
                    echo "
                    <tr>
                        <td>";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute($context["supplier"], "name", array()), "html", null, true);
                    echo "</td>
                        ";
                    // line 20
                    if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
                        // line 21
                        echo "                            <td>
                                <a onclick=\"return confirm('Are you sure?')\" class=\"btn btn-table-actions\" href=\"";
                        // line 22
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supplier_contact_delete", array("id" => $this->getAttribute($context["supplier"], "id", array()), "contactId" => (isset($context["contactId"]) ? $context["contactId"] : $this->getContext($context, "contactId")))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("Delete", array(), "messages");
                        echo "</a>
                                <a class = \"btn btn-table-actions\"  href=\"";
                        // line 23
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supplier_show", array("id" => $this->getAttribute($context["supplier"], "id", array()))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                        echo "</a>
                            </td>
                        ";
                    }
                    // line 26
                    echo "                    </tr>

                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplier'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                echo "
                </tbody>
            </table>
     ";
            }
            // line 33
            echo "
           <div id=\"supplierContactForm\" style=\"display: none\">
                <div id=\"addSupplier\">
                    ";
            // line 36
            if ((isset($context["addSupplierForm"]) ? $context["addSupplierForm"] : $this->getContext($context, "addSupplierForm"))) {
                // line 37
                echo "                        ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["addSupplierForm"]) ? $context["addSupplierForm"] : $this->getContext($context, "addSupplierForm")), 'form');
                echo "
                    ";
            }
            // line 39
            echo "                </div>
           </div>
            <a class=\"btn btn-table-actions\" href=\"javascript:void(0);\" id=\"supplierContact\">";
            // line 41
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add Supplier", array(), "messages");
            echo "</a>

        </div>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:suppliersMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 41,  121 => 39,  115 => 37,  113 => 36,  108 => 33,  102 => 29,  94 => 26,  86 => 23,  80 => 22,  77 => 21,  75 => 20,  71 => 19,  67 => 17,  63 => 16,  55 => 11,  49 => 7,  47 => 6,  42 => 4,  38 => 2,  25 => 1,  19 => 46,);
    }
}
