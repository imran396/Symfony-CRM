<?php

/* IntranetBundle:User:show.html.twig */
class __TwigTemplate_c381543903d5c20bf41f850473f26a3d6563678da994ed7ac9c51cb5fbe35044 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("User", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">
                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
                        <tr>
                            <th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Name", array(), "messages");
        echo "</th>
                            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <th>";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("Email", array(), "messages");
        echo "</th>
                            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "email", array()), "html", null, true);
        echo "</td>
                        </tr>

                        <tr>
                            <th>";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("Access level", array(), "messages");
        echo "</th>
                            <td><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("accesslevel_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "accessLevel", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "accessLevel", array()), "html", null, true);
        echo "</a>
                        </tr>

                        ";
        // line 27
        if ($this->getAttribute((isset($context["numberOfSuccessfullLogin"]) ? $context["numberOfSuccessfullLogin"] : null), "totalSuccessfullLogin", array(), "any", true, true)) {
            // line 28
            echo "                        <tr>
                            <th>";
            // line 29
            echo $this->env->getExtension('translator')->getTranslator()->trans("Last 30 days number of successfull login", array(), "messages");
            echo "</th>
                            <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["numberOfSuccessfullLogin"]) ? $context["numberOfSuccessfullLogin"] : $this->getContext($context, "numberOfSuccessfullLogin")), "totalSuccessfullLogin", array()), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        // line 33
        echo "
                        ";
        // line 34
        if ($this->getAttribute((isset($context["successfullLogin"]) ? $context["successfullLogin"] : null), "createdAt", array(), "any", true, true)) {
            // line 35
            echo "                        <tr>
                            <th>";
            // line 36
            echo $this->env->getExtension('translator')->getTranslator()->trans("Last successfull login", array(), "messages");
            echo "</th>
                            <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["successfullLogin"]) ? $context["successfullLogin"] : $this->getContext($context, "successfullLogin")), "createdAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        // line 40
        echo "
                        ";
        // line 41
        if ((($this->getAttribute((isset($context["unsuccessfullLogin"]) ? $context["unsuccessfullLogin"] : null), "createdAt", array(), "any", true, true) && $this->getAttribute((isset($context["successfullLogin"]) ? $context["successfullLogin"] : null), "createdAt", array(), "any", true, true)) && ($this->getAttribute((isset($context["unsuccessfullLogin"]) ? $context["unsuccessfullLogin"] : $this->getContext($context, "unsuccessfullLogin")), "createdAt", array()) > $this->getAttribute((isset($context["successfullLogin"]) ? $context["successfullLogin"] : $this->getContext($context, "successfullLogin")), "createdAt", array())))) {
            // line 42
            echo "                        <tr>
                            <th>";
            // line 43
            echo $this->env->getExtension('translator')->getTranslator()->trans("Last unsuccessfull login", array(), "messages");
            echo "</th>
                            <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["unsuccessfullLogin"]) ? $context["unsuccessfullLogin"] : $this->getContext($context, "unsuccessfullLogin")), "createdAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        // line 47
        echo "                       
                        </tbody>
                    </table>
                </div>

\t\t\t\t<div class=\"inline-forms\">
                <a class=\"btn btn-table-actions\" href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                   ";
        // line 54
        echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
        // line 55
        echo "                </a>
\t\t\t\t";
        // line 56
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "
\t\t\t\t</div>

                <div>
\t\t\t\t\t<a href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">
                    \t";
        // line 61
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 62
        echo "                    </a>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:User:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 62,  158 => 61,  154 => 60,  147 => 56,  144 => 55,  142 => 54,  138 => 53,  130 => 47,  124 => 44,  120 => 43,  117 => 42,  115 => 41,  112 => 40,  106 => 37,  102 => 36,  99 => 35,  97 => 34,  94 => 33,  88 => 30,  84 => 29,  81 => 28,  79 => 27,  71 => 24,  67 => 23,  60 => 19,  56 => 18,  50 => 15,  46 => 14,  37 => 8,  31 => 4,  28 => 3,);
    }
}
