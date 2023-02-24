<?php

/* IntranetBundle:Campaign:indexTable.html.twig */
class __TwigTemplate_c4b543b8d06a2204c3d761d76abf94e5212824a858ffa24103a6a52be6ca8c7e extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
        echo "</th>
        <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Start", array(), "messages");
        echo "</th>
        <th>";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("End", array(), "messages");
        echo "</th>
        <th>";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Budget", array(), "messages");
        echo "</th>
        <th>";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
        echo "</th>
        ";
        // line 11
        $this->displayBlock('actionsHeader', $context, $blocks);
        // line 14
        echo "    </tr>
    </thead>
    <tbody>
    ";
        // line 17
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
            // line 18
            echo "        <tr>
            <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "formattedId", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "supplier", array()), "supplierType", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "title", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 22
            if ($this->getAttribute($context["entity"], "start", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 23
            if ($this->getAttribute($context["entity"], "end", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["entity"], "budget", array()), 2, ",", "."), "html", null, true);
            echo "</td>
            <td>
                ";
            // line 26
            if (($this->getAttribute($context["entity"], "deleted", array()) == true)) {
                // line 27
                echo "                    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Aborted", array(), "messages");
                // line 28
                echo "                ";
            } elseif (($this->getAttribute($context["entity"], "approved", array()) == true)) {
                // line 29
                echo "                    ";
                echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->CampaignStatusFilter($this->getAttribute($context["entity"], "status", array())), "html", null, true);
                echo "
                ";
            } elseif (($this->getAttribute($context["entity"], "denied", array()) == true)) {
                // line 31
                echo "                    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Denied", array(), "messages");
                // line 32
                echo "                ";
            } elseif (($this->getAttribute($context["entity"], "approvalmailsent", array()) == true)) {
                // line 33
                echo "                    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Approval mail sent", array(), "messages");
                // line 34
                echo "                ";
            } else {
                // line 35
                echo "                    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Draft", array(), "messages");
                // line 36
                echo "                ";
            }
            // line 37
            echo "            </td>

            ";
            // line 39
            $this->displayBlock('actionsRows', $context, $blocks);
            // line 49
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
        // line 52
        echo "    </tbody>
</table>
";
    }

    // line 11
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 12
        echo "            <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
        ";
    }

    // line 39
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 40
        echo "                <td>
                    <a class=\"btn btn-table-actions\"
                       href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    ";
        // line 43
        if ($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL")) {
            // line 44
            echo "                        <a class=\"btn btn-table-actions\"
                           href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                    ";
        }
        // line 47
        echo "                </td>
            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 47,  198 => 45,  195 => 44,  193 => 43,  187 => 42,  183 => 40,  180 => 39,  173 => 12,  170 => 11,  164 => 52,  148 => 49,  146 => 39,  142 => 37,  139 => 36,  136 => 35,  133 => 34,  130 => 33,  127 => 32,  124 => 31,  118 => 29,  115 => 28,  112 => 27,  110 => 26,  105 => 24,  99 => 23,  93 => 22,  89 => 21,  85 => 20,  81 => 19,  78 => 18,  61 => 17,  56 => 14,  54 => 11,  50 => 10,  46 => 9,  42 => 8,  38 => 7,  34 => 6,  30 => 5,  26 => 4,  21 => 1,);
    }
}
