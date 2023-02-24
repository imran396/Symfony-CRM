<?php

/* IntranetBundle::paginationForTabbedContent.html.twig */
class __TwigTemplate_42f3e07c373192ce73c8679485456f156b8de9cebd0c6ebec8848e7b2d7604e7 extends Twig_Template
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
        echo "

<script type=\"text/javascript\">

    jQuery(function (\$) {

                var \$navTab = \$('.nav a');
                var \$activeTab = \$('.nav li.active a');

                var pagerPrefix = 'pager-';
                var activeClass = 'active';
                var currentPage = null;
                var pagesCount = null;
                var \$prevEnabled = null;
                var \$prevDisabled = null;
                var \$nextEnabled = null;
                var \$nextDisabled = null;
                var \$currentPager = null;

                var \$pagers = \$('[id^=\"' + pagerPrefix + '\"] a');

                renderpager(\$activeTab);

                \$navTab.click(function () {
                    \$this = \$(this);
                    renderpager(\$this);
                });

                function renderpager(\$this) {
                    var tabName = \$this.attr('href').match(/#(\\S*)/)[1];
                    \$('[id^=\"' + pagerPrefix + '\"]').hide();

                    \$currentPager = \$('#' + pagerPrefix + tabName);
                    pagesCount = \$currentPager.find('a').filter(function () {
                        return \$(this).attr('href').match(/page-\\d+/);
                    }).length;

                    if (\$currentPager.length) {
                        \$currentPager.show();
                        currentPage = \$currentPager.find('li.active a').attr('href').match(/page-(\\d+)/)[1];
                    }

                    renderPrevNextForPage();
                }

                function renderPrevNextForPage() {
                    \$prevEnabled = \$currentPager.find('.prev-enabled');
                    \$prevDisabled = \$currentPager.find('.prev-disabled');
                    \$nextEnabled = \$currentPager.find('.next-enabled');
                    \$nextDisabled = \$currentPager.find('.next-disabled');

                    if (parseInt(currentPage) == 0) {
                        \$prevEnabled.hide().detach().insertAfter(\$prevDisabled);
                        \$prevDisabled.show();
                    } else {
                        \$prevDisabled.hide().detach().insertAfter(\$prevEnabled);
                        \$prevEnabled.show();
                    }

                    if (currentPage == pagesCount - 1) {
                        \$nextEnabled.hide().detach().insertBefore(\$nextDisabled);
                        \$nextDisabled.show();
                    } else {
                        \$nextDisabled.hide().detach().insertAfter(\$nextEnabled);
                        \$nextEnabled.show();
                    }
                }

                \$pagers.click(function (e) {
                    \$this = \$(this);
                    e.preventDefault();

                    var pagerName = \$this.parents('.pagination').attr('id').match(/pager-(\\S*)/)[1];
                    var itemHref = \$this.attr('href');
                    var pageType = itemHref.match(/page-(\\S+)/)[1];
                    var liWrapper = \$this.closest('li');


                    if (pageType == 'next') {
                        \$currentPager.find('a[href\$=\"page-' + currentPage + '\"]').parent().next().find('a').trigger('click');
                    } else if (pageType == 'prev') {
                        \$currentPager.find('a[href\$=\"page-' + currentPage + '\"]').parent().prev().find('a').trigger('click');
                    }
                    else {
                        currentPage = itemHref.match(/page-(\\d+)/)[1];
                        liWrapper.siblings().removeClass(activeClass);
                        liWrapper.addClass(activeClass);
                    }

                    renderPrevNextForPage();
                    
                    if (\$(\"#userFilter\").serialize() != undefined) {
\t\t\tvar postedData = \$(\"#userFilter\").serialize()+\"&currentPage=\"+currentPage+\"&pagerName=\"+pagerName;
                    } else {
\t\t\tvar postedData = \"?currentPage=\"+currentPage+\"&pagerName\"+pagerName;
\t\t    }
\t\t    
                    \$.ajax({
                        url: location.href,
                        context: document.body,
                        type: \"POST\",
                        data: postedData,
                        success: function (data) {
                            \$('#' + pagerName).html(data);
                        }
                    });

                });


            }

    );


</script>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle::paginationForTabbedContent.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
