<?php

/* IntranetBundle:Upload:show.html.twig */
class __TwigTemplate_25983f4e7a9543b79c62cd1d18990af363258e5290cc1d205d1448dac784dbfa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"row-fluid\">

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Upload", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>

                        <tr>
                            <th>";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("File name", array(), "messages");
        echo "</th>
                            <td>";
        // line 16
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fsFilename", array())) {
            echo "<a
                                    href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("upload_download_public", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "fsFilename" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fsFilename", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "filename", array()), "html", null, true);
            echo "</a>
                                ";
        } else {
            // line 19
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "filename", array()), "html", null, true);
            echo "
                                ";
        }
        // line 20
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("Created at", array(), "messages");
        echo "</th>
                            <td>";
        // line 24
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array())) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdat", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
        }
        echo "</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                     <div class=\"inline-forms ml13\">

                    ";
        // line 32
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "

                </div>
                <div class=\"ml13\">
                       <a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("upload");
        echo "\">
                            ";
        // line 37
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 38
        echo "                    </a>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Upload:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 38,  101 => 37,  97 => 36,  90 => 32,  77 => 24,  73 => 23,  68 => 20,  62 => 19,  55 => 17,  51 => 16,  47 => 15,  37 => 8,  31 => 4,  28 => 3,);
    }
}
