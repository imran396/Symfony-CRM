<?php

/* IntranetBundle:CustomerFacebookUrl:show.html.twig */
class __TwigTemplate_11eb9a4789359eb8cf5ccfc656d21b74c9d9e138e99904e595f3a47906939bc1 extends Twig_Template
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

        <div class=\"block span6\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo " => ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</div>
            <div id=\"widget1container\" class=\"block-body collapse in\">


                <div id=\"tablewidget\" class=\"block-body collapse in\">
                    <table class=\"table table-bordered\">
                        <tbody>
            <tr>
                <th>";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo "</th>
                <td><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
        echo "</a></td>
            </tr>
             <tr>
                <th>";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
        echo "</th>
                <td><a target=\"_blank\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "facebookurl", array()), "url", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "facebookurl", array()), "url", array()), 50), "html", null, true);
        echo "</a></td>
            </tr>
            <tr>
                <th>";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("Isown", array(), "messages");
        echo "</th>
                <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "isOwn", array())), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
                    </table>
                </div>

                ";
        // line 32
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
            // line 33
            echo "                    <div class=\"inline-forms\">
                        <a class=\"btn btn-table-actions\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customerfacebookurl_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                           ";
            // line 35
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 36
            echo "                        </a>
                        ";
            // line 37
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "
                    </div>
                ";
        }
        // line 40
        echo "
                <div>
                    <a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("customerfacebookurl");
        echo "\">
                        ";
        // line 43
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
        // line 44
        echo "                    </a>
                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:CustomerFacebookUrl:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 44,  115 => 43,  111 => 42,  107 => 40,  101 => 37,  98 => 36,  96 => 35,  92 => 34,  89 => 33,  87 => 32,  78 => 26,  74 => 25,  66 => 22,  62 => 21,  54 => 18,  50 => 17,  37 => 9,  31 => 5,  28 => 4,);
    }
}
