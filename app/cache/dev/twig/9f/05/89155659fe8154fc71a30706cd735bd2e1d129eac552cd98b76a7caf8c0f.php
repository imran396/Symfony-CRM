<?php

/* IntranetBundle:Macroses:customerMonitoredUrlMacro.html.twig */
class __TwigTemplate_9f0589155659fe8154fc71a30706cd735bd2e1d129eac552cd98b76a7caf8c0f extends Twig_Template
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
    }

    // line 1
    public function getmonitoredUrlList($__entities__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "   ";
            if (twig_length_filter($this->env, (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")))) {
                // line 3
                echo "    <div class=\"block\">
        <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
                // line 4
                echo $this->env->getExtension('translator')->getTranslator()->trans("Monitored Url", array(), "messages");
                echo "</div>
        <div class=\"block-body\">

                ";
                // line 7
                $this->env->loadTemplate("IntranetBundle:Macroses:customerMonitoredUrlMacro.html.twig", "1579035142")->display($context);
                // line 19
                echo "        </div>
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
        return "IntranetBundle:Macroses:customerMonitoredUrlMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 19,  44 => 7,  38 => 4,  35 => 3,  32 => 2,  21 => 1,);
    }
}


/* IntranetBundle:Macroses:customerMonitoredUrlMacro.html.twig */
class __TwigTemplate_9f0589155659fe8154fc71a30706cd735bd2e1d129eac552cd98b76a7caf8c0f_1579035142 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:MonitoredUrl:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:MonitoredUrl:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 9
        echo "                        <td>
                            <div class=\"inline-forms\">

                                <a class=\"btn btn-table-actions\"
                                   href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("monitoredurl_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>

                            </div>
                        </td>
                    ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Macroses:customerMonitoredUrlMacro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 13,  104 => 9,  101 => 8,  46 => 19,  44 => 7,  38 => 4,  35 => 3,  32 => 2,  21 => 1,);
    }
}
