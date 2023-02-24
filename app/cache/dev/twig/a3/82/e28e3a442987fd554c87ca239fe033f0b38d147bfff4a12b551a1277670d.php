<?php

/* IntranetBundle:Macroses:suppliergroupsMacro.html.twig */
class __TwigTemplate_a382e28e3a442987fd554c87ca239fe033f0b38d147bfff4a12b551a1277670d extends Twig_Template
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
        // line 39
        echo "

";
    }

    // line 1
    public function getsuppliergroupsList($__suppliergroups__ = null, $__contactId__ = null, $__addSupplierGroupForm__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "suppliergroups" => $__suppliergroups__,
            "contactId" => $__contactId__,
            "addSupplierGroupForm" => $__addSupplierGroupForm__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"block\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#suppliergroupcontactWigdget\">";
            // line 4
            echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier groups", array(), "messages");
            echo "</div>
        <div class=\"block-body\" id=\"suppliergroupcontactWigdget\">
        ";
            // line 6
            if (twig_length_filter($this->env, (isset($context["suppliergroups"]) ? $context["suppliergroups"] : $this->getContext($context, "suppliergroups")))) {
                // line 7
                echo "            <table class=\"table\">
                <thead>
                <tr>
                    <th>";
                // line 10
                echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
                echo "</th>
                </tr>
                </thead>
                ";
                // line 13
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["suppliergroups"]) ? $context["suppliergroups"] : $this->getContext($context, "suppliergroups")));
                foreach ($context['_seq'] as $context["_key"] => $context["suppliergroup"]) {
                    // line 14
                    echo "             <tbody>
                    <tr>
                        <td>";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute($context["suppliergroup"], "name", array()), "html", null, true);
                    echo "</td>
                        ";
                    // line 17
                    if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
                        // line 18
                        echo "                            <td><a onclick=\"return confirm('Are you sure?')\" class=\"btn btn-table-actions\"
                                   href=\"";
                        // line 19
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("suppliergroup_contact_delete", array("id" => $this->getAttribute($context["suppliergroup"], "id", array()), "contactId" => (isset($context["contactId"]) ? $context["contactId"] : $this->getContext($context, "contactId")))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("Delete", array(), "messages");
                        echo "</a>
                            <a class = \"btn btn-table-actions\"  href=\"";
                        // line 20
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("suppliergroup_show", array("id" => $this->getAttribute($context["suppliergroup"], "id", array()))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                        echo "</a>
                            </td>
                        ";
                    }
                    // line 23
                    echo "                    </tr>
             </tbody>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['suppliergroup'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo "            </table>
            ";
            }
            // line 28
            echo "            <div id=\"supplierGroupContactForm\" style=\"display: none\">
                <div id=\"addSupplierGroup\">
                    ";
            // line 30
            if ((isset($context["addSupplierGroupForm"]) ? $context["addSupplierGroupForm"] : $this->getContext($context, "addSupplierGroupForm"))) {
                // line 31
                echo "                        ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["addSupplierGroupForm"]) ? $context["addSupplierGroupForm"] : $this->getContext($context, "addSupplierGroupForm")), 'form');
                echo "
                    ";
            }
            // line 33
            echo "                </div>
            </div>
            <a class=\"btn btn-table-actions\" href=\"javascript:void(0);\" id=\"supplierGroupContact\">";
            // line 35
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add Supplier Group", array(), "messages");
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
        return "IntranetBundle:Macroses:suppliergroupsMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 35,  115 => 33,  109 => 31,  107 => 30,  103 => 28,  99 => 26,  91 => 23,  83 => 20,  77 => 19,  74 => 18,  72 => 17,  68 => 16,  64 => 14,  60 => 13,  54 => 10,  49 => 7,  47 => 6,  42 => 4,  38 => 2,  25 => 1,  19 => 39,);
    }
}
