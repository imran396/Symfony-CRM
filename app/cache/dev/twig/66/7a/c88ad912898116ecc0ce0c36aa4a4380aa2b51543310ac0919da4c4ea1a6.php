<?php

/* IntranetBundle:Macroses:taskListTemplate.html.twig */
class __TwigTemplate_667ac88ad912898116ecc0ce0c36aa4a4380aa2b51543310ac0919da4c4ea1a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'loopChunk' => array($this, 'block_loopChunk'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"block\">
    <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 2
        echo $this->env->getExtension('translator')->getTranslator()->trans("Tasks", array(), "messages");
        echo "</div>

    <div id=\"widget1container\" class=\"block-body collapse in\">

        <div id=\"tablewidget\" class=\"block-body collapse in\">


            <table class=\"table\">
                <tr>
                    <th>
                        ";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
        // line 13
        echo "                    </th>
                    <th>
                        ";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
        // line 16
        echo "                    </th>
                    <th>
                        ";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Due date", array(), "messages");
        // line 19
        echo "                    </th>
                    <th>
                        ";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
        // line 22
        echo "                    </th>
                    <th>
                        ";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        // line 25
        echo "
                    </th>
                </tr>

                ";
        // line 29
        $this->displayBlock('loopChunk', $context, $blocks);
        // line 34
        echo "            </table>

        </div>
    </div>

</div>";
    }

    // line 29
    public function block_loopChunk($context, array $blocks = array())
    {
        // line 30
        echo "                    ";
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
            // line 31
            echo "                        ";
            $this->env->loadTemplate("IntranetBundle:Macroses:taskItemChunk.html.twig")->display($context);
            // line 32
            echo "                    ";
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
        // line 33
        echo "                ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:taskListTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  103 => 32,  100 => 31,  82 => 30,  79 => 29,  70 => 34,  68 => 29,  62 => 25,  60 => 24,  56 => 22,  54 => 21,  50 => 19,  48 => 18,  44 => 16,  42 => 15,  38 => 13,  36 => 12,  23 => 2,  20 => 1,);
    }
}
