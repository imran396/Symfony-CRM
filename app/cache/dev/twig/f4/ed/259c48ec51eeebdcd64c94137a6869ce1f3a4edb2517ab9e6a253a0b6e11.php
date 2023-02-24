<?php

/* IntranetBundle:MonitoredUrl:indexTable.html.twig */
class __TwigTemplate_f4ed259c48ec51eeebdcd64c94137a6869ce1f3a4edb2517ab9e6a253a0b6e11 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Url", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Customer", array(), "messages");
        echo "</th>
        <th>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Lastcheck", array(), "messages");
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
            <td><a target=\"_blank\" href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($context["entity"], "url", array()), 50), "html", null, true);
            echo "</a></td>
            <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "customer", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 20
            if ($this->getAttribute($context["entity"], "lastCheck", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "lastCheck", array()), "d.m.Y H:i"), "html", null, true);
            }
            echo "</td>

            ";
            // line 22
            $this->displayBlock('actionsRows', $context, $blocks);
            // line 36
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
        // line 38
        echo "    </tbody>
</table>
";
    }

    // line 8
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 9
        echo "        <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
       ";
    }

    // line 22
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 23
        echo "                <td>
                    <div class=\"inline-forms\">
                        <a class=\"btn btn-table-actions markdone\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_postednow", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("mark done", array(), "messages");
        echo "</a>
                        ";
        // line 26
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS")) {
            // line 27
            echo "                            <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "complaint")), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Create complaint", array(), "messages");
            echo "</a>
                        ";
        }
        // line 29
        echo "                        <a class=\"btn btn-table-actions\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                        ";
        // line 30
        if ($this->env->getExtension('security')->isGranted("ROLE_MONITORED_URLS")) {
            // line 31
            echo "                            <a class=\"btn btn-table-actions\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            echo "</a>
                        ";
        }
        // line 33
        echo "                    </div>
                </td>
            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:MonitoredUrl:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 33,  150 => 31,  148 => 30,  141 => 29,  133 => 27,  131 => 26,  125 => 25,  121 => 23,  118 => 22,  111 => 9,  108 => 8,  102 => 38,  87 => 36,  85 => 22,  78 => 20,  74 => 19,  68 => 18,  64 => 16,  47 => 15,  41 => 11,  39 => 8,  35 => 7,  31 => 6,  27 => 5,  21 => 1,);
    }
}
