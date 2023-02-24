<?php

/* IntranetBundle:Note:indexTable.html.twig */
class __TwigTemplate_548d8aac177ff9f7ecaf0bd6f491739ed41135af9ec3db5642674f880dde5816 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'actionsHeader' => array($this, 'block_actionsHeader'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table id=\"indexTable\" class=\"table\">
    <thead>
    <tr>
        <th>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Text", array(), "messages");
        echo "</th>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
        echo "</th>
        ";
        // line 7
        $this->displayBlock('actionsHeader', $context, $blocks);
        // line 10
        echo "    </tr>
    </thead>
    <tbody>

    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 15
            echo "        ";
            if (($this->env->getExtension('security')->isGranted("ROLE_NOTES_INTERNAL") || (!($this->getAttribute($context["entity"], "internalUseOnly", array(), "any", true, true) && ($this->getAttribute($context["entity"], "internalUseOnly", array()) == true))))) {
                // line 16
                echo "            ";
                $this->env->loadTemplate("IntranetBundle:Note:noteItemChunk.html.twig")->display($context);
                // line 17
                echo "        ";
            }
            // line 18
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </tbody>
</table>
";
    }

    // line 7
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 8
        echo "            <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
        ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Note:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 8,  91 => 7,  85 => 19,  71 => 18,  68 => 17,  65 => 16,  62 => 15,  45 => 14,  39 => 10,  37 => 7,  33 => 6,  29 => 5,  25 => 4,  20 => 1,);
    }
}
