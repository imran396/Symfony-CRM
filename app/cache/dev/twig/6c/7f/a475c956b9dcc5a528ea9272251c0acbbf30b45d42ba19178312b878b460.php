<?php

/* IntranetBundle:Macroses:taskListMacro.html.twig */
class __TwigTemplate_6c7fa475c956b9dcc5a528ea9272251c0acbbf30b45d42ba19178312b878b460 extends Twig_Template
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
        // line 6
        echo "
";
    }

    // line 1
    public function gettemplate($__tasks__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "tasks" => $__tasks__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    ";
            // line 3
            $this->env->loadTemplate("IntranetBundle:Macroses:taskListMacro.html.twig", "1524437969")->display($context);
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 7
    public function gettemplateCustomer($__tasks__ = null, $__affileationTasks__ = null, $__campaignTasks__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "tasks" => $__tasks__,
            "affileationTasks" => $__affileationTasks__,
            "campaignTasks" => $__campaignTasks__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 8
            echo "
    ";
            // line 9
            $this->env->loadTemplate("IntranetBundle:Macroses:taskListMacro.html.twig", "1375229983")->display($context);
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:taskListMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 9,  62 => 8,  49 => 7,  38 => 3,  35 => 2,  24 => 1,  19 => 6,);
    }
}


/* IntranetBundle:Macroses:taskListMacro.html.twig */
class __TwigTemplate_6c7fa475c956b9dcc5a528ea9272251c0acbbf30b45d42ba19178312b878b460_1524437969 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Macroses:taskListTemplate.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Macroses:taskListTemplate.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:taskListMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 9,  62 => 8,  49 => 7,  38 => 3,  35 => 2,  24 => 1,  19 => 6,);
    }
}


/* IntranetBundle:Macroses:taskListMacro.html.twig */
class __TwigTemplate_6c7fa475c956b9dcc5a528ea9272251c0acbbf30b45d42ba19178312b878b460_1375229983 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Macroses:taskListTemplate.html.twig");

        $this->blocks = array(
            'loopChunk' => array($this, 'block_loopChunk'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Macroses:taskListTemplate.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_loopChunk($context, array $blocks = array())
    {
        // line 12
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : $this->getContext($context, "tasks")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 13
            echo "                ";
            $this->env->loadTemplate("IntranetBundle:Macroses:taskItemChunk.html.twig")->display($context);
            // line 14
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["affileationTasks"]) ? $context["affileationTasks"] : $this->getContext($context, "affileationTasks")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 16
            echo "                ";
            $this->env->loadTemplate("IntranetBundle:Macroses:taskItemChunk.html.twig")->display($context);
            // line 17
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:taskListMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 18,  216 => 17,  213 => 16,  195 => 15,  181 => 14,  178 => 13,  160 => 12,  157 => 11,  65 => 9,  62 => 8,  49 => 7,  38 => 3,  35 => 2,  24 => 1,  19 => 6,);
    }
}
