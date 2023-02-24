<?php

/* IntranetBundle:Security:login.html.twig */
class __TwigTemplate_8e8787f2567b6428884b51c419ff14bfded5d96970e07f98f332dda59623292c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle::mainLayout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"navbar\">
        <div class=\"navbar-inner\">
            <div class=\"container-fluid\">
                <ul class=\"nav pull-right unstyled\">

                </ul>
                <a class=\"brand\" href=\"/\"><span class=\"first\">EMAT</span> <span class=\"second\">by beon-communications</span></a>
            </div>
        </div>
    </div>


    <div class=\"container-fluid\">


        <div class=\"row-fluid\">
            <div class=\"dialog span4\">
                <div class=\"block\">
                    <div class=\"block-heading\">";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("Sign in for customers", array(), "messages");
        echo "</div>
                    <div class=\"block-body\">
                        <form action=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
                            <label>";
        // line 26
        echo $this->env->getExtension('translator')->getTranslator()->trans("Username", array(), "messages");
        echo "</label>
                            <input type=\"text\" class=\"span12\" id=\"username\" name=\"_username\"
                                   value=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\">
                            <label>";
        // line 29
        echo $this->env->getExtension('translator')->getTranslator()->trans("Password", array(), "messages");
        echo "</label>
                            <input type=\"password\" id=\"password\" class=\"span12\" name=\"_password\"/>
                            <button type=\"submit\" class=\"btn btn-primary pull-right\">";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("Sign in", array(), "messages");
        echo "</button>

                            <div class=\"clearfix\"></div>
                        </form>
                    </div>
                </div>

                ";
        // line 38
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 39
            echo "                    <div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
                    <p><a href=\"mailto:markus.sieber@beon-communications.de?subject=Kennwort vergessen\">Kennwort vergessen?</a></p>
                ";
        }
        // line 42
        echo "            </div>
            <div class=\"dialog span4\">
                <div class=\"block\">
                    <div class=\"block-heading\"><a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("supplier_offer");
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Make supplier offer", array(), "messages");
        echo " &raquo;</a></div>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 51
        $this->displayBlock('javascripts', $context, $blocks);
        // line 54
        echo "

";
    }

    // line 51
    public function block_javascripts($context, array $blocks = array())
    {
        // line 52
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 52,  119 => 51,  113 => 54,  111 => 51,  100 => 45,  95 => 42,  88 => 39,  86 => 38,  76 => 31,  71 => 29,  67 => 28,  62 => 26,  58 => 25,  53 => 23,  32 => 4,  29 => 3,);
    }
}
