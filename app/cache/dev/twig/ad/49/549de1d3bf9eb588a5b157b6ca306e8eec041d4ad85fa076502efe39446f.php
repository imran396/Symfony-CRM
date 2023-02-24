<?php

/* IntranetBundle:Macroses:uploadFileMacro.html.twig */
class __TwigTemplate_ad49549de1d3bf9eb588a5b157b6ca306e8eec041d4ad85fa076502efe39446f extends Twig_Template
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
        // line 8
        echo "
";
    }

    // line 1
    public function gettemplate($__entity__ = null, $__name__ = null, $__uploadDeleteForms__ = null, $__uploadFileForm__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entity" => $__entity__,
            "name" => $__name__,
            "uploadDeleteForms" => $__uploadDeleteForms__,
            "uploadFileForm" => $__uploadFileForm__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    ";
            // line 3
            $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig", "1045961004")->display($context);
            // line 6
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 9
    public function gettemplateSupplier($__entity__ = null, $__name__ = null, $__uploadDeleteForms__ = null, $__uploadFileForm__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entity" => $__entity__,
            "name" => $__name__,
            "uploadDeleteForms" => $__uploadDeleteForms__,
            "uploadFileForm" => $__uploadFileForm__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 10
            echo "
    ";
            // line 11
            $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig", "1355748205")->display($context);
            // line 23
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:uploadFileMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 23,  72 => 11,  69 => 10,  55 => 9,  43 => 6,  41 => 3,  38 => 2,  24 => 1,  19 => 8,);
    }
}


/* IntranetBundle:Macroses:uploadFileMacro.html.twig */
class __TwigTemplate_ad49549de1d3bf9eb588a5b157b6ca306e8eec041d4ad85fa076502efe39446f_1045961004 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Macroses:uploadList.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Macroses:uploadList.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:uploadFileMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 23,  72 => 11,  69 => 10,  55 => 9,  43 => 6,  41 => 3,  38 => 2,  24 => 1,  19 => 8,);
    }
}


/* IntranetBundle:Macroses:uploadFileMacro.html.twig */
class __TwigTemplate_ad49549de1d3bf9eb588a5b157b6ca306e8eec041d4ad85fa076502efe39446f_1355748205 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Macroses:uploadList.html.twig");

        $this->blocks = array(
            'loopChunk' => array($this, 'block_loopChunk'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Macroses:uploadList.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_loopChunk($context, array $blocks = array())
    {
        // line 13
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "uploads", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["upload"]) {
            // line 14
            echo "                ";
            $this->env->loadTemplate("IntranetBundle:Macroses:uploadItemChunk.html.twig")->display($context);
            // line 15
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upload'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "         ";
        if (array_key_exists("upload", $context)) {
            // line 17
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "group", array()), "uploads", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["upload"]) {
                // line 18
                echo "                ";
                $this->env->loadTemplate("IntranetBundle:Macroses:uploadItemChunk.html.twig")->display($context);
                // line 19
                echo "            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upload'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "         ";
        }
        // line 21
        echo "        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:uploadFileMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 21,  243 => 20,  229 => 19,  226 => 18,  208 => 17,  205 => 16,  191 => 15,  188 => 14,  170 => 13,  167 => 12,  74 => 23,  72 => 11,  69 => 10,  55 => 9,  43 => 6,  41 => 3,  38 => 2,  24 => 1,  19 => 8,);
    }
}
