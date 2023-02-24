<?php

/* IntranetBundle:Macroses:customers-contactMacro.html.twig */
class __TwigTemplate_f1f3e849535e8f95820ab3ad8c1a873bb5b02ff679e48fd705810a444ac6082a extends Twig_Template
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
    }

    // line 1
    public function getcustomersList($__customers__ = null, $__contactId__ = null, $__addCustomerForm__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "customers" => $__customers__,
            "contactId" => $__contactId__,
            "addCustomerForm" => $__addCustomerForm__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
  <div class=\"row-fluid\">
    <div class=\"block\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#customerewidget\">";
            // line 5
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholders", array(), "messages");
            echo "</div>
        <div class=\"block-body\" id=\"customerewidget\" class=\"block-body collapse in\">
        ";
            // line 7
            if (twig_length_filter($this->env, (isset($context["customers"]) ? $context["customers"] : $this->getContext($context, "customers")))) {
                // line 8
                echo "            <table class=\"table\" >
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
                // line 15
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["customers"]) ? $context["customers"] : $this->getContext($context, "customers")));
                foreach ($context['_seq'] as $context["_key"] => $context["customer"]) {
                    // line 16
                    echo "                    <tr>
                        <td>";
                    // line 17
                    echo twig_escape_filter($this->env, $this->getAttribute($context["customer"], "name", array()), "html", null, true);
                    echo "</td>
                        ";
                    // line 18
                    if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS")) {
                        // line 19
                        echo "                            <td><a onclick=\"return confirm('Are you sure?')\" class=\"btn btn-table-actions\"
                                   href=\"";
                        // line 20
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_contact_delete", array("id" => $this->getAttribute($context["customer"], "id", array()), "contactId" => (isset($context["contactId"]) ? $context["contactId"] : $this->getContext($context, "contactId")))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("Delete", array(), "messages");
                        echo "</a>
                            <a class = \"btn btn-table-actions\"  href=\"";
                        // line 21
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($context["customer"], "id", array()))), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
                        echo "</a>
                            </td>
                        ";
                    }
                    // line 24
                    echo "                    </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo "                </tbody>
            </table>
        ";
            }
            // line 29
            echo "
            <div id=\"customerContactForm\" style=\"display: none\">
                <div id=\"addCustomer\">
                    ";
            // line 32
            if ((isset($context["addCustomerForm"]) ? $context["addCustomerForm"] : $this->getContext($context, "addCustomerForm"))) {
                // line 33
                echo "                     ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["addCustomerForm"]) ? $context["addCustomerForm"] : $this->getContext($context, "addCustomerForm")), 'form');
                echo "
            ";
            }
            // line 35
            echo "                </div>
            </div>
            <a class=\"btn btn-table-actions\" href=\"javascript:void(0);\" id=\"customerContact\">";
            // line 37
            echo $this->env->getExtension('translator')->getTranslator()->trans("Add Stakeholders", array(), "messages");
            echo "</a>
        </div>


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
        return "IntranetBundle:Macroses:customers-contactMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 37,  113 => 35,  107 => 33,  105 => 32,  100 => 29,  95 => 26,  88 => 24,  80 => 21,  74 => 20,  71 => 19,  69 => 18,  65 => 17,  62 => 16,  58 => 15,  51 => 11,  46 => 8,  44 => 7,  39 => 5,  34 => 2,  21 => 1,);
    }
}
