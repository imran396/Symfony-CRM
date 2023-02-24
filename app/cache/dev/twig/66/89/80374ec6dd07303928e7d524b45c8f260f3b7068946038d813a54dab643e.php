<?php

/* IntranetBundle:Upload:external.html.twig */
class __TwigTemplate_668980374ec6dd07303928e7d524b45c8f260f3b7068946038d813a54dab643e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'content' => array($this, 'block_content'),
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
    <!--[if lt IE 9]>
    <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel=\"shortcut icon\" href=\"../assets/ico/favicon.ico\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"../assets/ico/apple-touch-icon-144-precomposed.png\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"../assets/ico/apple-touch-icon-114-precomposed.png\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"../assets/ico/apple-touch-icon-72-precomposed.png\">
    <link rel=\"apple-touch-icon-precomposed\" href=\"../assets/ico/apple-touch-icon-57-precomposed.png\">
    ";
        // line 55
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 56
        echo "    <script language=\"javascript\">
\t\$(document).ready(function() {
\t\tvar fileUploadedCount = 1;
\t\tvar errorMsgInvalidFileType = \"";
        // line 59
        echo $this->env->getExtension('translator')->getTranslator()->trans("Invalid file type", array(), "messages");
        echo "\";

\t\t\$(\"#fileOnClick\").click(function() {
\t\t\tvar fileData = \$(\"#fileUploadDiv\").html();
\t\t\tfileData = fileData.replace(new RegExp('default','g'),fileUploadedCount);
\t\t\tfileData = fileData.replace(new RegExp(errorMsgInvalidFileType,'g'),'');
\t\t\t\$(\"#fileGetUploadDiv\").append(fileData);
\t\t\tfileUploadedCount++;
\t\t});


\t\t\$('#multipleFileWidget').on(\"change\", \".validateFileType\", function () {
\t\t    var filename = \$(this).val();
\t\t    var extension = filename.replace(/^.*\\./, '');

\t\t    if (jQuery.inArray(extension, disallowedFileTypes)!==-1) {
\t\t\t    \$(this).val('');
\t\t\t    \$(\"#error-\"+this.id).html(errorMsgInvalidFileType);
\t\t\t    \$(\"#error-\"+this.id).show();
\t\t    } else {
\t\t\t    \$(\"#error-\"+this.id).html(\"\");
\t\t\t    \$(\"#error-\"+this.id).hide();
\t\t    }
\t\t});
\t});

\tvar disallowedFileTypes = new Array();
\t";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["disallowedFileTypes"]) ? $context["disallowedFileTypes"] : $this->getContext($context, "disallowedFileTypes")));
        foreach ($context['_seq'] as $context["_key"] => $context["disallowedFileType"]) {
            // line 87
            echo "\t    disallowedFileTypes.push(\"";
            echo twig_escape_filter($this->env, $context["disallowedFileType"], "html", null, true);
            echo "\");
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['disallowedFileType'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "
\tvar matched, browser;
\tjQuery.uaMatch = function( ua ) {
\t    ua = ua.toLowerCase();

\t    var match = /(chrome)[ \\/]([\\w.]+)/.exec( ua ) ||
\t\t/(webkit)[ \\/]([\\w.]+)/.exec( ua ) ||
\t\t/(opera)(?:.*version|)[ \\/]([\\w.]+)/.exec( ua ) ||
\t\t/(msie) ([\\w.]+)/.exec( ua ) ||
\t\tua.indexOf(\"compatible\") < 0 && /(mozilla)(?:.*? rv:([\\w.]+)|)/.exec( ua ) ||
\t\t[];

\t    return {
\t\tbrowser: match[ 1 ] || \"\",
\t\tversion: match[ 2 ] || \"0\"
\t    };
\t};
\tmatched = jQuery.uaMatch( navigator.userAgent );
\tbrowser = {};
\tif ( matched.browser ) {
\t    browser[ matched.browser ] = true;
\t    browser.version = matched.version;
\t}

\t// Chrome is Webkit, but Webkit is also Safari.
\tif ( browser.chrome ) {
\t    browser.webkit = true;
\t} else if ( browser.webkit ) {
\t    browser.safari = true;
\t}
\tjQuery.browser = browser;


    </script>

    <!-- Needed for Validation -->
    <script type=\"text/javascript\" src=\"";
        // line 125
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
<div class=\"navbar\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            ";
        // line 144
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "displayName", array(), "any", true, true)) {
            // line 145
            echo "            <ul class=\"nav pull-right\">

                <li id=\"fat-menu\" class=\"dropdown\">
                    <a href=\"#\" id=\"drop3\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        <i class=\"icon-user\"></i> ";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "displayName", array()), "html", null, true);
            echo "
                        <i class=\"icon-caret-down\"></i>
                    </a>

                    <ul class=\"dropdown-menu\">
                        ";
            // line 155
            echo "                        ";
            // line 156
            echo "                        <li><a tabindex=\"-1\" href=\"logout\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Logout", array(), "messages");
            echo "</a></li>
                    </ul>
                </li>

            </ul>
            ";
        }
        // line 162
        echo "
            <a class=\"brand\" href=\"/\"><span class=\"first\">EMAT</span> <span class=\"second\">by beon-communications</span></a>
        </div>
    </div>
</div>


<div class=\"container-fluid\">
    ";
        // line 170
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 171
            echo "        <div class=\"alert alert-success\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
            ";
            // line 173
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        $this->displayBlock('content', $context, $blocks);
        // line 188
        echo "
</body>
</html>";
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

    // line 55
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 176
    public function block_content($context, array $blocks = array())
    {
        // line 177
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "IntranetBundle:Form:cp_form_theme.html.twig"));
        // line 178
        echo "    <div class=\"row-fluid\">
        <div class=\"block\">
            <div class=\"block-heading\" data-toggle=\"collapse\" data-target=\"#tablewidget\">";
        // line 180
        echo $this->env->getExtension('translator')->getTranslator()->trans("Upload file", array(), "messages");
        echo "</div>

            <div id=\"widget1container\" class=\"block-body collapse in\">
                ";
        // line 183
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
\t    </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "IntranetBundle:Upload:external.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  385 => 183,  379 => 180,  375 => 178,  373 => 177,  370 => 176,  365 => 55,  301 => 24,  296 => 13,  293 => 12,  287 => 188,  285 => 176,  276 => 173,  272 => 171,  268 => 170,  258 => 162,  248 => 156,  246 => 155,  238 => 149,  232 => 145,  230 => 144,  208 => 125,  170 => 89,  161 => 87,  157 => 86,  127 => 59,  122 => 56,  120 => 55,  104 => 41,  48 => 39,  44 => 29,  40 => 27,  38 => 12,  29 => 6,  22 => 1,);
    }
}
