<?php

/* IntranetBundle::paginatorForSimpleContent.html.twig */
class __TwigTemplate_e3a36dc7353e839b96b121477efce731a8f44eb0f60a7df56425a21fa1c50428 extends Twig_Template
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
        echo "<script type=\"text/javascript\">

    jQuery(function (\$) {

                var pagerPrefix = 'pager-';
                var activeClass = 'active';
                var currentPage = null;

                var \$pagers = \$('.pagination a');

                function renderPrevNextForPage(\$currentPager, pagesCount) {
                    var \$prevEnabled = \$currentPager.find('.prev-enabled');
                    var \$prevDisabled = \$currentPager.find('.prev-disabled');
                    var \$nextEnabled = \$currentPager.find('.next-enabled');
                    var \$nextDisabled = \$currentPager.find('.next-disabled');

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

                    var itemHref = \$this.attr('href');
                    var pageType = itemHref.match(/page-(\\S+)/)[1];
                    var liWrapper = \$this.closest('li');
                    var \$currentPager = \$this.parents('.pagination');
                    currentPage = (!currentPage) ? \$currentPager.find('li.active a').attr('href').match(/page-(\\d+)/)[1] : currentPage;
                    var pagesCount = \$currentPager.find('a').filter(function () {
                        return \$(this).attr('href').match(/page-\\d+/);
                    }).length;

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

                    renderPrevNextForPage(\$currentPager, pagesCount);
                    
                    if (\$(\"#userFilter\").serialize() != undefined) {
\t\t\tvar postedData = \$(\"#userFilter\").serialize()+\"&currentPage=\"+currentPage+\"&ajax=true\";
                    } else {
\t\t\tvar postedData = \"?currentPage=\"+currentPage+\"&ajax=true\";
\t\t    }

                    \$.ajax({
                        url: location.href,
                        context: document.body,
                        type: \"POST\",
                        
                        
                        data: postedData,
                        
                        
                        success: function (data) {
                            \$('#indexTable').replaceWith(data);
                        }
                    });

                });


            }

    );


</script>";
    }

    public function getTemplateName()
    {
        return "IntranetBundle::paginatorForSimpleContent.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
