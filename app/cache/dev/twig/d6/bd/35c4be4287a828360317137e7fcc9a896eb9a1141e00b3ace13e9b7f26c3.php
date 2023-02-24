<?php

/* IntranetBundle:Task:indexTable.html.twig */
class __TwigTemplate_d6bd35c4be4287a828360317137e7fcc9a896eb9a1141e00b3ace13e9b7f26c3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table class=\"table\">
    <thead>
    <tr>
        <th>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->stripParathesesFilter($this->env->getExtension('translator')->trans("Title")), "html", null, true);
        echo "</th>
        <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
        echo "</th>
        <th>";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Due date", array(), "messages");
        echo "</th>
        <th>";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Attached records", array(), "messages");
        echo "</th>
        <th>";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
    </tr>
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
            echo "
        <tr class=\"";
            // line 16
            if ((($this->getAttribute($context["entity"], "type", array()) === constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS"))) && $this->getAttribute($context["entity"], "expedited", array()))) {
                echo "expedited";
            }
            echo "\">
            <td style=\"width: 80px;\">";
            // line 17
            echo twig_escape_filter($this->env, sprintf("AG%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
            <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->taskTypeFilter($this->getAttribute($context["entity"], "type", array()))), "html", null, true);
            if (($this->getAttribute($context["entity"], "type", array()) === constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")))) {
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "graphicsType", array()), "html", null, true);
            }
            echo "</td>
            <td>
                ";
            // line 20
            if (((array_key_exists("duplicateTask", $context) && ($this->getAttribute($context["entity"], "type", array()) === constant(((isset($context["TaskTypeEnum"]) ? $context["TaskTypeEnum"] : $this->getContext($context, "TaskTypeEnum")) . "GRAPHICS")))) && $this->getAttribute($context["entity"], "graphicsFormat", array()))) {
                // line 21
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "graphicsFormat", array()), "html", null, true);
                echo "
                ";
            } else {
                // line 23
                echo "                    <span title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "description", array()), "html", null, true);
                echo "\">
                        ";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "title", array()), "html", null, true);
                echo "
                    </span>
                ";
            }
            // line 27
            echo "            </td>
            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 29
            if ($this->getAttribute($context["entity"], "dueDate", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "dueDate", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo "</td>
            <td>
                ";
            // line 31
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["entity"], "attachedRecords", array()));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["label"]), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "<br/>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "            </td>
            ";
            // line 33
            $this->displayBlock('actionsRows', $context, $blocks);
            // line 41
            echo "        </tr>
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
        // line 43
        echo "    </tbody>
</table>
";
    }

    // line 33
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 34
        echo "            <td>
                <a class=\"btn btn-table-actions\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_EDIT")) {
            // line 37
            echo "                    <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                ";
        }
        // line 38
        echo " 
\t    </td>
            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Task:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 38,  180 => 37,  178 => 36,  172 => 35,  169 => 34,  166 => 33,  160 => 43,  145 => 41,  143 => 33,  140 => 32,  128 => 31,  121 => 29,  117 => 28,  114 => 27,  108 => 24,  103 => 23,  97 => 21,  95 => 20,  86 => 18,  82 => 17,  76 => 16,  73 => 15,  56 => 14,  49 => 10,  45 => 9,  41 => 8,  37 => 7,  33 => 6,  29 => 5,  25 => 4,  20 => 1,);
    }
}
