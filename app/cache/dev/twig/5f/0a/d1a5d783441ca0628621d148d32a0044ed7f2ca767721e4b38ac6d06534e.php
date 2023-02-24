<?php

/* IntranetBundle:Macroses:contactsMacro.html.twig */
class __TwigTemplate_5f0ad1a5d783441ca0628621d148d32a0044ed7f2ca767721e4b38ac6d06534e extends Twig_Template
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
        // line 17
        echo "
";
    }

    // line 1
    public function getcontactsList($__contacts__ = null, $__addSupplierForm__ = null, $__title__ = "Contacts")
    {
        $context = $this->env->mergeGlobals(array(
            "contacts" => $__contacts__,
            "addSupplierForm" => $__addSupplierForm__,
            "title" => $__title__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if (twig_length_filter($this->env, (isset($context["contacts"]) ? $context["contacts"] : $this->getContext($context, "contacts")))) {
                // line 3
                echo "        <div class=\"block span6\">
            <div class=\"block-heading\">";
                // line 4
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"))), "html", null, true);
                echo "</div>

            <div class=\"block-body\">
                ";
                // line 7
                $context["separator"] = "";
                // line 8
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["contacts"]) ? $context["contacts"] : $this->getContext($context, "contacts")));
                foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                    echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator")), "html", null, true);
                    $context["separator"] = ", ";
                    echo " <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contact_show", array("id" => $this->getAttribute($context["contact"], "id", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "firstName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["contact"], "lastName", array()), "html", null, true);
                    echo "</a>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 9
                echo "
                ";
                // line 10
                if ((isset($context["addSupplierForm"]) ? $context["addSupplierForm"] : $this->getContext($context, "addSupplierForm"))) {
                    // line 11
                    echo "                    ";
                    echo                     $this->env->getExtension('form')->renderer->renderBlock((isset($context["addSupplierForm"]) ? $context["addSupplierForm"] : $this->getContext($context, "addSupplierForm")), 'form');
                    echo "
                ";
                }
                // line 13
                echo "            </div>
        </div>
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 18
    public function getshowContact($__entity__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entity" => $__entity__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 19
            echo "    <div class=\"block span6\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 20
            echo $this->env->getExtension('translator')->getTranslator()->trans("Contact", array(), "messages");
            echo "</div>
        <div id=\"widget1container\" class=\"block-body collapse in\">

            <div id=\"tablewidget\" class=\"block-body collapse in\">
                <table class=\"table table-bordered\">
                    <tbody>

                    <tr>
                        <th>";
            // line 28
            echo $this->env->getExtension('translator')->getTranslator()->trans("First name", array(), "messages");
            echo "</th>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "firstName", array()), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>";
            // line 32
            echo $this->env->getExtension('translator')->getTranslator()->trans("Last name", array(), "messages");
            echo "</th>
                        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastName", array()), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>";
            // line 36
            echo $this->env->getExtension('translator')->getTranslator()->trans("Phone", array(), "messages");
            echo "</th>
                        <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "phone", array()), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>";
            // line 40
            echo $this->env->getExtension('translator')->getTranslator()->trans("Mobile", array(), "messages");
            echo "</th>
                        <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "mobile", array()), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>";
            // line 44
            echo $this->env->getExtension('translator')->getTranslator()->trans("Email", array(), "messages");
            echo "</th>
                        <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "email", array()), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>";
            // line 48
            echo $this->env->getExtension('translator')->getTranslator()->trans("Role", array(), "messages");
            echo "</th>
                        <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "role", array()), "html", null, true);
            echo "</td>
                    </tr>
                    </tbody>
                </table>
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
        return "IntranetBundle:Macroses:contactsMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 49,  169 => 48,  163 => 45,  159 => 44,  153 => 41,  149 => 40,  143 => 37,  139 => 36,  133 => 33,  129 => 32,  123 => 29,  119 => 28,  108 => 20,  105 => 19,  94 => 18,  80 => 13,  74 => 11,  72 => 10,  69 => 9,  51 => 8,  49 => 7,  43 => 4,  40 => 3,  37 => 2,  24 => 1,  19 => 17,);
    }
}
