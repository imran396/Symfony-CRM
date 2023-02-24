<?php

/* IntranetBundle:Macroses:paginator.html.twig */
class __TwigTemplate_6799f16571065c0858e9f9f2f203fc8d507ef572eea738764d37c6494a09632c extends Twig_Template
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
    public function getpager($__pagesCount__ = null, $__currentPage__ = null, $__id__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "pagesCount" => $__pagesCount__,
            "currentPage" => $__currentPage__,
            "id" => $__id__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    ";
            // line 3
            if ((!(isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")))) {
                // line 4
                echo "        ";
                $context["currentPage"] = 1;
                // line 5
                echo "    ";
            }
            // line 6
            echo "
    ";
            // line 7
            if (((isset($context["pagesCount"]) ? $context["pagesCount"] : $this->getContext($context, "pagesCount")) > 1)) {
                // line 8
                echo "        <div ";
                if ((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))) {
                    echo "id=\"pager-";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo "\" style=\"display: none\"";
                }
                echo " class=\"pagination\">
            <ul class=\"unstyled\">

                <li class=\"prev-disabled\"
                        ";
                // line 12
                if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) != 1)) {
                    // line 13
                    echo "                            style=\"display: none\"
                        ";
                }
                // line 15
                echo "                        ><span>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Prev", array(), "messages");
                echo "</span></li>
                <li class=\"prev-enabled\"
                        ";
                // line 17
                if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) == 1)) {
                    // line 18
                    echo "                            style=\"display: none\"
                        ";
                }
                // line 20
                echo "                        ><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requesturi", array()), "html", null, true);
                echo "#page-prev\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Prev", array(), "messages");
                echo "</a></li>


                ";
                // line 23
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["pagesCount"]) ? $context["pagesCount"] : $this->getContext($context, "pagesCount"))));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    // line 24
                    echo "
                    ";
                    // line 25
                    if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) == $context["page"])) {
                        // line 26
                        echo "                        <li class=\"active\"><a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requesturi", array()), "html", null, true);
                        echo "#page-";
                        echo twig_escape_filter($this->env, ($context["page"] - 1), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                        echo "</a></li>
                    ";
                    } else {
                        // line 28
                        echo "                        <li><a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requesturi", array()), "html", null, true);
                        echo "#page-";
                        echo twig_escape_filter($this->env, ($context["page"] - 1), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                        echo "</a></li>
                    ";
                    }
                    // line 30
                    echo "
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 32
                echo "

                <li class=\"next-disabled\"
                        ";
                // line 35
                if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) != (isset($context["pagesCount"]) ? $context["pagesCount"] : $this->getContext($context, "pagesCount")))) {
                    // line 36
                    echo "                            style=\"display: none\"
                        ";
                }
                // line 38
                echo "                        ><span>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Next", array(), "messages");
                echo "</span></li>

                <li class=\"next-enabled\"
                        ";
                // line 41
                if (((isset($context["currentPage"]) ? $context["currentPage"] : $this->getContext($context, "currentPage")) == (isset($context["pagesCount"]) ? $context["pagesCount"] : $this->getContext($context, "pagesCount")))) {
                    // line 42
                    echo "                            style=\"display: none\"
                        ";
                }
                // line 44
                echo "                        ><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "requesturi", array()), "html", null, true);
                echo "page-next\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Next", array(), "messages");
                echo "</a></li>
            </ul>
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
        return "IntranetBundle:Macroses:paginator.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 44,  145 => 42,  143 => 41,  136 => 38,  132 => 36,  130 => 35,  125 => 32,  118 => 30,  108 => 28,  98 => 26,  96 => 25,  93 => 24,  89 => 23,  80 => 20,  76 => 18,  74 => 17,  68 => 15,  64 => 13,  62 => 12,  50 => 8,  48 => 7,  45 => 6,  42 => 5,  39 => 4,  37 => 3,  34 => 2,  21 => 1,);
    }
}
