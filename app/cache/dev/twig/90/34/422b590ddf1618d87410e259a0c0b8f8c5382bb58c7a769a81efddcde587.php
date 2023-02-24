<?php

/* IntranetBundle:AccessLevel:edit.html.twig */
class __TwigTemplate_9034422b590ddf1618d87410e259a0c0b8f8c5382bb58c7a769a81efddcde587 extends Twig_Template
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
        echo "<div class=\"row-fluid\">
        <div class=\"block span12\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Access level edit", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "
                ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "name", array()), 'row');
        echo "
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "forCustomers", array()), 'row');
        echo "
                ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "forOthers", array()), 'row');
        echo "
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "forEmployees", array()), 'row');
        echo "

                ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "permissions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
            // line 16
            echo "                 <div class=\"floatLeft\">
                     ";
            // line 17
            $context["labels"] = twig_split_filter($this->env, $this->getAttribute($this->getAttribute($context["permission"], "vars", array()), "label", array()), "|");
            // line 18
            echo "                     ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["permission"], 'widget');
            echo "
                     ";
            // line 19
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["permission"], 'label', array("label_attr" => array("title" => $this->getAttribute((isset($context["labels"]) ? $context["labels"] : $this->getContext($context, "labels")), 1, array()))) + (twig_test_empty($_label_ = $this->getAttribute((isset($context["labels"]) ? $context["labels"] : $this->getContext($context, "labels")), 0, array())) ? array() : array("label" => $_label_)));
            echo "
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
                <div style=\"clear:both;\"></div>
                ";
        // line 24
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_end');
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a  onclick=\"return confirmation()\" class=\"btn btn-table-actions\" href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("accesslevel");
        echo "\">
                            ";
        // line 29
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 30
        echo "                        </a>
                         <a onclick=\"return confirmation()\" class=\"btn btn-table-actions\"  href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("accesslevel_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\"> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:AccessLevel:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 31,  101 => 30,  99 => 29,  95 => 28,  88 => 24,  84 => 22,  75 => 19,  70 => 18,  68 => 17,  65 => 16,  61 => 15,  56 => 13,  52 => 12,  48 => 11,  44 => 10,  40 => 9,  35 => 7,  31 => 5,  28 => 4,);
    }
}
