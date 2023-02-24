<?php

/* IntranetBundle:AccessLevel:new.html.twig */
class __TwigTemplate_5fbdbd9220be95efcd50bee64e15f97cf74efacc0f1b71ef280665490dfd5a64 extends Twig_Template
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
        echo "  <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\"> ";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Access level creation", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'row');
        echo "
                ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "forCustomers", array()), 'row');
        echo "
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "forOthers", array()), 'row');
        echo "
                ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "forEmployees", array()), 'row');
        echo "

                ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "permissions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
            // line 17
            echo "                 <div class=\"floatLeft\" style=\"float:left;\">
                     ";
            // line 18
            $context["labels"] = twig_split_filter($this->env, $this->getAttribute($this->getAttribute($context["permission"], "vars", array()), "label", array()), "|");
            // line 19
            echo "                     ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["permission"], 'widget');
            echo "
                     ";
            // line 20
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["permission"], 'label', array("label_attr" => array("title" => $this->getAttribute((isset($context["labels"]) ? $context["labels"] : $this->getContext($context, "labels")), 1, array()))) + (twig_test_empty($_label_ = $this->getAttribute((isset($context["labels"]) ? $context["labels"] : $this->getContext($context, "labels")), 0, array())) ? array() : array("label" => $_label_)));
            echo "
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "
                <div style=\"clear:both;\"></div>
                ";
        // line 25
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

                <ul class=\"record_actions unstyled\">
                    <li>
                        <a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("accesslevel");
        echo "\">
                             ";
        // line 30
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 31
        echo "                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:AccessLevel:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 31,  100 => 30,  96 => 29,  89 => 25,  85 => 23,  76 => 20,  71 => 19,  69 => 18,  66 => 17,  62 => 16,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  41 => 10,  35 => 7,  31 => 5,  28 => 4,);
    }
}
