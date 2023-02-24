<?php

/* IntranetBundle:Campaign:showTable.html.twig */
class __TwigTemplate_6feef502d02e7849775c2d8d56ecb80a9efadd6da0f2c37a014ea996d3c42616 extends Twig_Template
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
        echo "<table class=\"table table-bordered\">
    <tbody>
    <tr>
        <th>";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Id", array(), "messages");
        echo "</th>
        <td>";
        // line 5
        echo twig_escape_filter($this->env, sprintf("AD%05d", $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array())), "html", null, true);
        echo "</td>
    </tr>
    ";
        // line 7
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "duplicateOf", array())) {
            // line 8
            echo "    <tr>
        <th>";
            // line 9
            echo $this->env->getExtension('translator')->getTranslator()->trans("Duplicate of", array(), "messages");
            echo "</th>
        <td><a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "duplicateOf", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, sprintf("AD%05d", $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "duplicateOf", array()), "id", array())), "html", null, true);
            echo "</a></td>
    </tr>
    ";
        }
        // line 13
        echo "    <tr>
        <th>";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("Title", array(), "messages");
        echo "</th>
        <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
        echo "</td>
    </tr>
    ";
        // line 17
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "details", array())) {
            // line 18
            echo "        <tr>
            <th>";
            // line 19
            echo $this->env->getExtension('translator')->getTranslator()->trans("Details", array(), "messages");
            echo "</th>
            <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "details", array()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 23
        echo "    <tr>
        <th>";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("Start", array(), "messages");
        echo "</th>
        <td>";
        // line 25
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "start", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <th>";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("End", array(), "messages");
        echo "</th>
        <td>";
        // line 29
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "end", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <th>";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("Budget", array(), "messages");
        echo "</th>
        <td>";
        // line 33
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "budget", array()), 2, ",", "."), "html", null, true);
        echo "</td>
    </tr>
    ";
        // line 35
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discount", array()) > 0)) {
            // line 36
            echo "        <tr>
            <th>";
            // line 37
            echo $this->env->getExtension('translator')->getTranslator()->trans("Discount", array(), "messages");
            echo "</th>
            <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discount", array()), 2, ",", "."), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discountPercent", array()), "html", null, true);
            echo "&thinsp;%)</td>
        </tr>
    ";
        }
        // line 41
        echo "    <tr>
        <th>";
        // line 42
        echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
        echo "</th>
        <td><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer", array()), "html", null, true);
        echo "</a></td>
    </tr>
    ";
        // line 45
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "audiencesize", array()) > 0)) {
            // line 46
            echo "    <tr>
        <th>";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->audienceLabelFilter($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array()), "supplierType", array())), "html", null, true);
            echo "</th>
        <td>";
            // line 48
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "audiencesize", array()), 0, "", "."), "html", null, true);
            echo "</td>
    </tr>
    ";
        }
        // line 51
        echo "    ";
        if ((array_key_exists("cps", $context) && ((isset($context["cps"]) ? $context["cps"] : $this->getContext($context, "cps")) > 0))) {
            // line 52
            echo "        <tr>
            <th>";
            // line 53
            echo $this->env->getExtension('translator')->getTranslator()->trans("CPS", array(), "messages");
            echo "</th>
            <td>";
            // line 54
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["cps"]) ? $context["cps"] : $this->getContext($context, "cps")), 2, ",", ""), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 57
        echo "    ";
        if ((array_key_exists("cpspm", $context) && ((isset($context["cpspm"]) ? $context["cpspm"] : $this->getContext($context, "cpspm")) > 0))) {
            // line 58
            echo "        <tr>
            <th>";
            // line 59
            echo $this->env->getExtension('translator')->getTranslator()->trans("CPSPM", array(), "messages");
            echo "</th>
            <td>";
            // line 60
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["cpspm"]) ? $context["cpspm"] : $this->getContext($context, "cpspm")), 4, ",", ""), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 63
        echo "    ";
        if ((array_key_exists("cpm", $context) && ((isset($context["cpm"]) ? $context["cpm"] : $this->getContext($context, "cpm")) > 0))) {
            // line 64
            echo "        <tr>
            <th>";
            // line 65
            echo $this->env->getExtension('translator')->getTranslator()->trans("CPM", array(), "messages");
            echo "</th>
            <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["cpm"]) ? $context["cpm"] : $this->getContext($context, "cpm")), 2, ",", "."), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 69
        echo "    ";
        if ($this->env->getExtension('beon_extension')->supplierPrint($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array()), "supplierType", array()))) {
            // line 70
            echo "        <tr>
            <th>";
            // line 71
            echo $this->env->getExtension('translator')->getTranslator()->trans("Number of ads", array(), "messages");
            echo "</th>
            <td>";
            // line 72
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "numberOfAds", array()), 1, ",", ""), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 75
        echo "
    ";
        // line 76
        if ($this->env->getExtension('beon_extension')->supplierPrint($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array()), "supplierType", array()))) {
            // line 77
            echo "      <tr>
        <th>";
            // line 78
            echo $this->env->getExtension('translator')->getTranslator()->trans("Size of ads", array(), "messages");
            echo "</th>
        <td>";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "adsizeWidth", array()), "html", null, true);
            echo " × ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "adsizeHeight", array()), "html", null, true);
            echo " mm (";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "adsizeWidth", array()) * $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "adsizeHeight", array())), "html", null, true);
            echo "  mm²)</td>
    </tr>
    ";
        }
        // line 82
        echo "
    ";
        // line 83
        if ($this->env->getExtension('beon_extension')->supplierRadioOrTv($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "supplier", array()), "supplierType", array()))) {
            // line 84
            echo "        <tr>
            <th>";
            // line 85
            echo $this->env->getExtension('translator')->getTranslator()->trans("Number of seconds", array(), "messages");
            echo "</th>
            <td>";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "numberOfSeconds", array()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 89
        echo "    ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "adDetails", array())) {
            // line 90
            echo "        <tr>
            <th>";
            // line 91
            echo $this->env->getExtension('translator')->getTranslator()->trans("Ad details", array(), "messages");
            echo "</th>
            <td>
                <pre class=\"numbered\">";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "adDetails", array()), "html", null, true);
            echo "</pre>
            </td>
        </tr>
    ";
        }
        // line 97
        echo "    ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "invoiceAddress", array())) {
            // line 98
            echo "        <tr>
            <th>";
            // line 99
            echo $this->env->getExtension('translator')->getTranslator()->trans("Invoice address", array(), "messages");
            echo "</th>
            <td>";
            // line 100
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "invoiceAddress", array()), "html", null, true));
            echo "</td>
        </tr>
    ";
        }
        // line 103
        echo "    ";
        if ((!($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "includedServices", array()), "id", array()) === constant(((isset($context["CampaignIncludedServicesEnum"]) ? $context["CampaignIncludedServicesEnum"] : $this->getContext($context, "CampaignIncludedServicesEnum")) . "NONE"))))) {
            // line 104
            echo "        <tr>
            <th>";
            // line 105
            echo $this->env->getExtension('translator')->getTranslator()->trans("Included services", array(), "messages");
            echo "</th>
            <td>";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "includedServices", array()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 109
        echo "    ";
        if ((array_key_exists("secure", $context) && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "beonRecommendation", array()))) {
            // line 110
            echo "        <tr>
            <th>";
            // line 111
            echo $this->env->getExtension('translator')->getTranslator()->trans("Beon recommendation", array(), "messages");
            echo "</th>
            <td>";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "beonRecommendation", array()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 115
        echo "    ";
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "returnPath", array())) {
            // line 116
            echo "        <tr>
            <th>";
            // line 117
            echo $this->env->getExtension('translator')->getTranslator()->trans("Return path", array(), "messages");
            echo "</th>
            <td>";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "returnPath", array()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 121
        echo "    ";
        if (array_key_exists("secure", $context)) {
            // line 122
            echo "    <tr>
        <th>";
            // line 123
            echo $this->env->getExtension('translator')->getTranslator()->trans("Status", array(), "messages");
            echo "</th>
        <td>
            ";
            // line 125
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "deleted", array()) == true)) {
                // line 126
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Aborted", array(), "messages");
                // line 127
                echo "            ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approved", array()) == true)) {
                // line 128
                echo "                ";
                echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->CampaignStatusFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "status", array())), "html", null, true);
                echo "
            ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "denied", array()) == true)) {
                // line 130
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Denied", array(), "messages");
                // line 131
                echo "            ";
            } elseif (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalmailsent", array()) == true)) {
                // line 132
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Approval mail sent at", array(), "messages");
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "approvalMailSentAt", array()), (isset($context["defaultDateTimeFormat"]) ? $context["defaultDateTimeFormat"] : $this->getContext($context, "defaultDateTimeFormat"))), "html", null, true);
                echo "
            ";
            } else {
                // line 134
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Draft", array(), "messages");
                // line 135
                echo "            ";
            }
            // line 136
            echo "        </td>
    </tr>
    ";
        }
        // line 139
        echo "

    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Campaign:showTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  391 => 139,  386 => 136,  383 => 135,  380 => 134,  372 => 132,  369 => 131,  366 => 130,  360 => 128,  357 => 127,  354 => 126,  352 => 125,  347 => 123,  344 => 122,  341 => 121,  335 => 118,  331 => 117,  328 => 116,  325 => 115,  319 => 112,  315 => 111,  312 => 110,  309 => 109,  303 => 106,  299 => 105,  296 => 104,  293 => 103,  287 => 100,  283 => 99,  280 => 98,  277 => 97,  270 => 93,  265 => 91,  262 => 90,  259 => 89,  253 => 86,  249 => 85,  246 => 84,  244 => 83,  241 => 82,  231 => 79,  227 => 78,  224 => 77,  222 => 76,  219 => 75,  213 => 72,  209 => 71,  206 => 70,  203 => 69,  197 => 66,  193 => 65,  190 => 64,  187 => 63,  181 => 60,  177 => 59,  174 => 58,  171 => 57,  165 => 54,  161 => 53,  158 => 52,  155 => 51,  149 => 48,  145 => 47,  142 => 46,  140 => 45,  133 => 43,  129 => 42,  126 => 41,  118 => 38,  114 => 37,  111 => 36,  109 => 35,  104 => 33,  100 => 32,  94 => 29,  90 => 28,  84 => 25,  80 => 24,  77 => 23,  71 => 20,  67 => 19,  64 => 18,  62 => 17,  57 => 15,  53 => 14,  50 => 13,  42 => 10,  38 => 9,  35 => 8,  33 => 7,  28 => 5,  24 => 4,  19 => 1,);
    }
}
