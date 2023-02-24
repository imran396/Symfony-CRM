<?php

/* IntranetBundle:Complaint:indexTable.html.twig */
class __TwigTemplate_e3acf1fb5e5f6f87323baaa5151dd33f9853f279aeeac456da38b679f4df30ab extends Twig_Template
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
    <tr>

        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Subject", array(), "messages");
        echo "</th>
        <th>";
        // line 7
        if ((array_key_exists("flavor", $context) && ((isset($context["flavor"]) ? $context["flavor"] : $this->getContext($context, "flavor")) == "status"))) {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
        } else {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
        }
        echo "</th>
        <th>";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("User Name", array(), "messages");
        echo "</th>
        <th>";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Channel", array(), "messages");
        echo "</th>
        <th>";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("Outlet received at", array(), "messages");
        echo "</th>
        ";
        // line 11
        if ((array_key_exists("displayStatus", $context) && (isset($context["displayStatus"]) ? $context["displayStatus"] : $this->getContext($context, "displayStatus")))) {
            // line 12
            echo "            <th>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
            echo "</th>
        ";
        }
        // line 14
        echo "        ";
        $this->displayBlock('actionsHeader', $context, $blocks);
        // line 17
        echo "    </tr>
    </thead>
    <tbody>

    ";
        // line 21
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
            // line 22
            echo "
        <tr>
             <td style=\"width: 80px;\">";
            // line 24
            echo twig_escape_filter($this->env, sprintf("RX%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
            echo "</td>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "subject", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 26
            if ((array_key_exists("flavor", $context) && ((isset($context["flavor"]) ? $context["flavor"] : $this->getContext($context, "flavor")) == "status"))) {
                echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->ComplaintStatusFilter($this->getAttribute($context["entity"], "status", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "customer", array()), "name", array()), "html", null, true);
            }
            echo "</td>
            <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "channel", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 29
            if ($this->getAttribute($context["entity"], "outletReceivedAt", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "outletReceivedAt", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            }
            echo "</td>
            ";
            // line 30
            if ((array_key_exists("displayStatus", $context) && (isset($context["displayStatus"]) ? $context["displayStatus"] : $this->getContext($context, "displayStatus")))) {
                // line 31
                echo "                <td>";
                echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->ComplaintStatusFilter($this->getAttribute($context["entity"], "status", array())), "html", null, true);
                echo "</td>
            ";
            }
            // line 33
            echo "            ";
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

    // line 14
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 15
        echo "            <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
        ";
    }

    // line 33
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 34
        echo "                <td>
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                    ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL")) {
            // line 37
            echo "                    <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                    ";
        }
        // line 39
        echo "                </td>
            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Complaint:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 39,  179 => 37,  177 => 36,  171 => 35,  168 => 34,  165 => 33,  158 => 15,  155 => 14,  149 => 43,  134 => 41,  131 => 33,  125 => 31,  123 => 30,  117 => 29,  113 => 28,  109 => 27,  101 => 26,  97 => 25,  93 => 24,  89 => 22,  72 => 21,  66 => 17,  63 => 14,  57 => 12,  55 => 11,  51 => 10,  47 => 9,  43 => 8,  35 => 7,  31 => 6,  27 => 5,  21 => 1,);
    }
}
