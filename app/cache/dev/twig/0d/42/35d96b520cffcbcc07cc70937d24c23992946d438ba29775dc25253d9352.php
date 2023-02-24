<?php

/* IntranetBundle:Macroses:uploadItemChunk.html.twig */
class __TwigTemplate_0d4235d96b520cffcbcc07cc70937d24c23992946d438ba29775dc25253d9352 extends Twig_Template
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
        echo "<tr>
    <td>
\t";
        // line 3
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "submitFilesStatus", array(), "any", true, true) && ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "submitFilesStatus", array()) == true))) {
            // line 5
            echo "        <input type=\"checkbox\" class=\"checkbox-toggle\" name=\"uploadFiles[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "id", array()), "html", null, true);
            echo "\" />
    ";
        }
        // line 7
        echo "    ";
        if ($this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "isInvoice", array())) {
            // line 8
            echo "        <i class=\"icon icon-file\"></i>
    ";
        } elseif ($this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "getTagColor", array())) {
            // line 10
            echo "        <i class=\"tag-toggle tag-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "getTagColor", array()), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "id", array()), "html", null, true);
            echo "\"></i>
    ";
        }
        // line 12
        echo "        ";
        if ($this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "fsFilename", array())) {
            // line 13
            echo "\t    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("upload_download_public", array("id" => $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "id", array()), "fsFilename" => $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "fsFilename", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "filename", array()), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 15
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "filename", array()), "html", null, true);
            echo "
        ";
        }
        // line 17
        echo "    </td>
    <td>";
        // line 18
        if ($this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "createdat", array())) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
        }
        echo "</td>
    ";
        // line 19
        if ((isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms"))) {
            // line 20
            echo "        <td>
            ";
            // line 21
            echo             $this->env->getExtension('form')->renderer->renderBlock($this->getAttribute((isset($context["uploadDeleteForms"]) ? $context["uploadDeleteForms"] : $this->getContext($context, "uploadDeleteForms")), $this->getAttribute((isset($context["upload"]) ? $context["upload"] : $this->getContext($context, "upload")), "id", array()), array(), "array"), 'form');
            echo "
        </td>
    ";
        }
        // line 24
        echo "
</tr>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:uploadItemChunk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 24,  77 => 21,  74 => 20,  72 => 19,  66 => 18,  63 => 17,  57 => 15,  49 => 13,  46 => 12,  38 => 10,  34 => 8,  31 => 7,  25 => 5,  23 => 3,  19 => 1,);
    }
}
