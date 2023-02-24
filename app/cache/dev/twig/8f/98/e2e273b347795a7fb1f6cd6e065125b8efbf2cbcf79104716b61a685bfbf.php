<?php

/* IntranetBundle:Pressrelease:indexTable.html.twig */
class __TwigTemplate_8f98e2e273b347795a7fb1f6cd6e065125b8efbf2cbcf79104716b61a685bfbf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'actionsHeader' => array($this, 'block_actionsHeader'),
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table id=\"indexTable\" class=\"table\">
    <thead>
    <tr><th> ";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
        <th> ";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
        echo "</th>
        <th> ";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo "</th>
        <th> ";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("User Name", array(), "messages");
        echo "</th>
        <th> ";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
        ";
        // line 8
        $this->displayBlock('actionsHeader', $context, $blocks);
        // line 11
        echo "    </tr>
    </thead>
    <tbody>

    ";
        // line 15
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
            // line 16
            echo "
        <tr>
            <td style=\"width: 80px;\">";
            // line 18
            echo twig_escape_filter($this->env, sprintf("PM%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
            <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "title", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "customer", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 22
            if ($this->getAttribute($context["entity"], "createdat", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            }
            echo "</td>

            ";
            // line 24
            $this->displayBlock('actionsRows', $context, $blocks);
            // line 32
            echo "
        </tr>
    ";
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
        // line 35
        echo "    </tbody>
</table>
";
    }

    // line 8
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 9
        echo "            <th> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
        ";
    }

    // line 24
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 25
        echo "                <td>
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    ";
        // line 27
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
            // line 28
            echo "                        <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                    ";
        }
        // line 30
        echo "                </td>
            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Pressrelease:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 30,  145 => 28,  143 => 27,  137 => 26,  134 => 25,  131 => 24,  124 => 9,  121 => 8,  115 => 35,  99 => 32,  97 => 24,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  74 => 18,  70 => 16,  53 => 15,  47 => 11,  45 => 8,  41 => 7,  37 => 6,  33 => 5,  29 => 4,  25 => 3,  21 => 1,);
    }
}
