<?php

/* IntranetBundle::mainLayout.html.twig */
class __TwigTemplate_10c4d75764c4f66e12c2d4dcae0a0313094831f72e67e236ba7af0f20c699f9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'customerDashboard' => array($this, 'block_customerDashboard'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <title>EMAT by beon-communications</title>
    <base href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("beon_homepage");
        echo "\"/>
    <meta content=\"IE=edge,chrome=1\" http-equiv=\"X-UA-Compatible\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    
 ";
        // line 12
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 27
        echo "    
    
    ";
        // line 29
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "da81a27_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_jquery-1.11.1.min_1.js");
            // line 39
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_jquery-linedtextarea_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_bootstrap.min_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_select2.min_4.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_jstree_5.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_bootstrapValidator_6.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_jquery.messyCode_7.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "da81a27_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27_Modernizr-2.5.3.forms_8.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "da81a27"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_da81a27") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/da81a27.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 41
        echo "    <script type=\"text/javascript\" src=\"http://www.modernizr.com/downloads/modernizr-latest.js\"></script>
    <link rel=\"stylesheet\" href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery.ui.all.css\" />
   
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 12]>
    <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->

    ";
        // line 49
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 50
        echo "
    <!-- Needed for Validation --> 
    <script type=\"text/javascript\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/intranet/shared/js/html5Forms.js"), "html", null, true);
        echo "\" data-webforms2-support=\"date\" data-webforms2-force-js-validation=\"true\" data-lang=\"qq\"></script>   
</head>

<!--[if lt IE 7 ]>
<body class=\"ie ie6\"> <![endif]-->
<!--[if IE 7 ]>
<body class=\"ie ie7\"> <![endif]-->
<!--[if IE 8 ]>
<body class=\"ie ie8\"> <![endif]-->
<!--[if IE 9 ]>
<body class=\"ie ie9\"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body>

<!--<![endif]-->

";
        // line 68
        $this->displayBlock('body', $context, $blocks);
        // line 269
        echo "

    <div class=\"modal small hide fade\" id=\"deleteModal\" tabindex=\"-1\" role=\"dialog\"
         aria-hidden=\"true\" style=\"display: none;\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3>";
        // line 275
        echo $this->env->getExtension('translator')->getTranslator()->trans("Delete Confirmation", array(), "messages");
        echo "</h3>
        </div>
        <div class=\"modal-body\">
            <p class=\"error-text\"><i class=\"icon-warning-sign modal-icon\"></i>";
        // line 278
        echo $this->env->getExtension('translator')->getTranslator()->trans("Are you sure you want to delete?", array(), "messages");
        echo "</p>
        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 281
        echo $this->env->getExtension('translator')->getTranslator()->trans("Cancel", array(), "messages");
        echo "</button>
            <button class=\"btn btn-danger\" data-dismiss=\"deleteAction\">";
        // line 282
        echo $this->env->getExtension('translator')->getTranslator()->trans("Delete", array(), "messages");
        echo "</button>
        </div>
    </div>

    <div class=\"modal small hide fade\" id=\"dbEnumModal\" tabindex=\"-1\" role=\"dialog\"
         aria-hidden=\"true\" style=\"display: none;\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3>";
        // line 290
        echo $this->env->getExtension('translator')->getTranslator()->trans("Another value..", array(), "messages");
        echo "</h3>
        </div>
        <div class=\"modal-body\">
            <p><i class=\"modal-icon mt20\"></i>
                <textarea id=\"amendDbEnumValue\" placeholder=\"";
        // line 294
        echo $this->env->getExtension('translator')->getTranslator()->trans("Enter a new value", array(), "messages");
        echo "\"></textarea>
                ";
        // line 295
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) && $this->env->getExtension('security')->isGranted("ROLE_ENUM_MAKE_REUSABLE"))) {
            echo "  
                    <label><input type=\"checkbox\" id=\"amendDbEnumReuse\" /> ";
            // line 296
            echo $this->env->getExtension('translator')->getTranslator()->trans("Make this value available for reuse", array(), "messages");
            echo "</label>
                ";
        }
        // line 298
        echo "            </p>
        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 301
        echo $this->env->getExtension('translator')->getTranslator()->trans("Cancel", array(), "messages");
        echo "</button>
            <button class=\"btn\" data-dismiss=\"amendDbEnumAction\">";
        // line 302
        echo $this->env->getExtension('translator')->getTranslator()->trans("Ok", array(), "messages");
        echo "</button>
        </div>
    </div>

    <script type=\"text/javascript\">
        var errors = ";
        // line 307
        echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        echo ";
        var error = errors.pop()

        if (error) {
            alert(error);
        }

        function confirmation() {
             return confirm('";
        // line 315
        echo $this->env->getExtension('translator')->getTranslator()->trans("Are you sure? You might loose unsaved changes.", array(), "messages");
        echo "');
        }
\t
\t    var disallowedFileTypes = new Array();
\t    ";
        // line 319
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["disallowedFileTypes"]) ? $context["disallowedFileTypes"] : $this->getContext($context, "disallowedFileTypes")));
        foreach ($context['_seq'] as $context["_key"] => $context["disallowedFileType"]) {
            // line 320
            echo "\t        disallowedFileTypes.push(\"";
            echo twig_escape_filter($this->env, $context["disallowedFileType"], "html", null, true);
            echo "\");
\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['disallowedFileType'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 322
        echo "\t
\t    var matched, browser;
\t    jQuery.uaMatch = function( ua ) {
\t        ua = ua.toLowerCase();

\t        var match = /(chrome)[ \\/]([\\w.]+)/.exec( ua ) ||
\t\t    /(webkit)[ \\/]([\\w.]+)/.exec( ua ) ||
\t\t    /(opera)(?:.*version|)[ \\/]([\\w.]+)/.exec( ua ) ||
\t\t    /(msie) ([\\w.]+)/.exec( ua ) ||
\t\t    ua.indexOf(\"compatible\") < 0 && /(mozilla)(?:.*? rv:([\\w.]+)|)/.exec( ua ) ||
\t\t    [];

\t        return {
\t\t    browser: match[ 1 ] || \"\",
\t\t    version: match[ 2 ] || \"0\"
\t        };
\t    };
\t    matched = jQuery.uaMatch( navigator.userAgent );
\t    browser = {};
\t    if ( matched.browser ) {
\t        browser[ matched.browser ] = true;
\t        browser.version = matched.version;
\t    }

\t    // Chrome is Webkit, but Webkit is also Safari.
\t    if ( browser.chrome ) {
\t        browser.webkit = true;
\t    } else if ( browser.webkit ) {
\t        browser.safari = true;
\t    }
\t    jQuery.browser = browser;
\t
\t    \$(document).ready(function() {
\t\t    var fileUploadedCount = 1;
\t\t    var errorMsgInvalidFileType = \"";
        // line 356
        echo $this->env->getExtension('translator')->getTranslator()->trans("Invalid file type", array(), "messages");
        echo "\";
\t\t
\t\t    \$(\".fileOnClick\").click(function() {
                var parent = \$(this).parent();
\t\t\t    var fileData = \$(\".fileUploadDiv\", parent).html();
\t\t\t    fileData = fileData.replace(new RegExp('default','g'),fileUploadedCount);
\t\t\t    fileData = fileData.replace(new RegExp(errorMsgInvalidFileType,'g'),'');
\t\t\t    \$(\".fileGetUploadDiv\", parent).append(fileData);
\t\t\t    fileUploadedCount++;
\t\t    });\t\t
\t\t
\t\t    \$('.multipleFileWidget').on(\"change\", \".validateFileType\", function () { 
\t\t        var filename = \$(this).val();
\t\t        var extension = filename.replace(/^.*\\./, '');\t      
\t\t        
\t\t        if (jQuery.inArray(extension, disallowedFileTypes)!==-1) {\t
\t\t\t        \$(this).val('');
\t\t\t        \$(\"#error-\"+this.id).html(errorMsgInvalidFileType);
\t\t\t        \$(\"#error-\"+this.id).show();
\t\t        } else {
\t\t\t        \$(\"#error-\"+this.id).html(\"\");
\t\t\t        \$(\"#error-\"+this.id).hide();
\t\t        }
\t\t    });
\t\t
\t\t    \$(\".reloadPage\").click(function() {\t  
\t\t        window.location.href=window.location.href;
\t\t    });
\t    });
    </script>
    
   ";
        // line 387
        $this->displayBlock('javascripts', $context, $blocks);
        // line 389
        echo "</body>
</html>
";
    }

    // line 12
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f175062_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_bootstrap_1.css");
            // line 24
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_theme_2.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_font-awesome_3.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_myelements_4.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_jquery-linedtextarea_5.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_common_6.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_select2_7.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_bootstrapValidator_8.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
            // asset "f175062_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062_8") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062_style_9.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
        } else {
            // asset "f175062"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f175062") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f175062.css");
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
    ";
        }
        unset($context["asset_url"]);
    }

    // line 49
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 68
    public function block_body($context, array $blocks = array())
    {
        // line 69
        echo "
<div class=\"navbar\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            ";
        // line 73
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "displayName", array(), "any", true, true)) {
            // line 74
            echo "            <ul class=\"nav pull-right\">

                <li id=\"fat-menu\" class=\"dropdown\">
                    <a href=\"#\" id=\"drop3\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"icon-user\"></i> ";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "displayName", array()), "html", null, true);
            echo "
                        <i class=\"icon-caret-down\"></i>
                    </a>

                    <ul class=\"dropdown-menu\">
                        ";
            // line 84
            echo "                        ";
            // line 85
            echo "                        <li><a tabindex=\"-1\" href=\"logout\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Logout", array(), "messages");
            echo "</a></li>
                    </ul>
                </li>

            </ul>
            ";
        }
        // line 91
        echo "            
            <a class=\"brand\" href=\"/\"><span class=\"first\">EMAT</span> <span class=\"second\">by beon-communications</span></a>
        </div>
    </div>
</div>


<div class=\"container-fluid\">
    ";
        // line 99
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 100
            echo "        <div class=\"alert alert-success\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
            ";
            // line 102
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "    <div class=\"row-fluid\">

        <div class=\"span3\">
            <div class=\"sidebar-nav\">
                <div class=\"nav-header\" data-toggle=\"collapse\" data-target=\"#dashboard-menu\">
                    <i class=\"icon-dashboard\"></i>";
        // line 110
        echo $this->env->getExtension('translator')->getTranslator()->trans("Menu", array(), "messages");
        // line 111
        echo "                </div>
                <ul id=\"dashboard-menu\" class=\"nav nav-list collapse in\">
                    ";
        // line 113
        if ($this->env->getExtension('security')->isGranted("ROLE_CUSTOMER_DASHBOARD")) {
            // line 114
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("beon_homepage");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Dashboard", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 116
        echo "
                    ";
        // line 117
        if ($this->env->getExtension('security')->isGranted("ROLE_CUSTOMER_DASHBOARD")) {
            // line 118
            echo "                        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_show", array("id" => (isset($context["customerId"]) ? $context["customerId"] : $this->getContext($context, "customerId")))), "html", null, true);
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Customer data", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 120
        echo "
                    ";
        // line 121
        if ($this->env->getExtension('security')->isGranted("ROLE_USERS")) {
            // line 122
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("accesslevel");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Access level", array(), "messages");
            echo "</a></li>
                        <li><a href=\"";
            // line 123
            echo $this->env->getExtension('routing')->getPath("user");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Users", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 125
        echo "
                    ";
        // line 126
        if (($this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS") || $this->env->getExtension('security')->isGranted("ROLE_CAMPAIGNS_CUSTOMER"))) {
            // line 127
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("campaign");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 129
        echo "
                    ";
        // line 130
        if (($this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES") || $this->env->getExtension('security')->isGranted("ROLE_PRESSRELEASES_CUSTOMER"))) {
            // line 131
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("pressrelease");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Press release", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 133
        echo "
                    ";
        // line 134
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPPLIERS")) {
            // line 135
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("supplier");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier", array(), "messages");
            echo "</a></li>
                        <li><a href=\"";
            // line 136
            echo $this->env->getExtension('routing')->getPath("suppliergroup");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Supplier groups", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 138
        echo "
                    ";
        // line 139
        if ($this->env->getExtension('security')->isGranted("ROLE_CONTACTS")) {
            // line 140
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("contact");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Contacts", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 142
        echo "
                    ";
        // line 143
        if ($this->env->getExtension('security')->isGranted("ROLE_NOTES_ALL")) {
            // line 144
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("note");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Note", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 146
        echo "
                    ";
        // line 147
        if ($this->env->getExtension('security')->isGranted("ROLE_FACEBOOKURLS")) {
            // line 148
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("facebookurl");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 150
        echo "
                    ";
        // line 151
        if ($this->env->getExtension('security')->isGranted("ROLE_FACEBOOKURLS")) {
            // line 152
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("customerfacebookurl");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholder", array(), "messages");
            echo " => ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Url", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 154
        echo "
                    ";
        // line 155
        if ($this->env->getExtension('security')->isGranted("ROLE_MONITOREDURLS")) {
            echo "  
                        <li><a href=\"";
            // line 156
            echo $this->env->getExtension('routing')->getPath("monitoredurl");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Monitored Url", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 158
        echo "
                    ";
        // line 159
        if ($this->env->getExtension('security')->isGranted("ROLE_SURVEYRESULTS")) {
            echo "  
                        <li><a href=\"";
            // line 160
            echo $this->env->getExtension('routing')->getPath("surveyresult");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Survey results", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 162
        echo "
                    ";
        // line 163
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPLAINTS")) {
            echo "  
                        <li><a href=\"";
            // line 164
            echo $this->env->getExtension('routing')->getPath("complaint");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Complaint", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 166
        echo "
                    ";
        // line 167
        if ($this->env->getExtension('security')->isGranted("ROLE_UPLOADS_LIST_ALL")) {
            echo "  
                        <li><a href=\"";
            // line 168
            echo $this->env->getExtension('routing')->getPath("upload");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Upload", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 170
        echo "
                    ";
        // line 171
        if (($this->env->getExtension('security')->isGranted("ROLE_TIMETRACKINGS") || $this->env->getExtension('security')->isGranted("timetrackings_own"))) {
            echo "  
                        <li><a href=\"";
            // line 172
            echo $this->env->getExtension('routing')->getPath("timetracking");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Timetracking", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 174
        echo "
                    ";
        // line 175
        if ($this->env->getExtension('security')->isGranted("ROLE_CITIES")) {
            echo "  
                        <li><a href=\"";
            // line 176
            echo $this->env->getExtension('routing')->getPath("city");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("City", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 178
        echo "
                    ";
        // line 179
        if ((($this->env->getExtension('security')->isGranted("ROLE_TASKS") || $this->env->getExtension('security')->isGranted("ROLE_TASKS_CUSTOMER")) || $this->env->getExtension('security')->isGranted("ROLE_TASKS_GROUPS"))) {
            echo "  
                        <li><a href=\"";
            // line 180
            echo $this->env->getExtension('routing')->getPath("task");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Tasks", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 182
        echo "
                    ";
        // line 183
        if ($this->env->getExtension('security')->isGranted("ROLE_CONFIG")) {
            // line 184
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("configvalue");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Config", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 186
        echo "                    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ENUMS_EDIT")) {
            // line 187
            echo "                        <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("enumvalue");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Enum Value", array(), "messages");
            echo "</a></li>
                    ";
        }
        // line 189
        echo "
                </ul>

            </div>
            ";
        // line 193
        if ($this->env->getExtension('security')->isGranted("ROLE_STAKEHOLDERS_LIST")) {
            // line 194
            echo "                <div class=\"sidebar-nav\">
                    <div class=\"nav-header\" data-toggle=\"collapse\" data-target=\"#dashboard-stakeholders\"><i
                                class=\"icon-dashboard\"></i>";
            // line 196
            echo $this->env->getExtension('translator')->getTranslator()->trans("Stakeholders", array(), "messages");
            // line 197
            echo "                    </div>
                    <ul id=\"dashboard-stakeholders\" class=\"nav nav-list collapse in\">

                        ";
            // line 200
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["CUSTOMER_LEVELS"]) ? $context["CUSTOMER_LEVELS"] : $this->getContext($context, "CUSTOMER_LEVELS")));
            foreach ($context['_seq'] as $context["key"] => $context["level"]) {
                // line 201
                echo "                            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("customer_level", array("level" => $context["key"])), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(($context["level"] . "s")), "html", null, true);
                echo "</a></li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['level'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            echo "
                    </ul>
                </div>
            ";
        }
        // line 207
        echo "
            ";
        // line 208
        if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS")) {
            // line 209
            echo "                <div class=\"sidebar-nav\">
                    <div class=\"nav-header\" data-toggle=\"collapse\" data-target=\"#dashboard-report\">
                        <i class=\"icon-dashboard\"></i>Reports
                    </div>
                    <ul id=\"dashboard-report\" class=\"nav nav-list collapse in\">
                        ";
            // line 214
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_SURVEY")) {
                // line 215
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_survey_analysis");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Survey Analysis Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 217
            echo "                        ";
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_TIMETRACKING")) {
                // line 218
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_time_track");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Time Tracking Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 220
            echo "                        ";
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_MISSINGTT")) {
                // line 221
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_missingtt");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Missing Time Trackings Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 223
            echo "                        ";
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_CAMPAIGNSAVINGS")) {
                // line 224
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_campaign_saving");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Campaign Savings Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 226
            echo "                        ";
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_FACEBOOK")) {
                // line 227
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_facebook");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Facebook Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 229
            echo "                        ";
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_CPSPM")) {
                // line 230
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_cpspm");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("CPSPM Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 232
            echo "                        ";
            if ($this->env->getExtension('security')->isGranted("ROLE_REPORTS_VISIT")) {
                // line 233
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("report_visit");
                echo "\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Visit Report", array(), "messages");
                echo "</a></li>
                        ";
            }
            // line 235
            echo "                    </ul>
                </div>
            ";
        }
        // line 238
        echo "
        </div>
        <div class=\"span9\">

            ";
        // line 242
        $this->displayBlock('content', $context, $blocks);
        // line 255
        echo "

        </div>


        <footer>
            &nbsp;
        </footer>


    </div>


    ";
    }

    // line 242
    public function block_content($context, array $blocks = array())
    {
        // line 243
        echo "                <h1 class=\"page-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Dashboard", array(), "messages");
        echo "</h1>


                <div class=\"row-fluid\">


                    ";
        // line 249
        $this->displayBlock('customerDashboard', $context, $blocks);
        // line 251
        echo "

                </div>
            ";
    }

    // line 249
    public function block_customerDashboard($context, array $blocks = array())
    {
        // line 250
        echo "                    ";
    }

    // line 387
    public function block_javascripts($context, array $blocks = array())
    {
        // line 388
        echo "   ";
    }

    public function getTemplateName()
    {
        return "IntranetBundle::mainLayout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  932 => 388,  929 => 387,  925 => 250,  922 => 249,  915 => 251,  913 => 249,  903 => 243,  900 => 242,  883 => 255,  881 => 242,  875 => 238,  870 => 235,  862 => 233,  859 => 232,  851 => 230,  848 => 229,  840 => 227,  837 => 226,  829 => 224,  826 => 223,  818 => 221,  815 => 220,  807 => 218,  804 => 217,  796 => 215,  794 => 214,  787 => 209,  785 => 208,  782 => 207,  776 => 203,  765 => 201,  761 => 200,  756 => 197,  754 => 196,  750 => 194,  748 => 193,  742 => 189,  734 => 187,  731 => 186,  723 => 184,  721 => 183,  718 => 182,  711 => 180,  707 => 179,  704 => 178,  697 => 176,  693 => 175,  690 => 174,  683 => 172,  679 => 171,  676 => 170,  669 => 168,  665 => 167,  662 => 166,  655 => 164,  651 => 163,  648 => 162,  641 => 160,  637 => 159,  634 => 158,  627 => 156,  623 => 155,  620 => 154,  610 => 152,  608 => 151,  605 => 150,  597 => 148,  595 => 147,  592 => 146,  584 => 144,  582 => 143,  579 => 142,  571 => 140,  569 => 139,  566 => 138,  559 => 136,  552 => 135,  550 => 134,  547 => 133,  539 => 131,  537 => 130,  534 => 129,  526 => 127,  524 => 126,  521 => 125,  514 => 123,  507 => 122,  505 => 121,  502 => 120,  494 => 118,  492 => 117,  489 => 116,  481 => 114,  479 => 113,  475 => 111,  473 => 110,  466 => 105,  457 => 102,  453 => 100,  449 => 99,  439 => 91,  429 => 85,  427 => 84,  419 => 78,  413 => 74,  411 => 73,  405 => 69,  402 => 68,  397 => 49,  333 => 24,  328 => 13,  325 => 12,  319 => 389,  317 => 387,  283 => 356,  247 => 322,  238 => 320,  234 => 319,  227 => 315,  216 => 307,  208 => 302,  204 => 301,  199 => 298,  194 => 296,  190 => 295,  186 => 294,  179 => 290,  168 => 282,  164 => 281,  158 => 278,  152 => 275,  144 => 269,  142 => 68,  123 => 52,  119 => 50,  117 => 49,  107 => 41,  51 => 39,  47 => 29,  43 => 27,  41 => 12,  32 => 6,  25 => 1,);
    }
}
