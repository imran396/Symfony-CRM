<?php

/* IntranetBundle:Macroses:pressreleaseMacro.html.twig */
class __TwigTemplate_f8680a17746091cc95ee115b5419d5bc5be8496be4edf5a07c4c967d6f87ec71 extends Twig_Template
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
    }

    // line 19
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 20
        echo "                    <th> ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
                ";
    }

    // line 35
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 36
        echo "                        <td>
                            <a class=\"btn btn-table-actions\"
                               href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        // line 39
        echo "</a>
                            ";
        // line 40
        if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
            // line 41
            echo "                                <a class=\"btn btn-table-actions\"
                                   href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("edit", array(), "messages");
            // line 43
            echo "</a>
                            ";
        }
        // line 45
        echo "                        </td>
                    ";
    }

    // line 1
    public function getpressreleaseList($__pressreleases__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "pressreleases" => $__pressreleases__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            if (twig_length_filter($this->env, (isset($context["pressreleases"]) ? $context["pressreleases"] : $this->getContext($context, "pressreleases")))) {
                // line 3
                echo " <div class=\"row-fluid\">
<div class=\"block\">
    <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#pressWidget\">
        ";
                // line 6
                echo $this->env->getExtension('translator')->getTranslator()->trans("Press Release", array(), "messages");
                // line 7
                echo "    </div>

    <div  id=\"pressWidget\"  class=\"block-body collapse in\">

        <table id=\"indexTable\" class=\"table\">
            <thead>
            <tr>
                <th> ";
                // line 14
                echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
                echo "</th>
                <th> ";
                // line 15
                echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
                echo "</th>
                <th> ";
                // line 16
                echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
                echo "</th>
                <th> ";
                // line 17
                echo $this->env->getExtension('translator')->getTranslator()->trans("User Name", array(), "messages");
                echo "</th>
                <th> ";
                // line 18
                echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
                echo "</th>
                ";
                // line 19
                $this->displayBlock('actionsHeader', $context, $blocks);
                // line 22
                echo "            </tr>
            </thead>
            <tbody>

            ";
                // line 26
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["pressreleases"]) ? $context["pressreleases"] : $this->getContext($context, "pressreleases")));
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
                    // line 27
                    echo "
                <tr>
                    <td style=\"width: 80px;\">";
                    // line 29
                    echo twig_escape_filter($this->env, sprintf("PM%05d", $this->getAttribute($context["entity"], "id", array())), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 30
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "title", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 31
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "customer", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 32
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "user", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 33
                    if ($this->getAttribute($context["entity"], "createdat", array())) {
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
                    }
                    echo "</td>

                    ";
                    // line 35
                    $this->displayBlock('actionsRows', $context, $blocks);
                    // line 47
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
                // line 50
                echo "            </tbody>
        </table>
    </div>
</div>
  </div>
";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:pressreleaseMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 50,  168 => 47,  166 => 35,  159 => 33,  155 => 32,  151 => 31,  147 => 30,  143 => 29,  139 => 27,  122 => 26,  116 => 22,  114 => 19,  110 => 18,  106 => 17,  102 => 16,  98 => 15,  94 => 14,  85 => 7,  83 => 6,  78 => 3,  76 => 2,  65 => 1,  60 => 45,  56 => 43,  52 => 42,  49 => 41,  47 => 40,  44 => 39,  40 => 38,  36 => 36,  33 => 35,  26 => 20,  23 => 19,);
    }
}
