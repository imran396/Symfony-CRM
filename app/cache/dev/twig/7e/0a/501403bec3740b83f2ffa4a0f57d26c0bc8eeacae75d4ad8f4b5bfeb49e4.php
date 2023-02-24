<?php

/* IntranetBundle:Customer:show.html.twig */
class __TwigTemplate_7e0a501403bec3740b83f2ffa4a0f57d26c0bc8eeacae75d4ad8f4b5bfeb49e4 extends Twig_Template
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
    <div class=\"block-heading\" data-toggle=\"collapse\"
         data-target=\"#widget1container\">";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->customerLevelFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()))), "html", null, true);
        echo "</div>
    <div id=\"widget1container\" class=\"block-body collapse in\">
    <h2>";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
        echo "</h2>

    <div id=\"tablewidget\" class=\"block-body collapse in\">
    <table class=\"table table-bordered\">
    <tbody>

    ";
        // line 17
        if ((((!(null === (isset($context["parentLevel"]) ? $context["parentLevel"] : $this->getContext($context, "parentLevel")))) && $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "parent", array(), "any", false, true), "name", array(), "any", true, true)) && (!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "parent", array()), "name", array()))))) {
            // line 18
            echo "        <tr>
            <th>";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->customerLevelFilter((isset($context["parentLevel"]) ? $context["parentLevel"] : $this->getContext($context, "parentLevel")))), "html", null, true);
            echo "</th>
            <td>
                <a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "parent", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "parent", array()), "name", array()), "html", null, true);
            echo "</a>

            </td>
        </tr>
    ";
        }
        // line 26
        echo "

    ";
        // line 28
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()) == 4)) {
            // line 29
            echo "       ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cooperationType", array())) {
                // line 30
                echo "        <tr>
            <th>";
                // line 31
                echo $this->env->getExtension('translator')->getTranslator()->trans("Cooperation type", array(), "messages");
                echo "</th>
            <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cooperationType", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 35
            echo "    ";
        }
        // line 36
        echo "
    ";
        // line 37
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()) == 3)) {
            // line 38
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "address", array())) {
                // line 39
                echo "        <tr>
            <th>";
                // line 40
                echo $this->env->getExtension('translator')->getTranslator()->trans("Address", array(), "messages");
                echo "</th>
            <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "address", array()), "html", null, true);
                echo "</td>

        </tr>
        ";
            }
            // line 45
            echo "       ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactname", array())) {
                // line 46
                echo "        <tr>
            <th>";
                // line 47
                echo $this->env->getExtension('translator')->getTranslator()->trans("Contact name", array(), "messages");
                echo "</th>
            <td>";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactname", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 51
            echo "    ";
        }
        // line 52
        echo "
    ";
        // line 53
        if ((($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()) == 2) || ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()) == 4))) {
            // line 54
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactphone", array())) {
                // line 55
                echo "        <tr>
            <th>";
                // line 56
                echo $this->env->getExtension('translator')->getTranslator()->trans("Contact phone", array(), "messages");
                echo "</th>
            <td>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactphone", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 60
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactmobile", array())) {
                // line 61
                echo "        <tr>
            <th>";
                // line 62
                echo $this->env->getExtension('translator')->getTranslator()->trans("Contact mobile", array(), "messages");
                echo "</th>
            <td>";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactmobile", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 66
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactemail", array())) {
                // line 67
                echo "        <tr>
            <th>";
                // line 68
                echo $this->env->getExtension('translator')->getTranslator()->trans("Contact email", array(), "messages");
                echo "</th>
            <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactemail", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 72
            echo "    ";
        }
        // line 73
        echo "
    ";
        // line 74
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contractstart", array())) {
            // line 75
            echo "        <tr>
            <th>";
            // line 76
            echo $this->env->getExtension('translator')->getTranslator()->trans("Contract start", array(), "messages");
            echo "</th>
            <td>
                ";
            // line 78
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contractstart", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "

            </td>
        </tr>
    ";
        }
        // line 83
        echo "
     ";
        // line 84
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contractend", array())) {
            // line 85
            echo "        <tr>
            <th>";
            // line 86
            echo $this->env->getExtension('translator')->getTranslator()->trans("Contract end", array(), "messages");
            echo "</th>
            <td>

                    ";
            // line 89
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contractend", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
            echo "

            </td>
        </tr>

    ";
        }
        // line 95
        echo "
    ";
        // line 96
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()) == 2)) {
            // line 97
            echo "    ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactBirthday", array())) {
                // line 98
                echo "        <tr>
            <th>";
                // line 99
                echo $this->env->getExtension('translator')->getTranslator()->trans("Contact birthday", array(), "messages");
                echo "</th>
            <td>
                    ";
                // line 101
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contactBirthday", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                echo "

            </td>
        </tr>
       ";
            }
            // line 106
            echo "     ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "city", array())) {
                // line 107
                echo "       <tr>
            <th>";
                // line 108
                echo $this->env->getExtension('translator')->getTranslator()->trans("City", array(), "messages");
                echo "</th>
            <td>
                    ";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "city", array()), "html", null, true);
                echo "
            </td>
        </tr>
       ";
            }
            // line 114
            echo "    ";
        }
        // line 115
        echo "

    ";
        // line 117
        if ((twig_in_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()), array(0 => 2, 1 => 3, 2 => 4)) && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "note", array()))) {
            // line 118
            echo "
        <tr>
            <th>";
            // line 120
            echo $this->env->getExtension('translator')->getTranslator()->trans("Note", array(), "messages");
            echo "</th>
            <td>";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "note", array()), "html", null, true);
            echo "</td>
        </tr>

    ";
        }
        // line 125
        echo "
    ";
        // line 126
        if ((twig_in_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()), array(0 => 4)) && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discountInfo", array()))) {
            // line 127
            echo "        <tr>
            <th>";
            // line 128
            echo $this->env->getExtension('translator')->getTranslator()->trans("Discount info", array(), "messages");
            echo "</th>
            <td>";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "discountInfo", array()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 132
        echo "

    ";
        // line 134
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "level", array()) == 2)) {
            // line 135
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "monday", array())) {
                // line 136
                echo "        <tr>
            <th>";
                // line 137
                echo $this->env->getExtension('translator')->getTranslator()->trans("Monday", array(), "messages");
                echo "</th>
            <td>";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "monday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 141
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tuesday", array())) {
                // line 142
                echo "        <tr>
            <th>";
                // line 143
                echo $this->env->getExtension('translator')->getTranslator()->trans("Tuesday", array(), "messages");
                echo "</th>
            <td>";
                // line 144
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tuesday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 147
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "wednesday", array())) {
                // line 148
                echo "        <tr>
            <th>";
                // line 149
                echo $this->env->getExtension('translator')->getTranslator()->trans("Wednesday", array(), "messages");
                echo "</th>
            <td>";
                // line 150
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "wednesday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 153
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "thursday", array())) {
                // line 154
                echo "        <tr>
            <th>";
                // line 155
                echo $this->env->getExtension('translator')->getTranslator()->trans("Thursday", array(), "messages");
                echo "</th>
            <td>";
                // line 156
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "thursday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 159
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "friday", array())) {
                // line 160
                echo "        <tr>
            <th>";
                // line 161
                echo $this->env->getExtension('translator')->getTranslator()->trans("Friday", array(), "messages");
                echo "</th>
            <td>";
                // line 162
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "friday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 165
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "saturday", array())) {
                // line 166
                echo "        <tr>
            <th>";
                // line 167
                echo $this->env->getExtension('translator')->getTranslator()->trans("Saturday", array(), "messages");
                echo "</th>
            <td>";
                // line 168
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "saturday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 171
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sunday", array())) {
                // line 172
                echo "        <tr>
            <th>";
                // line 173
                echo $this->env->getExtension('translator')->getTranslator()->trans("Sunday", array(), "messages");
                echo "</th>
            <td>";
                // line 174
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sunday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 177
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "holiday", array())) {
                // line 178
                echo "        <tr>
            <th>";
                // line 179
                echo $this->env->getExtension('translator')->getTranslator()->trans("Holiday", array(), "messages");
                echo "</th>
            <td>";
                // line 180
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "holiday", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 183
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "daily", array())) {
                // line 184
                echo "        <tr>
            <th>";
                // line 185
                echo $this->env->getExtension('translator')->getTranslator()->trans("Daily", array(), "messages");
                echo "</th>
            <td>";
                // line 186
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "daily", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 189
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "irregular", array())) {
                // line 190
                echo "        <tr>
            <th>";
                // line 191
                echo $this->env->getExtension('translator')->getTranslator()->trans("Irregular", array(), "messages");
                echo "</th>
            <td>";
                // line 192
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "irregular", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 195
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "christmasEve", array())) {
                // line 196
                echo "        <tr>
            <th>";
                // line 197
                echo $this->env->getExtension('translator')->getTranslator()->trans("Christmas eve", array(), "messages");
                echo "</th>
            <td>";
                // line 198
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "christmasEve", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 201
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "christmasDay", array())) {
                // line 202
                echo "        <tr>
            <th>";
                // line 203
                echo $this->env->getExtension('translator')->getTranslator()->trans("Christmas day", array(), "messages");
                echo "</th>
            <td>";
                // line 204
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "christmasDay", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 207
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "boxingDay", array())) {
                // line 208
                echo "        <tr>
            <th>";
                // line 209
                echo $this->env->getExtension('translator')->getTranslator()->trans("Boxing day", array(), "messages");
                echo "</th>
            <td>";
                // line 210
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "boxingDay", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 213
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "newYearsEve", array())) {
                // line 214
                echo "        <tr>
            <th>";
                // line 215
                echo $this->env->getExtension('translator')->getTranslator()->trans("New years eve", array(), "messages");
                echo "</th>
            <td>";
                // line 216
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "newYearsEve", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 219
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "newYearsDay", array())) {
                // line 220
                echo "        <tr>
            <th>";
                // line 221
                echo $this->env->getExtension('translator')->getTranslator()->trans("New years day", array(), "messages");
                echo "</th>
            <td>";
                // line 222
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "newYearsDay", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 225
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "postingInfo", array())) {
                // line 226
                echo "        <tr>
            <th>";
                // line 227
                echo $this->env->getExtension('translator')->getTranslator()->trans("Posting info", array(), "messages");
                echo "</th>
            <td>";
                // line 228
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "postingInfo", array()), "html", null, true);
                echo "</td>
        </tr>
        ";
            }
            // line 231
            echo "

        <tr>
            <th>";
            // line 234
            echo $this->env->getExtension('translator')->getTranslator()->trans("Internet permission", array(), "messages");
            echo "</th>
            <td>
                ";
            // line 236
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "internetPermission", array()))), "html", null, true);
            echo "
            </td>
        </tr>

        ";
            // line 240
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "checkWebsite", array())) {
                // line 241
                echo "        <tr>
            <th>";
                // line 242
                echo $this->env->getExtension('translator')->getTranslator()->trans("Check website", array(), "messages");
                echo "</th>
            <td>
                ";
                // line 244
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "checkWebsite", array())) {
                    // line 245
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "checkWebsite", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                    echo "
                ";
                }
                // line 247
                echo "            </td>
        </tr>
        ";
            }
            // line 250
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "checkCityPage", array())) {
                // line 251
                echo "        <tr>
            <th>";
                // line 252
                echo $this->env->getExtension('translator')->getTranslator()->trans("Check city page", array(), "messages");
                echo "</th>
            <td>
                ";
                // line 254
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "checkCityPage", array())) {
                    // line 255
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "checkCityPage", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                    echo "
                ";
                }
                // line 257
                echo "            </td>
        </tr>
        ";
            }
            // line 260
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastFbPrivatePost", array())) {
                // line 261
                echo "        <tr>
            <th>";
                // line 262
                echo $this->env->getExtension('translator')->getTranslator()->trans("Last fb private post", array(), "messages");
                echo "</th>
            <td>
                ";
                // line 264
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastFbPrivatePost", array())) {
                    // line 265
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastFbPrivatePost", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                    echo "
                ";
                }
                // line 267
                echo "            </td>
        </tr>
        ";
            }
            // line 270
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastVisit", array())) {
                // line 271
                echo "        <tr>
            <th>";
                // line 272
                echo $this->env->getExtension('translator')->getTranslator()->trans("Last visit", array(), "messages");
                echo "</th>
            <td>
                    ";
                // line 274
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lastVisit", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                echo "
            </td>
        </tr>
        ";
            }
            // line 278
            echo "
        ";
            // line 279
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cocktailCasino", array())) {
                // line 280
                echo "        <tr>
            <th>Premiere Cocktail Casino</th>
            <td>

                    ";
                // line 284
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cocktailCasino", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                echo "

            </td>
        </tr>
         ";
            }
            // line 289
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "ladiesNight", array())) {
                // line 290
                echo "        <tr>
            <th>Premiere Ladies Night</th>
            <td>
                    ";
                // line 293
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "ladiesNight", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                echo "
            </td>
        </tr>
        ";
            }
            // line 297
            echo "        ";
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nightlounge", array())) {
                // line 298
                echo "        <tr>
            <th>Premiere Nightlounge</th>
            <td>
                ";
                // line 301
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nightlounge", array())) {
                    // line 302
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nightlounge", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                    echo "
                ";
                }
                // line 304
                echo "            </td>
        </tr>
        ";
            }
            // line 307
            echo "
       ";
            // line 308
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fajitaDay", array())) {
                // line 309
                echo "        <tr>
            <th>Premiere Fajita Day</th>
            <td>
                ";
                // line 312
                if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fajitaDay", array())) {
                    // line 313
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fajitaDay", array()), (isset($context["defaultDateFormat"]) ? $context["defaultDateFormat"] : $this->getContext($context, "defaultDateFormat"))), "html", null, true);
                    echo "
                ";
                }
                // line 315
                echo "            </td>
        </tr>
        ";
            }
            // line 318
            echo "
        <tr>
            <th>";
            // line 320
            echo $this->env->getExtension('translator')->getTranslator()->trans("Invoices to beon", array(), "messages");
            echo "</th>
            <td>
                ";
            // line 322
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->env->getExtension('beon_extension')->boolFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "invoicesToBeon", array()))), "html", null, true);
            echo "
            </td>
        </tr>

        ";
            // line 326
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paymentMethod", array())) {
                // line 327
                echo "        <tr>
            <th>";
                // line 328
                echo $this->env->getExtension('translator')->getTranslator()->trans("Payment method", array(), "messages");
                echo "</th>
             <td>
                ";
                // line 330
                echo twig_escape_filter($this->env, $this->env->getExtension('beon_extension')->stakeholderPaymentTypeFilter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paymentMethod", array())), "html", null, true);
                echo "
            </td>
        </tr>
        ";
            }
            // line 334
            echo "
    ";
        }
        // line 336
        echo "
    </tbody>
    </table>
    </div>
    
    <div class=\"inline-forms\">
        ";
        // line 342
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_EDIT")) {
            echo "    
            <a class=\"btn btn-table-actions\" href=\"";
            // line 343
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                ";
            // line 344
            echo $this->env->getExtension('translator')->getTranslator()->trans("Edit", array(), "messages");
            // line 345
            echo "            </a>
        ";
        }
        // line 347
        echo "        ";
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
            echo " 
            ";
            // line 348
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "
        ";
        }
        // line 350
        echo "    </div>

    ";
        // line 352
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
            // line 353
            echo "        <div class=\"inline-forms\">
            ";
            // line 354
            if ($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL")) {
                // line 355
                echo "                ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["create_campaign_form"]) ? $context["create_campaign_form"] : $this->getContext($context, "create_campaign_form")), 'form');
                echo "
            ";
            }
            // line 357
            echo "
            ";
            // line 358
            if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL")) {
                // line 359
                echo "                ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["create_note_form"]) ? $context["create_note_form"] : $this->getContext($context, "create_note_form")), 'form');
                echo "
            ";
            }
            // line 361
            echo "
            ";
            // line 362
            if ($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL")) {
                // line 363
                echo "                ";
                echo                 $this->env->getExtension('form')->renderer->renderBlock((isset($context["create_pressrelease_form"]) ? $context["create_pressrelease_form"] : $this->getContext($context, "create_pressrelease_form")), 'form');
                echo "
            ";
            }
            // line 365
            echo "
            ";
            // line 366
            if ($this->env->getExtension('security')->isGranted("ROLE_USERS")) {
                // line 367
                echo "                <a class=\"btn btn-table-actions\"
                   href=\"";
                // line 368
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "user")), "html", null, true);
                echo "\">
                    ";
                // line 369
                echo $this->env->getExtension('translator')->getTranslator()->trans("Create user", array(), "messages");
                // line 370
                echo "                </a>
            ";
            }
            // line 372
            echo "
            ";
            // line 373
            if ($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL")) {
                // line 374
                echo "                <a class=\"btn btn-table-actions\"
                   href=\"";
                // line 375
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "complaint")), "html", null, true);
                echo "\">
                   ";
                // line 376
                echo $this->env->getExtension('translator')->getTranslator()->trans("Create complaint", array(), "messages");
                // line 377
                echo "                </a>
            ";
            }
            // line 379
            echo "
            ";
            // line 380
            if ($this->env->getExtension('security')->isGranted("ROLE_TASKS_NEW")) {
                // line 381
                echo "                <a class=\"btn btn-table-actions\"
                   href=\"";
                // line 382
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "task")), "html", null, true);
                echo "\">
                    ";
                // line 383
                echo $this->env->getExtension('translator')->getTranslator()->trans("Create task", array(), "messages");
                // line 384
                echo "                </a>
            ";
            }
            // line 386
            echo "
            ";
            // line 387
            if ($this->env->getExtension('security')->isGranted("ROLE_MONITOREDURL")) {
                // line 388
                echo "                <a class=\"btn btn-table-actions\"
                   href=\"";
                // line 389
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_new_related", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "name" => "monitoredurl")), "html", null, true);
                echo "\">
                    ";
                // line 390
                echo $this->env->getExtension('translator')->getTranslator()->trans("Add monitored url", array(), "messages");
                // line 391
                echo "                </a>
            ";
            }
            // line 393
            echo "        </div>
    ";
        }
        // line 395
        echo "
    <div>
        ";
        // line 397
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
            // line 398
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("IntranetBundle_CustomerDashboard", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
            echo "\">
                ";
            // line 399
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder Dashboard", array(), "messages");
            // line 400
            echo "            </a><br/>
        ";
        }
        // line 402
        echo "        ";
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_LIST")) {
            // line 403
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_level", array("level" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "Level", array()))), "html", null, true);
            echo "\">
                ";
            // line 404
            echo $this->env->getExtension('translator')->getTranslator()->trans("Back to the list", array(), "messages");
            // line 405
            echo "            </a>
        ";
        }
        // line 407
        echo "    </div>
    </div>

    </div>

    ";
        // line 412
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_ALL")) {
            // line 413
            echo "        ";
            $context["list"] = $this->env->loadTemplate("IntranetBundle:Macroses:budgetPeriodMacro.html.twig");
            // line 414
            echo "        ";
            echo $context["list"]->getbudgetList($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "budgetPeriods", array()), true, (isset($context["addBudgetWithForm"]) ? $context["addBudgetWithForm"] : $this->getContext($context, "addBudgetWithForm")), "span6");
            echo "
        ";
            // line 415
            $context["upload"] = $this->env->loadTemplate("IntranetBundle:Macroses:uploadFileMacro.html.twig");
            // line 416
            echo "        ";
            echo $context["upload"]->gettemplate((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customer");
            echo "
    ";
        }
        // line 418
        echo "
    ";
        // line 419
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "contacts", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contacts", array())) > 0))) {
            // line 420
            echo "        <div class=\"block span6\">
                <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#contactcontainer\">";
            // line 421
            echo $this->env->getExtension('translator')->getTranslator()->trans("Contacts", array(), "messages");
            echo "</div>

                <div id=\"contactcontainer\" class=\"block-body collapse in\">

                    <div id=\"tablewidget\" class=\"block-body collapse in\">
                        ";
            // line 426
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contacts", array());
            // line 427
            echo "
                        ";
            // line 428
            $this->env->loadTemplate("IntranetBundle:Customer:show.html.twig", "1785213517")->display($context);
            // line 436
            echo "
                    </div>
                </div>
        </div>
        ";
        }
        // line 441
        echo "


    </div>

    ";
        // line 446
        if ((($this->env->getExtension('security')->isGranted("ROLE_FACEBOOKURLS") && array_key_exists("facebookUrls", $context)) && (twig_length_filter($this->env, (isset($context["facebookUrls"]) ? $context["facebookUrls"] : $this->getContext($context, "facebookUrls"))) > 0))) {
            // line 447
            echo "        <div class=\"row-fluid\">
            ";
            // line 448
            $context["list"] = $this->env->loadTemplate("IntranetBundle:Macroses:customerFacebookUrlMacro.html.twig");
            // line 449
            echo "            ";
            echo $context["list"]->getfbUrlList((isset($context["facebookUrls"]) ? $context["facebookUrls"] : $this->getContext($context, "facebookUrls")));
            echo "

        </div>
    ";
        }
        // line 453
        echo "
    ";
        // line 454
        if ((($this->env->getExtension('security')->isGranted("ROLE_MONITOREDURLS") && array_key_exists("monitoredUrls", $context)) && (twig_length_filter($this->env, (isset($context["monitoredUrls"]) ? $context["monitoredUrls"] : $this->getContext($context, "monitoredUrls"))) > 0))) {
            // line 455
            echo "    <div class=\"row-fluid\">
        ";
            // line 456
            $context["list"] = $this->env->loadTemplate("IntranetBundle:Macroses:customerMonitoredUrlMacro.html.twig");
            // line 457
            echo "        ";
            echo $context["list"]->getmonitoredUrlList((isset($context["monitoredUrls"]) ? $context["monitoredUrls"] : $this->getContext($context, "monitoredUrls")));
            echo "
    </div>
    ";
        }
        // line 460
        echo "
    <div class=\"row-fluid\">

        ";
        // line 463
        if (($this->env->getExtension('security')->isGranted("ROLE_TASKS_ALL") && (twig_length_filter($this->env, (isset($context["tasks"]) ? $context["tasks"] : $this->getContext($context, "tasks"))) > 0))) {
            // line 464
            echo "            ";
            $context["taskList"] = $this->env->loadTemplate("IntranetBundle:Macroses:taskListMacro.html.twig");
            // line 465
            echo "            ";
            echo $context["taskList"]->gettemplate((isset($context["tasks"]) ? $context["tasks"] : $this->getContext($context, "tasks")));
            echo "
        ";
        }
        // line 467
        echo "
        ";
        // line 468
        if (($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL") && (twig_length_filter($this->env, (isset($context["notes"]) ? $context["notes"] : $this->getContext($context, "notes"))) > 0))) {
            // line 469
            echo "            <div class=\"block\">
                <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 470
            echo $this->env->getExtension('translator')->getTranslator()->trans("Notes", array(), "messages");
            echo "</div>

                <div id=\"widget1container\" class=\"block-body collapse in\">

                    <div id=\"tablewidget\" class=\"block-body collapse in\">
                        ";
            // line 475
            $context["entities"] = (isset($context["notes"]) ? $context["notes"] : $this->getContext($context, "notes"));
            // line 476
            echo "
                        ";
            // line 477
            $this->env->loadTemplate("IntranetBundle:Customer:show.html.twig", "2103186893")->display($context);
            // line 488
            echo "
                    </div>
                </div>
            </div>
        ";
        }
        // line 493
        echo "
        ";
        // line 494
        if (($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_ALL") && (twig_length_filter($this->env, (isset($context["presreleases"]) ? $context["presreleases"] : $this->getContext($context, "presreleases"))) > 0))) {
            // line 495
            echo "            <div class=\"block\">
                <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 496
            echo $this->env->getExtension('translator')->getTranslator()->trans("Press releases", array(), "messages");
            echo "</div>

                <div id=\"widget1container\" class=\"block-body collapse in\">

                    <div id=\"tablewidget\" class=\"block-body collapse in\">
                        ";
            // line 501
            $context["entities"] = (isset($context["presreleases"]) ? $context["presreleases"] : $this->getContext($context, "presreleases"));
            // line 502
            echo "
                        ";
            // line 503
            $this->env->loadTemplate("IntranetBundle:Customer:show.html.twig", "1912533371")->display($context);
            // line 515
            echo "
                    </div>
                </div>
            </div>
        ";
        }
        // line 520
        echo "
        ";
        // line 521
        if (($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_ALL") && (twig_length_filter($this->env, (isset($context["campaigns"]) ? $context["campaigns"] : $this->getContext($context, "campaigns"))) > 0))) {
            // line 522
            echo "            <div class=\"block\">
                <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 523
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaigns", array(), "messages");
            echo "</div>

                <div id=\"widget1container\" class=\"block-body collapse in\">

                    <div id=\"tablewidget\" class=\"block-body collapse in\">
                        ";
            // line 528
            $context["entities"] = (isset($context["campaigns"]) ? $context["campaigns"] : $this->getContext($context, "campaigns"));
            // line 529
            echo "
                        ";
            // line 530
            $this->env->loadTemplate("IntranetBundle:Customer:show.html.twig", "98355077")->display($context);
            // line 541
            echo "
                    </div>
                </div>
            </div>
        ";
        }
        // line 546
        echo "
        ";
        // line 547
        if (((($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS_ALL") && (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity"))) && $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaints", array())) && (twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaints", array())) > 0))) {
            // line 548
            echo "            <div class=\"block\">
                <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#widget1container\">";
            // line 549
            echo $this->env->getExtension('translator')->getTranslator()->trans("Complaints", array(), "messages");
            echo "</div>

                <div id=\"widget1container\" class=\"block-body collapse in\">

                    <div id=\"tablewidget\" class=\"block-body collapse in\">
                        ";
            // line 554
            $context["entities"] = $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "complaints", array());
            // line 555
            echo "
                        ";
            // line 556
            $this->env->loadTemplate("IntranetBundle:Customer:show.html.twig", "2049183228")->display(array_merge($context, array("flavor" => "status")));
            // line 567
            echo "
                    </div>
                </div>
            </div>
        ";
        }
        // line 572
        echo "    </div>

    ";
        // line 574
        $context["macro"] = $this->env->loadTemplate("IntranetBundle:Macroses:stakeHolderChildrenMacro.html.twig");
        // line 575
        echo "    ";
        if (($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : null), "affilicationType", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "affilicationType", array())) > 0))) {
            // line 576
            echo "        <div class=\"row-fluid\">
            ";
            // line 577
            echo $context["macro"]->getentitiesIndex($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "affilicationType", array()), "Affiliation types");
            echo "
        </div>
    ";
        }
        // line 580
        echo "    ";
        if (($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : null), "customer", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "customer", array())) > 0))) {
            // line 581
            echo "        <div class=\"row-fluid\">
            ";
            // line 582
            echo $context["macro"]->getentitiesIndex($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "customer", array()), "Customers");
            echo "
        </div>
    ";
        }
        // line 585
        echo "    ";
        if (($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : null), "project", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "project", array())) > 0))) {
            // line 586
            echo "        <div class=\"row-fluid\">
            ";
            // line 587
            echo $context["macro"]->getentitiesIndex($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "project", array()), "Projects");
            echo "
        </div>
    ";
        }
        // line 590
        echo "    ";
        if (($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : null), "cooperation", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "cooperation", array())) > 0))) {
            // line 591
            echo "        <div class=\"row-fluid\">
            ";
            // line 592
            echo $context["macro"]->getentitiesIndex($this->getAttribute((isset($context["stakeHolder"]) ? $context["stakeHolder"] : $this->getContext($context, "stakeHolder")), "cooperation", array()), "Cooperations");
            echo "
        </div>
    ";
        }
        // line 595
        echo "


";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1267 => 595,  1261 => 592,  1258 => 591,  1255 => 590,  1249 => 587,  1246 => 586,  1243 => 585,  1237 => 582,  1234 => 581,  1231 => 580,  1225 => 577,  1222 => 576,  1219 => 575,  1217 => 574,  1213 => 572,  1206 => 567,  1204 => 556,  1201 => 555,  1199 => 554,  1191 => 549,  1188 => 548,  1186 => 547,  1183 => 546,  1176 => 541,  1174 => 530,  1171 => 529,  1169 => 528,  1161 => 523,  1158 => 522,  1156 => 521,  1153 => 520,  1146 => 515,  1144 => 503,  1141 => 502,  1139 => 501,  1131 => 496,  1128 => 495,  1126 => 494,  1123 => 493,  1116 => 488,  1114 => 477,  1111 => 476,  1109 => 475,  1101 => 470,  1098 => 469,  1096 => 468,  1093 => 467,  1087 => 465,  1084 => 464,  1082 => 463,  1077 => 460,  1070 => 457,  1068 => 456,  1065 => 455,  1063 => 454,  1060 => 453,  1052 => 449,  1050 => 448,  1047 => 447,  1045 => 446,  1038 => 441,  1031 => 436,  1029 => 428,  1026 => 427,  1024 => 426,  1016 => 421,  1013 => 420,  1011 => 419,  1008 => 418,  1002 => 416,  1000 => 415,  995 => 414,  992 => 413,  990 => 412,  983 => 407,  979 => 405,  977 => 404,  972 => 403,  969 => 402,  965 => 400,  963 => 399,  958 => 398,  956 => 397,  952 => 395,  948 => 393,  944 => 391,  942 => 390,  938 => 389,  935 => 388,  933 => 387,  930 => 386,  926 => 384,  924 => 383,  920 => 382,  917 => 381,  915 => 380,  912 => 379,  908 => 377,  906 => 376,  902 => 375,  899 => 374,  897 => 373,  894 => 372,  890 => 370,  888 => 369,  884 => 368,  881 => 367,  879 => 366,  876 => 365,  870 => 363,  868 => 362,  865 => 361,  859 => 359,  857 => 358,  854 => 357,  848 => 355,  846 => 354,  843 => 353,  841 => 352,  837 => 350,  832 => 348,  827 => 347,  823 => 345,  821 => 344,  817 => 343,  813 => 342,  805 => 336,  801 => 334,  794 => 330,  789 => 328,  786 => 327,  784 => 326,  777 => 322,  772 => 320,  768 => 318,  763 => 315,  757 => 313,  755 => 312,  750 => 309,  748 => 308,  745 => 307,  740 => 304,  734 => 302,  732 => 301,  727 => 298,  724 => 297,  717 => 293,  712 => 290,  709 => 289,  701 => 284,  695 => 280,  693 => 279,  690 => 278,  683 => 274,  678 => 272,  675 => 271,  672 => 270,  667 => 267,  661 => 265,  659 => 264,  654 => 262,  651 => 261,  648 => 260,  643 => 257,  637 => 255,  635 => 254,  630 => 252,  627 => 251,  624 => 250,  619 => 247,  613 => 245,  611 => 244,  606 => 242,  603 => 241,  601 => 240,  594 => 236,  589 => 234,  584 => 231,  578 => 228,  574 => 227,  571 => 226,  568 => 225,  562 => 222,  558 => 221,  555 => 220,  552 => 219,  546 => 216,  542 => 215,  539 => 214,  536 => 213,  530 => 210,  526 => 209,  523 => 208,  520 => 207,  514 => 204,  510 => 203,  507 => 202,  504 => 201,  498 => 198,  494 => 197,  491 => 196,  488 => 195,  482 => 192,  478 => 191,  475 => 190,  472 => 189,  466 => 186,  462 => 185,  459 => 184,  456 => 183,  450 => 180,  446 => 179,  443 => 178,  440 => 177,  434 => 174,  430 => 173,  427 => 172,  424 => 171,  418 => 168,  414 => 167,  411 => 166,  408 => 165,  402 => 162,  398 => 161,  395 => 160,  392 => 159,  386 => 156,  382 => 155,  379 => 154,  376 => 153,  370 => 150,  366 => 149,  363 => 148,  360 => 147,  354 => 144,  350 => 143,  347 => 142,  344 => 141,  338 => 138,  334 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  316 => 129,  312 => 128,  309 => 127,  307 => 126,  304 => 125,  297 => 121,  293 => 120,  289 => 118,  287 => 117,  283 => 115,  280 => 114,  273 => 110,  268 => 108,  265 => 107,  262 => 106,  254 => 101,  249 => 99,  246 => 98,  243 => 97,  241 => 96,  238 => 95,  229 => 89,  223 => 86,  220 => 85,  218 => 84,  215 => 83,  207 => 78,  202 => 76,  199 => 75,  197 => 74,  194 => 73,  191 => 72,  185 => 69,  181 => 68,  178 => 67,  175 => 66,  169 => 63,  165 => 62,  162 => 61,  159 => 60,  153 => 57,  149 => 56,  146 => 55,  143 => 54,  141 => 53,  138 => 52,  135 => 51,  129 => 48,  125 => 47,  122 => 46,  119 => 45,  112 => 41,  108 => 40,  105 => 39,  102 => 38,  100 => 37,  97 => 36,  94 => 35,  88 => 32,  84 => 31,  81 => 30,  78 => 29,  76 => 28,  72 => 26,  62 => 21,  57 => 19,  54 => 18,  52 => 17,  43 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}


/* IntranetBundle:Customer:show.html.twig */
class __TwigTemplate_7e0a501403bec3740b83f2ffa4a0f57d26c0bc8eeacae75d4ad8f4b5bfeb49e4_1785213517 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Contact:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Contact:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 429
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 430
        echo "
                                    <a class=\"btn btn-table-actions\"
                                       href=\"";
        // line 432
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contact_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>

                            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1322 => 432,  1318 => 430,  1315 => 429,  1267 => 595,  1261 => 592,  1258 => 591,  1255 => 590,  1249 => 587,  1246 => 586,  1243 => 585,  1237 => 582,  1234 => 581,  1231 => 580,  1225 => 577,  1222 => 576,  1219 => 575,  1217 => 574,  1213 => 572,  1206 => 567,  1204 => 556,  1201 => 555,  1199 => 554,  1191 => 549,  1188 => 548,  1186 => 547,  1183 => 546,  1176 => 541,  1174 => 530,  1171 => 529,  1169 => 528,  1161 => 523,  1158 => 522,  1156 => 521,  1153 => 520,  1146 => 515,  1144 => 503,  1141 => 502,  1139 => 501,  1131 => 496,  1128 => 495,  1126 => 494,  1123 => 493,  1116 => 488,  1114 => 477,  1111 => 476,  1109 => 475,  1101 => 470,  1098 => 469,  1096 => 468,  1093 => 467,  1087 => 465,  1084 => 464,  1082 => 463,  1077 => 460,  1070 => 457,  1068 => 456,  1065 => 455,  1063 => 454,  1060 => 453,  1052 => 449,  1050 => 448,  1047 => 447,  1045 => 446,  1038 => 441,  1031 => 436,  1029 => 428,  1026 => 427,  1024 => 426,  1016 => 421,  1013 => 420,  1011 => 419,  1008 => 418,  1002 => 416,  1000 => 415,  995 => 414,  992 => 413,  990 => 412,  983 => 407,  979 => 405,  977 => 404,  972 => 403,  969 => 402,  965 => 400,  963 => 399,  958 => 398,  956 => 397,  952 => 395,  948 => 393,  944 => 391,  942 => 390,  938 => 389,  935 => 388,  933 => 387,  930 => 386,  926 => 384,  924 => 383,  920 => 382,  917 => 381,  915 => 380,  912 => 379,  908 => 377,  906 => 376,  902 => 375,  899 => 374,  897 => 373,  894 => 372,  890 => 370,  888 => 369,  884 => 368,  881 => 367,  879 => 366,  876 => 365,  870 => 363,  868 => 362,  865 => 361,  859 => 359,  857 => 358,  854 => 357,  848 => 355,  846 => 354,  843 => 353,  841 => 352,  837 => 350,  832 => 348,  827 => 347,  823 => 345,  821 => 344,  817 => 343,  813 => 342,  805 => 336,  801 => 334,  794 => 330,  789 => 328,  786 => 327,  784 => 326,  777 => 322,  772 => 320,  768 => 318,  763 => 315,  757 => 313,  755 => 312,  750 => 309,  748 => 308,  745 => 307,  740 => 304,  734 => 302,  732 => 301,  727 => 298,  724 => 297,  717 => 293,  712 => 290,  709 => 289,  701 => 284,  695 => 280,  693 => 279,  690 => 278,  683 => 274,  678 => 272,  675 => 271,  672 => 270,  667 => 267,  661 => 265,  659 => 264,  654 => 262,  651 => 261,  648 => 260,  643 => 257,  637 => 255,  635 => 254,  630 => 252,  627 => 251,  624 => 250,  619 => 247,  613 => 245,  611 => 244,  606 => 242,  603 => 241,  601 => 240,  594 => 236,  589 => 234,  584 => 231,  578 => 228,  574 => 227,  571 => 226,  568 => 225,  562 => 222,  558 => 221,  555 => 220,  552 => 219,  546 => 216,  542 => 215,  539 => 214,  536 => 213,  530 => 210,  526 => 209,  523 => 208,  520 => 207,  514 => 204,  510 => 203,  507 => 202,  504 => 201,  498 => 198,  494 => 197,  491 => 196,  488 => 195,  482 => 192,  478 => 191,  475 => 190,  472 => 189,  466 => 186,  462 => 185,  459 => 184,  456 => 183,  450 => 180,  446 => 179,  443 => 178,  440 => 177,  434 => 174,  430 => 173,  427 => 172,  424 => 171,  418 => 168,  414 => 167,  411 => 166,  408 => 165,  402 => 162,  398 => 161,  395 => 160,  392 => 159,  386 => 156,  382 => 155,  379 => 154,  376 => 153,  370 => 150,  366 => 149,  363 => 148,  360 => 147,  354 => 144,  350 => 143,  347 => 142,  344 => 141,  338 => 138,  334 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  316 => 129,  312 => 128,  309 => 127,  307 => 126,  304 => 125,  297 => 121,  293 => 120,  289 => 118,  287 => 117,  283 => 115,  280 => 114,  273 => 110,  268 => 108,  265 => 107,  262 => 106,  254 => 101,  249 => 99,  246 => 98,  243 => 97,  241 => 96,  238 => 95,  229 => 89,  223 => 86,  220 => 85,  218 => 84,  215 => 83,  207 => 78,  202 => 76,  199 => 75,  197 => 74,  194 => 73,  191 => 72,  185 => 69,  181 => 68,  178 => 67,  175 => 66,  169 => 63,  165 => 62,  162 => 61,  159 => 60,  153 => 57,  149 => 56,  146 => 55,  143 => 54,  141 => 53,  138 => 52,  135 => 51,  129 => 48,  125 => 47,  122 => 46,  119 => 45,  112 => 41,  108 => 40,  105 => 39,  102 => 38,  100 => 37,  97 => 36,  94 => 35,  88 => 32,  84 => 31,  81 => 30,  78 => 29,  76 => 28,  72 => 26,  62 => 21,  57 => 19,  54 => 18,  52 => 17,  43 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}


/* IntranetBundle:Customer:show.html.twig */
class __TwigTemplate_7e0a501403bec3740b83f2ffa4a0f57d26c0bc8eeacae75d4ad8f4b5bfeb49e4_2103186893 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Note:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
            'actionsHeader' => array($this, 'block_actionsHeader'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Note:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 478
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 479
        echo "                                <td>
                                    <a class=\"btn btn-table-actions\"
                                       href=\"";
        // line 481
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("note_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                                </td>
                            ";
    }

    // line 484
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 485
        echo "                                <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
                            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1392 => 485,  1389 => 484,  1380 => 481,  1376 => 479,  1373 => 478,  1322 => 432,  1318 => 430,  1315 => 429,  1267 => 595,  1261 => 592,  1258 => 591,  1255 => 590,  1249 => 587,  1246 => 586,  1243 => 585,  1237 => 582,  1234 => 581,  1231 => 580,  1225 => 577,  1222 => 576,  1219 => 575,  1217 => 574,  1213 => 572,  1206 => 567,  1204 => 556,  1201 => 555,  1199 => 554,  1191 => 549,  1188 => 548,  1186 => 547,  1183 => 546,  1176 => 541,  1174 => 530,  1171 => 529,  1169 => 528,  1161 => 523,  1158 => 522,  1156 => 521,  1153 => 520,  1146 => 515,  1144 => 503,  1141 => 502,  1139 => 501,  1131 => 496,  1128 => 495,  1126 => 494,  1123 => 493,  1116 => 488,  1114 => 477,  1111 => 476,  1109 => 475,  1101 => 470,  1098 => 469,  1096 => 468,  1093 => 467,  1087 => 465,  1084 => 464,  1082 => 463,  1077 => 460,  1070 => 457,  1068 => 456,  1065 => 455,  1063 => 454,  1060 => 453,  1052 => 449,  1050 => 448,  1047 => 447,  1045 => 446,  1038 => 441,  1031 => 436,  1029 => 428,  1026 => 427,  1024 => 426,  1016 => 421,  1013 => 420,  1011 => 419,  1008 => 418,  1002 => 416,  1000 => 415,  995 => 414,  992 => 413,  990 => 412,  983 => 407,  979 => 405,  977 => 404,  972 => 403,  969 => 402,  965 => 400,  963 => 399,  958 => 398,  956 => 397,  952 => 395,  948 => 393,  944 => 391,  942 => 390,  938 => 389,  935 => 388,  933 => 387,  930 => 386,  926 => 384,  924 => 383,  920 => 382,  917 => 381,  915 => 380,  912 => 379,  908 => 377,  906 => 376,  902 => 375,  899 => 374,  897 => 373,  894 => 372,  890 => 370,  888 => 369,  884 => 368,  881 => 367,  879 => 366,  876 => 365,  870 => 363,  868 => 362,  865 => 361,  859 => 359,  857 => 358,  854 => 357,  848 => 355,  846 => 354,  843 => 353,  841 => 352,  837 => 350,  832 => 348,  827 => 347,  823 => 345,  821 => 344,  817 => 343,  813 => 342,  805 => 336,  801 => 334,  794 => 330,  789 => 328,  786 => 327,  784 => 326,  777 => 322,  772 => 320,  768 => 318,  763 => 315,  757 => 313,  755 => 312,  750 => 309,  748 => 308,  745 => 307,  740 => 304,  734 => 302,  732 => 301,  727 => 298,  724 => 297,  717 => 293,  712 => 290,  709 => 289,  701 => 284,  695 => 280,  693 => 279,  690 => 278,  683 => 274,  678 => 272,  675 => 271,  672 => 270,  667 => 267,  661 => 265,  659 => 264,  654 => 262,  651 => 261,  648 => 260,  643 => 257,  637 => 255,  635 => 254,  630 => 252,  627 => 251,  624 => 250,  619 => 247,  613 => 245,  611 => 244,  606 => 242,  603 => 241,  601 => 240,  594 => 236,  589 => 234,  584 => 231,  578 => 228,  574 => 227,  571 => 226,  568 => 225,  562 => 222,  558 => 221,  555 => 220,  552 => 219,  546 => 216,  542 => 215,  539 => 214,  536 => 213,  530 => 210,  526 => 209,  523 => 208,  520 => 207,  514 => 204,  510 => 203,  507 => 202,  504 => 201,  498 => 198,  494 => 197,  491 => 196,  488 => 195,  482 => 192,  478 => 191,  475 => 190,  472 => 189,  466 => 186,  462 => 185,  459 => 184,  456 => 183,  450 => 180,  446 => 179,  443 => 178,  440 => 177,  434 => 174,  430 => 173,  427 => 172,  424 => 171,  418 => 168,  414 => 167,  411 => 166,  408 => 165,  402 => 162,  398 => 161,  395 => 160,  392 => 159,  386 => 156,  382 => 155,  379 => 154,  376 => 153,  370 => 150,  366 => 149,  363 => 148,  360 => 147,  354 => 144,  350 => 143,  347 => 142,  344 => 141,  338 => 138,  334 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  316 => 129,  312 => 128,  309 => 127,  307 => 126,  304 => 125,  297 => 121,  293 => 120,  289 => 118,  287 => 117,  283 => 115,  280 => 114,  273 => 110,  268 => 108,  265 => 107,  262 => 106,  254 => 101,  249 => 99,  246 => 98,  243 => 97,  241 => 96,  238 => 95,  229 => 89,  223 => 86,  220 => 85,  218 => 84,  215 => 83,  207 => 78,  202 => 76,  199 => 75,  197 => 74,  194 => 73,  191 => 72,  185 => 69,  181 => 68,  178 => 67,  175 => 66,  169 => 63,  165 => 62,  162 => 61,  159 => 60,  153 => 57,  149 => 56,  146 => 55,  143 => 54,  141 => 53,  138 => 52,  135 => 51,  129 => 48,  125 => 47,  122 => 46,  119 => 45,  112 => 41,  108 => 40,  105 => 39,  102 => 38,  100 => 37,  97 => 36,  94 => 35,  88 => 32,  84 => 31,  81 => 30,  78 => 29,  76 => 28,  72 => 26,  62 => 21,  57 => 19,  54 => 18,  52 => 17,  43 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}


/* IntranetBundle:Customer:show.html.twig */
class __TwigTemplate_7e0a501403bec3740b83f2ffa4a0f57d26c0bc8eeacae75d4ad8f4b5bfeb49e4_1912533371 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Pressrelease:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
            'actionsHeader' => array($this, 'block_actionsHeader'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Pressrelease:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 504
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 505
        echo "                                <td>
                                    <a class=\"btn btn-table-actions\"
                                       href=\"";
        // line 507
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pressrelease_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                                </td>

                            ";
    }

    // line 511
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 512
        echo "                                <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
                            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1461 => 512,  1458 => 511,  1448 => 507,  1444 => 505,  1441 => 504,  1392 => 485,  1389 => 484,  1380 => 481,  1376 => 479,  1373 => 478,  1322 => 432,  1318 => 430,  1315 => 429,  1267 => 595,  1261 => 592,  1258 => 591,  1255 => 590,  1249 => 587,  1246 => 586,  1243 => 585,  1237 => 582,  1234 => 581,  1231 => 580,  1225 => 577,  1222 => 576,  1219 => 575,  1217 => 574,  1213 => 572,  1206 => 567,  1204 => 556,  1201 => 555,  1199 => 554,  1191 => 549,  1188 => 548,  1186 => 547,  1183 => 546,  1176 => 541,  1174 => 530,  1171 => 529,  1169 => 528,  1161 => 523,  1158 => 522,  1156 => 521,  1153 => 520,  1146 => 515,  1144 => 503,  1141 => 502,  1139 => 501,  1131 => 496,  1128 => 495,  1126 => 494,  1123 => 493,  1116 => 488,  1114 => 477,  1111 => 476,  1109 => 475,  1101 => 470,  1098 => 469,  1096 => 468,  1093 => 467,  1087 => 465,  1084 => 464,  1082 => 463,  1077 => 460,  1070 => 457,  1068 => 456,  1065 => 455,  1063 => 454,  1060 => 453,  1052 => 449,  1050 => 448,  1047 => 447,  1045 => 446,  1038 => 441,  1031 => 436,  1029 => 428,  1026 => 427,  1024 => 426,  1016 => 421,  1013 => 420,  1011 => 419,  1008 => 418,  1002 => 416,  1000 => 415,  995 => 414,  992 => 413,  990 => 412,  983 => 407,  979 => 405,  977 => 404,  972 => 403,  969 => 402,  965 => 400,  963 => 399,  958 => 398,  956 => 397,  952 => 395,  948 => 393,  944 => 391,  942 => 390,  938 => 389,  935 => 388,  933 => 387,  930 => 386,  926 => 384,  924 => 383,  920 => 382,  917 => 381,  915 => 380,  912 => 379,  908 => 377,  906 => 376,  902 => 375,  899 => 374,  897 => 373,  894 => 372,  890 => 370,  888 => 369,  884 => 368,  881 => 367,  879 => 366,  876 => 365,  870 => 363,  868 => 362,  865 => 361,  859 => 359,  857 => 358,  854 => 357,  848 => 355,  846 => 354,  843 => 353,  841 => 352,  837 => 350,  832 => 348,  827 => 347,  823 => 345,  821 => 344,  817 => 343,  813 => 342,  805 => 336,  801 => 334,  794 => 330,  789 => 328,  786 => 327,  784 => 326,  777 => 322,  772 => 320,  768 => 318,  763 => 315,  757 => 313,  755 => 312,  750 => 309,  748 => 308,  745 => 307,  740 => 304,  734 => 302,  732 => 301,  727 => 298,  724 => 297,  717 => 293,  712 => 290,  709 => 289,  701 => 284,  695 => 280,  693 => 279,  690 => 278,  683 => 274,  678 => 272,  675 => 271,  672 => 270,  667 => 267,  661 => 265,  659 => 264,  654 => 262,  651 => 261,  648 => 260,  643 => 257,  637 => 255,  635 => 254,  630 => 252,  627 => 251,  624 => 250,  619 => 247,  613 => 245,  611 => 244,  606 => 242,  603 => 241,  601 => 240,  594 => 236,  589 => 234,  584 => 231,  578 => 228,  574 => 227,  571 => 226,  568 => 225,  562 => 222,  558 => 221,  555 => 220,  552 => 219,  546 => 216,  542 => 215,  539 => 214,  536 => 213,  530 => 210,  526 => 209,  523 => 208,  520 => 207,  514 => 204,  510 => 203,  507 => 202,  504 => 201,  498 => 198,  494 => 197,  491 => 196,  488 => 195,  482 => 192,  478 => 191,  475 => 190,  472 => 189,  466 => 186,  462 => 185,  459 => 184,  456 => 183,  450 => 180,  446 => 179,  443 => 178,  440 => 177,  434 => 174,  430 => 173,  427 => 172,  424 => 171,  418 => 168,  414 => 167,  411 => 166,  408 => 165,  402 => 162,  398 => 161,  395 => 160,  392 => 159,  386 => 156,  382 => 155,  379 => 154,  376 => 153,  370 => 150,  366 => 149,  363 => 148,  360 => 147,  354 => 144,  350 => 143,  347 => 142,  344 => 141,  338 => 138,  334 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  316 => 129,  312 => 128,  309 => 127,  307 => 126,  304 => 125,  297 => 121,  293 => 120,  289 => 118,  287 => 117,  283 => 115,  280 => 114,  273 => 110,  268 => 108,  265 => 107,  262 => 106,  254 => 101,  249 => 99,  246 => 98,  243 => 97,  241 => 96,  238 => 95,  229 => 89,  223 => 86,  220 => 85,  218 => 84,  215 => 83,  207 => 78,  202 => 76,  199 => 75,  197 => 74,  194 => 73,  191 => 72,  185 => 69,  181 => 68,  178 => 67,  175 => 66,  169 => 63,  165 => 62,  162 => 61,  159 => 60,  153 => 57,  149 => 56,  146 => 55,  143 => 54,  141 => 53,  138 => 52,  135 => 51,  129 => 48,  125 => 47,  122 => 46,  119 => 45,  112 => 41,  108 => 40,  105 => 39,  102 => 38,  100 => 37,  97 => 36,  94 => 35,  88 => 32,  84 => 31,  81 => 30,  78 => 29,  76 => 28,  72 => 26,  62 => 21,  57 => 19,  54 => 18,  52 => 17,  43 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}


/* IntranetBundle:Customer:show.html.twig */
class __TwigTemplate_7e0a501403bec3740b83f2ffa4a0f57d26c0bc8eeacae75d4ad8f4b5bfeb49e4_98355077 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Campaign:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
            'actionsHeader' => array($this, 'block_actionsHeader'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Campaign:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 531
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 532
        echo "                                <td>
                                    <a class=\"btn btn-table-actions\"
                                       href=\"";
        // line 534
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campaign_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                                </td>
                            ";
    }

    // line 537
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 538
        echo "                                <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
                            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1529 => 538,  1526 => 537,  1517 => 534,  1513 => 532,  1510 => 531,  1461 => 512,  1458 => 511,  1448 => 507,  1444 => 505,  1441 => 504,  1392 => 485,  1389 => 484,  1380 => 481,  1376 => 479,  1373 => 478,  1322 => 432,  1318 => 430,  1315 => 429,  1267 => 595,  1261 => 592,  1258 => 591,  1255 => 590,  1249 => 587,  1246 => 586,  1243 => 585,  1237 => 582,  1234 => 581,  1231 => 580,  1225 => 577,  1222 => 576,  1219 => 575,  1217 => 574,  1213 => 572,  1206 => 567,  1204 => 556,  1201 => 555,  1199 => 554,  1191 => 549,  1188 => 548,  1186 => 547,  1183 => 546,  1176 => 541,  1174 => 530,  1171 => 529,  1169 => 528,  1161 => 523,  1158 => 522,  1156 => 521,  1153 => 520,  1146 => 515,  1144 => 503,  1141 => 502,  1139 => 501,  1131 => 496,  1128 => 495,  1126 => 494,  1123 => 493,  1116 => 488,  1114 => 477,  1111 => 476,  1109 => 475,  1101 => 470,  1098 => 469,  1096 => 468,  1093 => 467,  1087 => 465,  1084 => 464,  1082 => 463,  1077 => 460,  1070 => 457,  1068 => 456,  1065 => 455,  1063 => 454,  1060 => 453,  1052 => 449,  1050 => 448,  1047 => 447,  1045 => 446,  1038 => 441,  1031 => 436,  1029 => 428,  1026 => 427,  1024 => 426,  1016 => 421,  1013 => 420,  1011 => 419,  1008 => 418,  1002 => 416,  1000 => 415,  995 => 414,  992 => 413,  990 => 412,  983 => 407,  979 => 405,  977 => 404,  972 => 403,  969 => 402,  965 => 400,  963 => 399,  958 => 398,  956 => 397,  952 => 395,  948 => 393,  944 => 391,  942 => 390,  938 => 389,  935 => 388,  933 => 387,  930 => 386,  926 => 384,  924 => 383,  920 => 382,  917 => 381,  915 => 380,  912 => 379,  908 => 377,  906 => 376,  902 => 375,  899 => 374,  897 => 373,  894 => 372,  890 => 370,  888 => 369,  884 => 368,  881 => 367,  879 => 366,  876 => 365,  870 => 363,  868 => 362,  865 => 361,  859 => 359,  857 => 358,  854 => 357,  848 => 355,  846 => 354,  843 => 353,  841 => 352,  837 => 350,  832 => 348,  827 => 347,  823 => 345,  821 => 344,  817 => 343,  813 => 342,  805 => 336,  801 => 334,  794 => 330,  789 => 328,  786 => 327,  784 => 326,  777 => 322,  772 => 320,  768 => 318,  763 => 315,  757 => 313,  755 => 312,  750 => 309,  748 => 308,  745 => 307,  740 => 304,  734 => 302,  732 => 301,  727 => 298,  724 => 297,  717 => 293,  712 => 290,  709 => 289,  701 => 284,  695 => 280,  693 => 279,  690 => 278,  683 => 274,  678 => 272,  675 => 271,  672 => 270,  667 => 267,  661 => 265,  659 => 264,  654 => 262,  651 => 261,  648 => 260,  643 => 257,  637 => 255,  635 => 254,  630 => 252,  627 => 251,  624 => 250,  619 => 247,  613 => 245,  611 => 244,  606 => 242,  603 => 241,  601 => 240,  594 => 236,  589 => 234,  584 => 231,  578 => 228,  574 => 227,  571 => 226,  568 => 225,  562 => 222,  558 => 221,  555 => 220,  552 => 219,  546 => 216,  542 => 215,  539 => 214,  536 => 213,  530 => 210,  526 => 209,  523 => 208,  520 => 207,  514 => 204,  510 => 203,  507 => 202,  504 => 201,  498 => 198,  494 => 197,  491 => 196,  488 => 195,  482 => 192,  478 => 191,  475 => 190,  472 => 189,  466 => 186,  462 => 185,  459 => 184,  456 => 183,  450 => 180,  446 => 179,  443 => 178,  440 => 177,  434 => 174,  430 => 173,  427 => 172,  424 => 171,  418 => 168,  414 => 167,  411 => 166,  408 => 165,  402 => 162,  398 => 161,  395 => 160,  392 => 159,  386 => 156,  382 => 155,  379 => 154,  376 => 153,  370 => 150,  366 => 149,  363 => 148,  360 => 147,  354 => 144,  350 => 143,  347 => 142,  344 => 141,  338 => 138,  334 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  316 => 129,  312 => 128,  309 => 127,  307 => 126,  304 => 125,  297 => 121,  293 => 120,  289 => 118,  287 => 117,  283 => 115,  280 => 114,  273 => 110,  268 => 108,  265 => 107,  262 => 106,  254 => 101,  249 => 99,  246 => 98,  243 => 97,  241 => 96,  238 => 95,  229 => 89,  223 => 86,  220 => 85,  218 => 84,  215 => 83,  207 => 78,  202 => 76,  199 => 75,  197 => 74,  194 => 73,  191 => 72,  185 => 69,  181 => 68,  178 => 67,  175 => 66,  169 => 63,  165 => 62,  162 => 61,  159 => 60,  153 => 57,  149 => 56,  146 => 55,  143 => 54,  141 => 53,  138 => 52,  135 => 51,  129 => 48,  125 => 47,  122 => 46,  119 => 45,  112 => 41,  108 => 40,  105 => 39,  102 => 38,  100 => 37,  97 => 36,  94 => 35,  88 => 32,  84 => 31,  81 => 30,  78 => 29,  76 => 28,  72 => 26,  62 => 21,  57 => 19,  54 => 18,  52 => 17,  43 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}


/* IntranetBundle:Customer:show.html.twig */
class __TwigTemplate_7e0a501403bec3740b83f2ffa4a0f57d26c0bc8eeacae75d4ad8f4b5bfeb49e4_2049183228 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("IntranetBundle:Complaint:indexTable.html.twig");

        $this->blocks = array(
            'actionsRows' => array($this, 'block_actionsRows'),
            'actionsHeader' => array($this, 'block_actionsHeader'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "IntranetBundle:Complaint:indexTable.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 557
    public function block_actionsRows($context, array $blocks = array())
    {
        // line 558
        echo "                                <td>
                                    <a class=\"btn btn-table-actions\"
                                       href=\"";
        // line 560
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("complaint_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("show", array(), "messages");
        echo "</a>
                                </td>
                            ";
    }

    // line 563
    public function block_actionsHeader($context, array $blocks = array())
    {
        // line 564
        echo "                                <th>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Actions", array(), "messages");
        echo "</th>
                            ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Customer:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1597 => 564,  1594 => 563,  1585 => 560,  1581 => 558,  1578 => 557,  1529 => 538,  1526 => 537,  1517 => 534,  1513 => 532,  1510 => 531,  1461 => 512,  1458 => 511,  1448 => 507,  1444 => 505,  1441 => 504,  1392 => 485,  1389 => 484,  1380 => 481,  1376 => 479,  1373 => 478,  1322 => 432,  1318 => 430,  1315 => 429,  1267 => 595,  1261 => 592,  1258 => 591,  1255 => 590,  1249 => 587,  1246 => 586,  1243 => 585,  1237 => 582,  1234 => 581,  1231 => 580,  1225 => 577,  1222 => 576,  1219 => 575,  1217 => 574,  1213 => 572,  1206 => 567,  1204 => 556,  1201 => 555,  1199 => 554,  1191 => 549,  1188 => 548,  1186 => 547,  1183 => 546,  1176 => 541,  1174 => 530,  1171 => 529,  1169 => 528,  1161 => 523,  1158 => 522,  1156 => 521,  1153 => 520,  1146 => 515,  1144 => 503,  1141 => 502,  1139 => 501,  1131 => 496,  1128 => 495,  1126 => 494,  1123 => 493,  1116 => 488,  1114 => 477,  1111 => 476,  1109 => 475,  1101 => 470,  1098 => 469,  1096 => 468,  1093 => 467,  1087 => 465,  1084 => 464,  1082 => 463,  1077 => 460,  1070 => 457,  1068 => 456,  1065 => 455,  1063 => 454,  1060 => 453,  1052 => 449,  1050 => 448,  1047 => 447,  1045 => 446,  1038 => 441,  1031 => 436,  1029 => 428,  1026 => 427,  1024 => 426,  1016 => 421,  1013 => 420,  1011 => 419,  1008 => 418,  1002 => 416,  1000 => 415,  995 => 414,  992 => 413,  990 => 412,  983 => 407,  979 => 405,  977 => 404,  972 => 403,  969 => 402,  965 => 400,  963 => 399,  958 => 398,  956 => 397,  952 => 395,  948 => 393,  944 => 391,  942 => 390,  938 => 389,  935 => 388,  933 => 387,  930 => 386,  926 => 384,  924 => 383,  920 => 382,  917 => 381,  915 => 380,  912 => 379,  908 => 377,  906 => 376,  902 => 375,  899 => 374,  897 => 373,  894 => 372,  890 => 370,  888 => 369,  884 => 368,  881 => 367,  879 => 366,  876 => 365,  870 => 363,  868 => 362,  865 => 361,  859 => 359,  857 => 358,  854 => 357,  848 => 355,  846 => 354,  843 => 353,  841 => 352,  837 => 350,  832 => 348,  827 => 347,  823 => 345,  821 => 344,  817 => 343,  813 => 342,  805 => 336,  801 => 334,  794 => 330,  789 => 328,  786 => 327,  784 => 326,  777 => 322,  772 => 320,  768 => 318,  763 => 315,  757 => 313,  755 => 312,  750 => 309,  748 => 308,  745 => 307,  740 => 304,  734 => 302,  732 => 301,  727 => 298,  724 => 297,  717 => 293,  712 => 290,  709 => 289,  701 => 284,  695 => 280,  693 => 279,  690 => 278,  683 => 274,  678 => 272,  675 => 271,  672 => 270,  667 => 267,  661 => 265,  659 => 264,  654 => 262,  651 => 261,  648 => 260,  643 => 257,  637 => 255,  635 => 254,  630 => 252,  627 => 251,  624 => 250,  619 => 247,  613 => 245,  611 => 244,  606 => 242,  603 => 241,  601 => 240,  594 => 236,  589 => 234,  584 => 231,  578 => 228,  574 => 227,  571 => 226,  568 => 225,  562 => 222,  558 => 221,  555 => 220,  552 => 219,  546 => 216,  542 => 215,  539 => 214,  536 => 213,  530 => 210,  526 => 209,  523 => 208,  520 => 207,  514 => 204,  510 => 203,  507 => 202,  504 => 201,  498 => 198,  494 => 197,  491 => 196,  488 => 195,  482 => 192,  478 => 191,  475 => 190,  472 => 189,  466 => 186,  462 => 185,  459 => 184,  456 => 183,  450 => 180,  446 => 179,  443 => 178,  440 => 177,  434 => 174,  430 => 173,  427 => 172,  424 => 171,  418 => 168,  414 => 167,  411 => 166,  408 => 165,  402 => 162,  398 => 161,  395 => 160,  392 => 159,  386 => 156,  382 => 155,  379 => 154,  376 => 153,  370 => 150,  366 => 149,  363 => 148,  360 => 147,  354 => 144,  350 => 143,  347 => 142,  344 => 141,  338 => 138,  334 => 137,  331 => 136,  328 => 135,  326 => 134,  322 => 132,  316 => 129,  312 => 128,  309 => 127,  307 => 126,  304 => 125,  297 => 121,  293 => 120,  289 => 118,  287 => 117,  283 => 115,  280 => 114,  273 => 110,  268 => 108,  265 => 107,  262 => 106,  254 => 101,  249 => 99,  246 => 98,  243 => 97,  241 => 96,  238 => 95,  229 => 89,  223 => 86,  220 => 85,  218 => 84,  215 => 83,  207 => 78,  202 => 76,  199 => 75,  197 => 74,  194 => 73,  191 => 72,  185 => 69,  181 => 68,  178 => 67,  175 => 66,  169 => 63,  165 => 62,  162 => 61,  159 => 60,  153 => 57,  149 => 56,  146 => 55,  143 => 54,  141 => 53,  138 => 52,  135 => 51,  129 => 48,  125 => 47,  122 => 46,  119 => 45,  112 => 41,  108 => 40,  105 => 39,  102 => 38,  100 => 37,  97 => 36,  94 => 35,  88 => 32,  84 => 31,  81 => 30,  78 => 29,  76 => 28,  72 => 26,  62 => 21,  57 => 19,  54 => 18,  52 => 17,  43 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}
