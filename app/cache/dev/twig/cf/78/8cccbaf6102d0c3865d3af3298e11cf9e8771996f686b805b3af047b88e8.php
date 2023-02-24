<?php

/* IntranetBundle:AccessLevel:show.html.twig */
class __TwigTemplate_cf788cccbaf6102d0c3865d3af3298e11cf9e8771996f686b805b3af047b88e8 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Access level", array(), "messages");
        // line 9
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>For customers</th>
                            <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "forCustomers", array()))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>For employees</th>
                            <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "forEmployees", array()))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>For others</th>
                            <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "forOthers", array()))), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>Permission</th>
                            <td>
                                <ul>
                                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "permissions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
            // line 35
            echo "                                    <li><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["permission"], "identifier", array()), "html", null, true);
            echo "</strong>";
            if ($this->getAttribute($context["permission"], "description", array())) {
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["permission"], "description", array()), "html", null, true);
            }
            echo "</li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                                </ul>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("accesslevel_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 46
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 47
        echo "                    </a>
                    ";
        // line 48
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                    ";
        // line 49
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["duplicate_form"]) ? $context["duplicate_form"] : $this->getContext($context, "duplicate_form")), 'form');
        echo "
                </div>
            </div>
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:AccessLevel:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 49,  115 => 48,  112 => 47,  110 => 46,  106 => 45,  96 => 37,  82 => 35,  78 => 34,  69 => 28,  62 => 24,  55 => 20,  48 => 16,  39 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
