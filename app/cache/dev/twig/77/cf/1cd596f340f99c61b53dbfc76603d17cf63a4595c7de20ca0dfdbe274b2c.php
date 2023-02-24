<?php

/* IntranetBundle:FacebookUrl:show.html.twig */
class __TwigTemplate_77cf1cd596f340f99c61b53dbfc76603d17cf63a4595c7de20ca0dfdbe274b2c extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"row-fluid\">
        <div class=\"block span12\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">


                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
              <tbody>
                <tr>
                    <th>";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("Url", array(), "messages");
        echo "</th>
                    <td><a target=\"_blank\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "url", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "url", array()), 50), "html", null, true);
        echo "</a></td>
                </tr>
                <tr>
                    <th>";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("Alias", array(), "messages");
        echo "</th>
                    <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "alias", array()), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("Last post", array(), "messages");
        echo "</th>
                    <td>
                        ";
        // line 26
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastpost", array())) {
            // line 27
            echo "                            ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastpost", array()), "d.m.Y H:i"), "html", null, true);
            echo "
                        ";
        }
        // line 29
        echo "                    </td>
                </tr>
           </tbody>
                </table>
                </div>

                <div class=\"inline-forms\">
                    <a class=\"btn btn-table-actions\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("facebookurl_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                        ";
        // line 37
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 38
        echo "                    </a>
                    ";
        // line 39
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
                </div>

                <div>
                    <a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("facebookurl");
        echo "\">
                        ";
        // line 44
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 45
        echo "                    </a>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 51
        $this->env->loadTemplate("IntranetBundle:FacebookUrl:logList.html.twig")->display($context);
        // line 52
        echo "    ";
        $this->env->loadTemplate("IntranetBundle::simplePaginatorBlock.html.twig")->display($context);
        // line 53
        echo "
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:FacebookUrl:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 53,  123 => 52,  121 => 51,  113 => 45,  111 => 44,  107 => 43,  100 => 39,  97 => 38,  95 => 37,  91 => 36,  82 => 29,  76 => 27,  74 => 26,  69 => 24,  63 => 21,  59 => 20,  51 => 17,  47 => 16,  36 => 8,  31 => 5,  28 => 4,);
    }
}
