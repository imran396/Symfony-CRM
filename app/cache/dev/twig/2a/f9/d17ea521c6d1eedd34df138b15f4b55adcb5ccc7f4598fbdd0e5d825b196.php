<?php

/* IntranetBundle:Upload:indexTable.html.twig */
class __TwigTemplate_2af9d17ea521c6d1eedd34df138b15f4b55adcb5ccc7f4598fbdd0e5d825b196 extends Twig_Template
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
        // line 1
        echo "<table id=\"indexTable\" class=\"table\">
    <thead>
    <tr>
        <th>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("File name", array(), "messages");
        echo "</th>
        <th>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
        <th>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 11
            echo "        <tr>
            <td>
\t\t";
            // line 13
            if ($this->getAttribute($context["entity"], "isInvoice", array())) {
                echo " <i class=\"icon icon-file\"></i>";
            }
            // line 14
            echo "\t\t";
            if ($this->getAttribute($context["entity"], "fsFilename", array())) {
                echo "  <a
                    href=\"";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("upload_download_public", array("id" => $this->getAttribute($context["entity"], "id", array()), "fsFilename" => $this->getAttribute($context["entity"], "fsFilename", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "filename", array()), "html", null, true);
                echo "</a>
                ";
            } else {
                // line 17
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "filename", array()), "html", null, true);
                echo "
                ";
            }
            // line 19
            echo "            </td>
            <td>";
            // line 20
            if ($this->getAttribute($context["entity"], "createdat", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            }
            echo "</td>
            <td>
                <ul class=\"unstyled\">
                    <li>
                        <a class=\"btn btn-table-actions\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("upload_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
            echo "</a>
                    </li>
                </ul>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Upload:indexTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 30,  81 => 24,  72 => 20,  69 => 19,  63 => 17,  56 => 15,  51 => 14,  47 => 13,  43 => 11,  39 => 10,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
