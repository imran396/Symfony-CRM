<?php

/* IntranetBundle:Supplier:offerMail.html.twig */
class __TwigTemplate_e2ee5ffa7f16f587a28dcf2fc5d2ad51eb0674315932f4fcb03498845e125c6d extends Twig_Template
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
        echo "<h3>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier offer information", array(), "messages");
        echo "</h3>
<div>
    ";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("Customer name", array(), "messages");
        echo ":  ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "customerName", array()), "html", null, true);
        echo "
</div>
<div>
    ";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier name", array(), "messages");
        echo ":  ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "supplierName", array()), "html", null, true);
        echo "
</div>
<div>
    ";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact firstname", array(), "messages");
        echo ":  ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "contactFirstname", array()), "html", null, true);
        echo "
</div>
<div>
    ";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact lastname", array(), "messages");
        echo ":  ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "contactLastname", array()), "html", null, true);
        echo "
</div>
<div>
    ";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact position", array(), "messages");
        echo ":  ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "contactPosition", array()), "html", null, true);
        echo "
</div>
";
        // line 17
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "contactPhone", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "contactPhone", array()))))) {
            // line 18
            echo "    <div>
        ";
            // line 19
            echo $this->env->getExtension('translator')->getTranslator()->trans("Contact phone", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "contactPhone", array()), "html", null, true);
            echo "
    </div>
";
        }
        // line 22
        echo "
<div>
    ";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact email", array(), "messages");
        echo ":  ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "contactEmail", array()), "html", null, true);
        echo "
</div>

";
        // line 27
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "notes", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "notes", array()))))) {
            // line 28
            echo "    <div>
        ";
            // line 29
            echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "notes", array()), "html", null, true);
            echo "
    </div>
";
        }
        // line 32
        echo "
";
        // line 33
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "offerValidTill", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "offerValidTill", array()))))) {
            // line 34
            echo "    <div>
        ";
            // line 35
            echo $this->env->getExtension('translator')->getTranslator()->trans("Offer valid till", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "offerValidTill", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "
    </div>
";
        }
        // line 38
        echo "
";
        // line 39
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "offerValidTill", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "offerValidTill", array()))))) {
            // line 40
            echo "    <div>
        ";
            // line 41
            echo $this->env->getExtension('translator')->getTranslator()->trans("Offer Period Start", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "offerPeriodStart", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "
    </div>
";
        }
        // line 44
        echo "
";
        // line 45
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "offerValidTill", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "offerValidTill", array()))))) {
            // line 46
            echo "    <div>
        ";
            // line 47
            echo $this->env->getExtension('translator')->getTranslator()->trans("Offer Period End", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "offerPeriodEnd", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "
    </div>
";
        }
        // line 50
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "price", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "price", array()))))) {
            // line 51
            echo "    <div>
        ";
            // line 52
            echo $this->env->getExtension('translator')->getTranslator()->trans("Price", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "price", array()), 2, ",", "."), "html", null, true);
            echo "
    </div>
";
        }
        // line 55
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "priceRegular", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "priceRegular", array()))))) {
            // line 56
            echo "    <div>
        ";
            // line 57
            echo $this->env->getExtension('translator')->getTranslator()->trans("Regular Price", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "priceRegular", array()), 2, ",", "."), "html", null, true);
            echo "
    </div>
";
        }
        // line 60
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "numberOfSeconds", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "numberOfSeconds", array()))))) {
            // line 61
            echo "    <div>
        ";
            // line 62
            echo $this->env->getExtension('translator')->getTranslator()->trans("Number Of seconds", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "numberOfSeconds", array()), "html", null, true);
            echo "
    </div>
";
        }
        // line 65
        echo "
";
        // line 66
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "visitors", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "visitors", array()))))) {
            // line 67
            echo "    <div>
        ";
            // line 68
            echo $this->env->getExtension('translator')->getTranslator()->trans("Visitors", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "visitors", array()), 0, ",", "."), "html", null, true);
            echo "
    </div>
";
        }
        // line 71
        echo "
";
        // line 72
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "readers", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "readers", array()))))) {
            // line 73
            echo "    <div>
        ";
            // line 74
            echo $this->env->getExtension('translator')->getTranslator()->trans("Readers", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "readers", array()), 0, ",", "."), "html", null, true);
            echo "
    </div>
";
        }
        // line 77
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "viewers", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "viewers", array()))))) {
            // line 78
            echo "    <div>
        ";
            // line 79
            echo $this->env->getExtension('translator')->getTranslator()->trans("Viewers", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "viewers", array()), 0, ",", "."), "html", null, true);
            echo "
    </div>
";
        }
        // line 82
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "listeners", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "listeners", array()))))) {
            // line 83
            echo "    <div>
        ";
            // line 84
            echo $this->env->getExtension('translator')->getTranslator()->trans("Listeners", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "listeners", array()), 0, ",", "."), "html", null, true);
            echo "
    </div>
";
        }
        // line 87
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "numberOfAds", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "numberOfAds", array()))))) {
            // line 88
            echo "    <div>
        ";
            // line 89
            echo $this->env->getExtension('translator')->getTranslator()->trans("Numbers Of Ads", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "numberOfAds", array()), "html", null, true);
            echo "
    </div>
";
        }
        // line 92
        echo "
";
        // line 93
        if (((($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "adsizeHeight", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "adsizeHeight", array())))) && $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "adsizeWidth", array(), "any", true, true)) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "adsizeWidth", array()))))) {
            // line 94
            echo "    <div>
       ";
            // line 95
            echo $this->env->getExtension('translator')->getTranslator()->trans("Size of ads", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "adsizeWidth", array()), "html", null, true);
            echo " × ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "adsizeHeight", array()), "html", null, true);
            echo " mm (";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "adsizeWidth", array()) * $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "adsizeHeight", array())), "html", null, true);
            echo "  mm²)
    </div>
";
        }
        // line 98
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "audienceSize", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "audienceSize", array()))))) {
            // line 99
            echo "    <div>
        ";
            // line 100
            echo $this->env->getExtension('translator')->getTranslator()->trans("Audience size", array(), "messages");
            echo ":  ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "audienceSize", array()), "html", null, true);
            echo "
    </div>
";
        }
        // line 103
        echo "
<div>
    ";
        // line 105
        echo $this->env->getExtension('translator')->getTranslator()->trans("Included services", array(), "messages");
        echo ":  ";
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "includedServices", array()) === constant(((isset($context["CampaignIncludedServicesEnum"]) ? $context["CampaignIncludedServicesEnum"] : $this->getContext($context, "CampaignIncludedServicesEnum")) . "OTHER")))) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "includedServicesOther", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->includedServicesFilter($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "includedServices", array())), "html", null, true);
        }
        // line 106
        echo "</div>


";
        // line 109
        if ((array_key_exists("uploads", $context) && (!twig_test_empty((isset($context["uploads"]) ? $context["uploads"] : $this->getContext($context, "uploads")))))) {
            // line 110
            echo "    <h3>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Uploads", array(), "messages");
            echo "</h3>
    ";
            // line 111
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["uploads"]) ? $context["uploads"] : $this->getContext($context, "uploads")));
            foreach ($context['_seq'] as $context["_key"] => $context["upload"]) {
                // line 112
                echo "        <div><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "getSchemeAndHttpHost", array(), "method"), "html", null, true);
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("upload_download", array("id" => $this->getAttribute($context["upload"], "id", array()), "fileName" => $this->getAttribute($context["upload"], "name", array()))), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["upload"], "name", array()), "html", null, true);
                echo "</a></div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upload'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 115
        echo "
<div>
    <h3>";
        // line 117
        echo $this->env->getExtension('translator')->getTranslator()->trans("To create a campaign based on this offer, please click the following link", array(), "messages");
        echo "</h3>
    <a type=\"button\" target=\"_blank\" href=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "getSchemeAndHttpHost", array(), "method"), "html", null, true);
        echo $this->env->getExtension('routing')->getPath("campaign_new");
        echo "?";
        echo twig_escape_filter($this->env, (isset($context["queryString"]) ? $context["queryString"] : $this->getContext($context, "queryString")), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Create campaign", array(), "messages");
        echo " </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Supplier:offerMail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 118,  338 => 117,  334 => 115,  321 => 112,  317 => 111,  312 => 110,  310 => 109,  305 => 106,  297 => 105,  293 => 103,  285 => 100,  282 => 99,  280 => 98,  268 => 95,  265 => 94,  263 => 93,  260 => 92,  252 => 89,  249 => 88,  247 => 87,  239 => 84,  236 => 83,  234 => 82,  226 => 79,  223 => 78,  221 => 77,  213 => 74,  210 => 73,  208 => 72,  205 => 71,  197 => 68,  194 => 67,  192 => 66,  189 => 65,  181 => 62,  178 => 61,  176 => 60,  168 => 57,  165 => 56,  163 => 55,  155 => 52,  152 => 51,  150 => 50,  142 => 47,  139 => 46,  137 => 45,  134 => 44,  126 => 41,  123 => 40,  121 => 39,  118 => 38,  110 => 35,  107 => 34,  105 => 33,  102 => 32,  94 => 29,  91 => 28,  89 => 27,  81 => 24,  77 => 22,  69 => 19,  66 => 18,  64 => 17,  57 => 15,  49 => 12,  41 => 9,  33 => 6,  25 => 3,  19 => 1,);
    }
}
