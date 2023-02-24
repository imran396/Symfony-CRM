<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/images/838a36b')) {
            // _assetic_838a36b
            if ($pathinfo === '/images/838a36b.gif') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '838a36b',  'pos' => NULL,  '_format' => 'gif',  '_route' => '_assetic_838a36b',);
            }

            // _assetic_838a36b_0
            if ($pathinfo === '/images/838a36b_ajax_loader_gray_32_1.gif') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '838a36b',  'pos' => 0,  '_format' => 'gif',  '_route' => '_assetic_838a36b_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/da81a27')) {
            // _assetic_da81a27
            if ($pathinfo === '/js/da81a27.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_da81a27',);
            }

            if (0 === strpos($pathinfo, '/js/da81a27_')) {
                if (0 === strpos($pathinfo, '/js/da81a27_jquery-')) {
                    // _assetic_da81a27_0
                    if ($pathinfo === '/js/da81a27_jquery-1.11.1.min_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_da81a27_0',);
                    }

                    // _assetic_da81a27_1
                    if ($pathinfo === '/js/da81a27_jquery-linedtextarea_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_da81a27_1',);
                    }

                }

                // _assetic_da81a27_2
                if ($pathinfo === '/js/da81a27_bootstrap.min_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_da81a27_2',);
                }

                // _assetic_da81a27_3
                if ($pathinfo === '/js/da81a27_select2.min_4.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_da81a27_3',);
                }

                // _assetic_da81a27_4
                if ($pathinfo === '/js/da81a27_jstree_5.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_da81a27_4',);
                }

                // _assetic_da81a27_5
                if ($pathinfo === '/js/da81a27_bootstrapValidator_6.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_da81a27_5',);
                }

                // _assetic_da81a27_6
                if ($pathinfo === '/js/da81a27_jquery.messyCode_7.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_da81a27_6',);
                }

                // _assetic_da81a27_7
                if ($pathinfo === '/js/da81a27_Modernizr-2.5.3.forms_8.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'da81a27',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_da81a27_7',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css')) {
            if (0 === strpos($pathinfo, '/css/f175062')) {
                // _assetic_f175062
                if ($pathinfo === '/css/f175062.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_f175062',);
                }

                if (0 === strpos($pathinfo, '/css/f175062_')) {
                    // _assetic_f175062_0
                    if ($pathinfo === '/css/f175062_bootstrap_1.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_f175062_0',);
                    }

                    // _assetic_f175062_1
                    if ($pathinfo === '/css/f175062_theme_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_f175062_1',);
                    }

                    // _assetic_f175062_2
                    if ($pathinfo === '/css/f175062_font-awesome_3.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_f175062_2',);
                    }

                    // _assetic_f175062_3
                    if ($pathinfo === '/css/f175062_myelements_4.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_f175062_3',);
                    }

                    // _assetic_f175062_4
                    if ($pathinfo === '/css/f175062_jquery-linedtextarea_5.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 4,  '_format' => 'css',  '_route' => '_assetic_f175062_4',);
                    }

                    // _assetic_f175062_5
                    if ($pathinfo === '/css/f175062_common_6.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 5,  '_format' => 'css',  '_route' => '_assetic_f175062_5',);
                    }

                    // _assetic_f175062_6
                    if ($pathinfo === '/css/f175062_select2_7.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 6,  '_format' => 'css',  '_route' => '_assetic_f175062_6',);
                    }

                    // _assetic_f175062_7
                    if ($pathinfo === '/css/f175062_bootstrapValidator_8.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 7,  '_format' => 'css',  '_route' => '_assetic_f175062_7',);
                    }

                    // _assetic_f175062_8
                    if ($pathinfo === '/css/f175062_style_9.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'f175062',  'pos' => 8,  '_format' => 'css',  '_route' => '_assetic_f175062_8',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/css/5c7b495')) {
                // _assetic_5c7b495
                if ($pathinfo === '/css/5c7b495.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_5c7b495',);
                }

                if (0 === strpos($pathinfo, '/css/5c7b495_')) {
                    // _assetic_5c7b495_0
                    if ($pathinfo === '/css/5c7b495_suppiler_offer_1.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_5c7b495_0',);
                    }

                    // _assetic_5c7b495_1
                    if ($pathinfo === '/css/5c7b495_theme_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_5c7b495_1',);
                    }

                    // _assetic_5c7b495_2
                    if ($pathinfo === '/css/5c7b495_font-awesome_3.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_5c7b495_2',);
                    }

                    // _assetic_5c7b495_3
                    if ($pathinfo === '/css/5c7b495_myelements_4.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_5c7b495_3',);
                    }

                    // _assetic_5c7b495_4
                    if ($pathinfo === '/css/5c7b495_jquery-linedtextarea_5.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 4,  '_format' => 'css',  '_route' => '_assetic_5c7b495_4',);
                    }

                    // _assetic_5c7b495_5
                    if ($pathinfo === '/css/5c7b495_select2_6.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 5,  '_format' => 'css',  '_route' => '_assetic_5c7b495_5',);
                    }

                    // _assetic_5c7b495_6
                    if ($pathinfo === '/css/5c7b495_bootstrapValidator_7.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 6,  '_format' => 'css',  '_route' => '_assetic_5c7b495_6',);
                    }

                    // _assetic_5c7b495_7
                    if ($pathinfo === '/css/5c7b495_date-polyfill_8.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5c7b495',  'pos' => 7,  '_format' => 'css',  '_route' => '_assetic_5c7b495_7',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/css/0f976c9')) {
                // _assetic_0f976c9
                if ($pathinfo === '/css/0f976c9.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0f976c9',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_0f976c9',);
                }

                // _assetic_0f976c9_0
                if ($pathinfo === '/css/0f976c9_flot_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0f976c9',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_0f976c9_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js')) {
            if (0 === strpos($pathinfo, '/js/5e68e1a')) {
                // _assetic_5e68e1a
                if ($pathinfo === '/js/5e68e1a.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5e68e1a',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_5e68e1a',);
                }

                if (0 === strpos($pathinfo, '/js/5e68e1a_jquery.flot')) {
                    // _assetic_5e68e1a_0
                    if ($pathinfo === '/js/5e68e1a_jquery.flot_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '5e68e1a',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_5e68e1a_0',);
                    }

                    if (0 === strpos($pathinfo, '/js/5e68e1a_jquery.flot.')) {
                        // _assetic_5e68e1a_1
                        if ($pathinfo === '/js/5e68e1a_jquery.flot.pie_2.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => '5e68e1a',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_5e68e1a_1',);
                        }

                        // _assetic_5e68e1a_2
                        if ($pathinfo === '/js/5e68e1a_jquery.flot.time_3.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => '5e68e1a',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_5e68e1a_2',);
                        }

                        // _assetic_5e68e1a_3
                        if ($pathinfo === '/js/5e68e1a_jquery.flot.dashes_4.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => '5e68e1a',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_5e68e1a_3',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/js/c617101')) {
                // _assetic_c617101
                if ($pathinfo === '/js/c617101.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c617101',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_c617101',);
                }

                if (0 === strpos($pathinfo, '/js/c617101_jquery.flot')) {
                    // _assetic_c617101_0
                    if ($pathinfo === '/js/c617101_jquery.flot_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'c617101',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_c617101_0',);
                    }

                    // _assetic_c617101_1
                    if ($pathinfo === '/js/c617101_jquery.flot.pie_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'c617101',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_c617101_1',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/enumvalue')) {
            // enumvalue
            if (rtrim($pathinfo, '/') === '/enumvalue') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'enumvalue');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\EnumValueController::indexAction',  '_route' => 'enumvalue',);
            }

            // enumvalue_show
            if (preg_match('#^/enumvalue/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enumvalue_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\EnumValueController::showAction',));
            }

            // enumvalue_edit
            if (preg_match('#^/enumvalue/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enumvalue_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\EnumValueController::editAction',));
            }

            // enumvalue_update
            if (preg_match('#^/enumvalue/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_enumvalue_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enumvalue_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\EnumValueController::updateAction',));
            }
            not_enumvalue_update:

            // enumvalue_delete
            if (preg_match('#^/enumvalue/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_enumvalue_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enumvalue_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\EnumValueController::deleteAction',));
            }
            not_enumvalue_delete:

        }

        if (0 === strpos($pathinfo, '/facebookauth/a')) {
            // facebook_auth_path
            if (rtrim($pathinfo, '/') === '/facebookauth/auth') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'facebook_auth_path');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookAuthController::authAction',  '_route' => 'facebook_auth_path',);
            }

            // facebook_accesstoken
            if (rtrim($pathinfo, '/') === '/facebookauth/access-token') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'facebook_accesstoken');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookAuthController::accessTokenAction',  '_route' => 'facebook_accesstoken',);
            }

        }

        // beon_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'beon_homepage');
            }

            return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\DefaultController::indexAction',  '_route' => 'beon_homepage',);
        }

        if (0 === strpos($pathinfo, '/stakeholder')) {
            // customer
            if (rtrim($pathinfo, '/') === '/stakeholder') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'customer');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::indexAction',  'level' => 0,  '_route' => 'customer',);
            }

            // customer_level
            if (0 === strpos($pathinfo, '/stakeholder/level') && preg_match('#^/stakeholder/level/(?P<level>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_level')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::indexAction',));
            }

            // customer_show
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::showAction',));
            }

            // customer_new
            if (0 === strpos($pathinfo, '/stakeholder/new/level') && preg_match('#^/stakeholder/new/level/(?P<level>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_new')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::newAction',));
            }

            // customer_create
            if ($pathinfo === '/stakeholder/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_customer_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::createAction',  '_route' => 'customer_create',);
            }
            not_customer_create:

            // customer_edit
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::editAction',));
            }

            // customer_update
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_customer_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::updateAction',));
            }
            not_customer_update:

            // customer_delete
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_customer_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::deleteAction',));
            }
            not_customer_delete:

            // customer_new_related
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/(?P<name>complaint|task|monitoredurl|user)/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::newRelatedAction',));
            }

            // customer_parent_for_level
            if (preg_match('#^/stakeholder/(?P<id>\\d+)/parent\\-for\\-level(?:/(?P<level>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_parent_for_level')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::parentForLevelAction',  'level' => 0,  'id' => 0,));
            }

            if (0 === strpos($pathinfo, '/stakeholder/c')) {
                // customer_get_address
                if ($pathinfo === '/stakeholder/customer-address') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_customer_get_address;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::getAddressAction',  '_route' => 'customer_get_address',);
                }
                not_customer_get_address:

                // customer_contact
                if ($pathinfo === '/stakeholder/contact-customer') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_customer_contact;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::contactCustomerRelationAction',  '_route' => 'customer_contact',);
                }
                not_customer_contact:

            }

            // customer_contact_delete
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/(?P<contactId>[^/]++)/contact\\-customer\\-delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'DELETE', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'DELETE', 'HEAD'));
                    goto not_customer_contact_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_contact_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerController::contactCustomerDeleteAction',));
            }
            not_customer_contact_delete:

            // IntranetBundle_CustomerDashboard
            if (preg_match('#^/stakeholder/(?P<id>[^/]++)/dashboard$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'IntranetBundle_CustomerDashboard')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::showAction',));
            }

            // user_new
            if ($pathinfo === '/user/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::editAction',));
            }

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_user_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::updateAction',));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

        }

        if (0 === strpos($pathinfo, '/campaign')) {
            // campaign
            if (rtrim($pathinfo, '/') === '/campaign') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'campaign');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::indexAction',  '_route' => 'campaign',);
            }

            // campaign_show
            if (preg_match('#^/campaign/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::showAction',));
            }

            // campaign_new
            if (0 === strpos($pathinfo, '/campaign/new') && preg_match('#^/campaign/new(?:/(?P<supplier>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_new')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::newAction',  'supplier' => false,));
            }

            // campaign_create
            if (0 === strpos($pathinfo, '/campaign/create') && preg_match('#^/campaign/create(?:/(?P<supplier>[^/]++))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_campaign_create;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_create')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::createAction',  'supplier' => false,));
            }
            not_campaign_create:

            // campaign_edit
            if (preg_match('#^/campaign/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::editAction',));
            }

            // campaign_update
            if (preg_match('#^/campaign/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_campaign_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::updateAction',));
            }
            not_campaign_update:

            // campaign_delete
            if (preg_match('#^/campaign/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_campaign_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::deleteAction',));
            }
            not_campaign_delete:

            // campaign_duplicate
            if (preg_match('#^/campaign/(?P<id>[^/]++)/duplicate$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_campaign_duplicate;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_duplicate')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::duplicateAction',));
            }
            not_campaign_duplicate:

            // campaign_send_approval_email
            if (preg_match('#^/campaign/(?P<id>[^/]++)/send\\-approval\\-email$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_send_approval_email')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::sendApprovalEmailAction',));
            }

            // campaign_approve
            if (0 === strpos($pathinfo, '/campaign/approve') && preg_match('#^/campaign/approve/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_approve')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::approveAction',));
            }

            // campaign_deny
            if (preg_match('#^/campaign/(?P<id>[^/]++)/deny$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_deny')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::denyAction',));
            }

            // campaign_new_related
            if (preg_match('#^/campaign/(?P<id>[^/]++)/(?P<name>note|task|timetracking)/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::newRelatedAction',));
            }

            // affilation_type_campaign_duplicate
            if (preg_match('#^/campaign/(?P<id>[^/]++)/duplicate\\-down/(?P<type>all|current)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'affilation_type_campaign_duplicate')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::duplicateDownAction',));
            }

            // campaign_suppliermail
            if (preg_match('#^/campaign/(?P<id>[^/]++)/suppliermail/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_campaign_suppliermail;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_suppliermail')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::supplierMailAction',));
            }
            not_campaign_suppliermail:

            // campaign_send_upload_link
            if (preg_match('#^/campaign/(?P<id>[^/]++)/sendUploadLink/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campaign_send_upload_link')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignController::sendUploadLinkAction',));
            }

        }

        if (0 === strpos($pathinfo, '/upload')) {
            // upload
            if (rtrim($pathinfo, '/') === '/upload') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'upload');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::indexAction',  '_route' => 'upload',);
            }

            // upload_show
            if (preg_match('#^/upload/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::showAction',));
            }

            // upload_new
            if ($pathinfo === '/upload/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::newAction',  '_route' => 'upload_new',);
            }

            // upload_create
            if ($pathinfo === '/upload/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_upload_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::createAction',  '_route' => 'upload_create',);
            }
            not_upload_create:

            // upload_edit
            if (preg_match('#^/upload/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::editAction',));
            }

            // upload_update
            if (preg_match('#^/upload/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_upload_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::updateAction',));
            }
            not_upload_update:

            // upload_delete
            if (preg_match('#^/upload/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_upload_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::deleteAction',));
            }
            not_upload_delete:

            // upload_download
            if (preg_match('#^/upload/(?P<id>[^/]++)/(?P<fileName>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_download')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::downloadAction',));
            }

            // upload_download_public
            if (0 === strpos($pathinfo, '/upload/public') && preg_match('#^/upload/public/(?P<id>[^/]++)/(?P<fsFilename>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_download_public')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::downloadPublicAction',));
            }

            // upload_toggle_group_flag
            if ($pathinfo === '/upload/upload-toggle-group-flag') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_upload_toggle_group_flag;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::toggleGroupFlagAction',  '_route' => 'upload_toggle_group_flag',);
            }
            not_upload_toggle_group_flag:

            // external_upload
            if (preg_match('#^/upload/(?P<type>[^/]++)/(?P<id>[^/]++)/(?P<hashCode>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                    goto not_external_upload;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'external_upload')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::externalUploadAction',));
            }
            not_external_upload:

            // mailgun_upload
            if ($pathinfo === '/upload/mailgunCv47biGbOdv0') {
                if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                    goto not_mailgun_upload;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\UploadController::mailgunAction',  '_route' => 'mailgun_upload',);
            }
            not_mailgun_upload:

        }

        if (0 === strpos($pathinfo, '/pressrelease')) {
            // pressrelease
            if (rtrim($pathinfo, '/') === '/pressrelease') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'pressrelease');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::indexAction',  '_route' => 'pressrelease',);
            }

            // pressrelease_show
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::showAction',));
            }

            // pressrelease_new
            if ($pathinfo === '/pressrelease/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::newAction',  '_route' => 'pressrelease_new',);
            }

            // pressrelease_create
            if ($pathinfo === '/pressrelease/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_pressrelease_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::createAction',  '_route' => 'pressrelease_create',);
            }
            not_pressrelease_create:

            // pressrelease_edit
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::editAction',));
            }

            // pressrelease_update
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_pressrelease_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::updateAction',));
            }
            not_pressrelease_update:

            // pressrelease_delete
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_pressrelease_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::deleteAction',));
            }
            not_pressrelease_delete:

            // pressrelease_send_approval_email
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/send\\-approval\\-email$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_send_approval_email')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::sendApprovalEmailAction',));
            }

            // pressrelease_approve
            if (0 === strpos($pathinfo, '/pressrelease/approve') && preg_match('#^/pressrelease/approve/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_approve')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::approveAction',));
            }

            // pressrelease_deny
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/deny$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_deny')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::denyAction',));
            }

            // pressrelease_new_related
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/(?P<name>note|task)/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pressrelease_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::newRelatedAction',));
            }

            // affilation_type_pressrelease_duplicate
            if (preg_match('#^/pressrelease/(?P<id>[^/]++)/duplicate\\-down/(?P<type>all|current)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'affilation_type_pressrelease_duplicate')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::duplicateDownAction',));
            }

            // pressrelease_submit
            if ($pathinfo === '/pressrelease/submit/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_pressrelease_submit;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\PressreleaseController::pressSubmitAction',  '_route' => 'pressrelease_submit',);
            }
            not_pressrelease_submit:

        }

        if (0 === strpos($pathinfo, '/note')) {
            // note
            if (rtrim($pathinfo, '/') === '/note') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'note');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::indexAction',  'monitoredUrl' => false,  '_route' => 'note',);
            }

            // note_show
            if (preg_match('#^/note/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::showAction',));
            }

            // note_new
            if (0 === strpos($pathinfo, '/note/new/note') && preg_match('#^/note/new/note(?:/(?P<monitoredUrl>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_new')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::newAction',  'monitoredUrl' => false,));
            }

            // note_create
            if (0 === strpos($pathinfo, '/note/create/note') && preg_match('#^/note/create/note(?:/(?P<monitoredUrl>[^/]++))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_note_create;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_create')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::createAction',  'monitoredUrl' => false,));
            }
            not_note_create:

            // note_edit
            if (preg_match('#^/note/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::editAction',));
            }

            // note_update
            if (preg_match('#^/note/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_note_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::updateAction',));
            }
            not_note_update:

            // note_delete
            if (preg_match('#^/note/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_note_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::deleteAction',));
            }
            not_note_delete:

            // note_list
            if (0 === strpos($pathinfo, '/note/list') && preg_match('#^/note/list/(?P<monitoredUrl>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'note_list')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\NoteController::listAction',));
            }

        }

        if (0 === strpos($pathinfo, '/supplier')) {
            // supplier
            if (rtrim($pathinfo, '/') === '/supplier') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'supplier');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::indexAction',  '_route' => 'supplier',);
            }

            // supplier_show
            if (preg_match('#^/supplier/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supplier_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::showAction',));
            }

            // supplier_new
            if ($pathinfo === '/supplier/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::newAction',  '_route' => 'supplier_new',);
            }

            // supplier_create
            if ($pathinfo === '/supplier/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_supplier_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::createAction',  '_route' => 'supplier_create',);
            }
            not_supplier_create:

            // supplier_edit
            if (preg_match('#^/supplier/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supplier_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::editAction',));
            }

            // supplier_update
            if (preg_match('#^/supplier/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_supplier_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supplier_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::updateAction',));
            }
            not_supplier_update:

            // supplier_delete
            if (preg_match('#^/supplier/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_supplier_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supplier_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::deleteAction',));
            }
            not_supplier_delete:

            if (0 === strpos($pathinfo, '/supplier/supplier-')) {
                // supplier_get_supplier_data
                if ($pathinfo === '/supplier/supplier-data') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_supplier_get_supplier_data;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::getSupplierDataAction',  '_route' => 'supplier_get_supplier_data',);
                }
                not_supplier_get_supplier_data:

                // supplier_get_type
                if ($pathinfo === '/supplier/supplier-type') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_supplier_get_type;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::getSupplierTypeAction',  '_route' => 'supplier_get_type',);
                }
                not_supplier_get_type:

            }

            // supplier_offer
            if ($pathinfo === '/supplier/offer') {
                if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                    goto not_supplier_offer;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::offerAction',  '_route' => 'supplier_offer',);
            }
            not_supplier_offer:

            // supplier_contact
            if ($pathinfo === '/supplier/contact-supplier') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_supplier_contact;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::contactSupplierRelationAction',  '_route' => 'supplier_contact',);
            }
            not_supplier_contact:

            // supplier_contact_delete
            if (preg_match('#^/supplier/(?P<id>[^/]++)/(?P<contactId>[^/]++)/contact\\-supplier$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'DELETE', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'DELETE', 'HEAD'));
                    goto not_supplier_contact_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supplier_contact_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierController::supplierContactDeleteAction',));
            }
            not_supplier_contact_delete:

        }

        if (0 === strpos($pathinfo, '/contact')) {
            // contact
            if (rtrim($pathinfo, '/') === '/contact') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'contact');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::indexAction',  '_route' => 'contact',);
            }

            // contact_show
            if (preg_match('#^/contact/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::showAction',));
            }

            // contact_new
            if ($pathinfo === '/contact/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::newAction',  '_route' => 'contact_new',);
            }

            // contact_create
            if ($pathinfo === '/contact/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_contact_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::createAction',  '_route' => 'contact_create',);
            }
            not_contact_create:

            // contact_edit
            if (preg_match('#^/contact/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::editAction',));
            }

            // contact_update
            if (preg_match('#^/contact/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_contact_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::updateAction',));
            }
            not_contact_update:

            // contact_delete
            if (preg_match('#^/contact/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_contact_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ContactController::deleteAction',));
            }
            not_contact_delete:

        }

        if (0 === strpos($pathinfo, '/budgetperiod')) {
            // budgetperiod
            if (rtrim($pathinfo, '/') === '/budgetperiod') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'budgetperiod');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::indexAction',  '_route' => 'budgetperiod',);
            }

            // budgetperiod_show
            if (preg_match('#^/budgetperiod/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'budgetperiod_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::showAction',));
            }

            // budgetperiod_new
            if ($pathinfo === '/budgetperiod/new') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_budgetperiod_new;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::newAction',  '_route' => 'budgetperiod_new',);
            }
            not_budgetperiod_new:

            // budgetperiod_create
            if ($pathinfo === '/budgetperiod/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_budgetperiod_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::createAction',  '_route' => 'budgetperiod_create',);
            }
            not_budgetperiod_create:

            // budgetperiod_edit
            if (preg_match('#^/budgetperiod/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'budgetperiod_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::editAction',));
            }

            // budgetperiod_update
            if (preg_match('#^/budgetperiod/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_budgetperiod_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'budgetperiod_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::updateAction',));
            }
            not_budgetperiod_update:

            // budgetperiod_delete
            if (preg_match('#^/budgetperiod/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_budgetperiod_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'budgetperiod_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\BudgetPeriodController::deleteAction',));
            }
            not_budgetperiod_delete:

        }

        if (0 === strpos($pathinfo, '/approve')) {
            // mailqueue_approve
            if (preg_match('#^/approve/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mailqueue_approve')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MailQueueController::approveAction',));
            }

            // mailqueue_approve_confirm
            if (0 === strpos($pathinfo, '/approve/confirm') && preg_match('#^/approve/confirm/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mailqueue_approve_confirm')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MailQueueController::approveConfirmAction',));
            }

        }

        if (0 === strpos($pathinfo, '/task')) {
            // task
            if (rtrim($pathinfo, '/') === '/task') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'task');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::indexAction',  '_route' => 'task',);
            }

            // task_show
            if (preg_match('#^/task/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::showAction',));
            }

            // task_new
            if (0 === strpos($pathinfo, '/task/new') && preg_match('#^/task/new(?:/(?P<duplicateTaskId>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_new')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::newAction',  'duplicateTaskId' => false,));
            }

            // task_create
            if (0 === strpos($pathinfo, '/task/create') && preg_match('#^/task/create(?:/(?P<duplicateTaskId>[^/]++))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_create;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_create')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::createAction',  'duplicateTaskId' => false,));
            }
            not_task_create:

            // task_edit
            if (preg_match('#^/task/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::editAction',));
            }

            // task_update
            if (preg_match('#^/task/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_task_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::updateAction',));
            }
            not_task_update:

            // task_delete
            if (preg_match('#^/task/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_task_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::deleteAction',));
            }
            not_task_delete:

            // task_approve
            if (preg_match('#^/task/(?P<id>[^/]++)/approve$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_approve')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::approveAction',));
            }

            // task_send_approval_email
            if (preg_match('#^/task/(?P<id>[^/]++)/send\\-approval\\-email$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_send_approval_email')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::sendApprovalEmailAction',));
            }

            // task_notify
            if (preg_match('#^/task/(?P<id>[^/]++)/notify$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_notify')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::notifyAction',));
            }

            // task_new_related
            if (preg_match('#^/task/(?P<id>[^/]++)/(?P<name>note|timetracking)/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::newRelatedAction',));
            }

            // task_deny
            if (preg_match('#^/task/(?P<id>[^/]++)/deny$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_deny')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::denyAction',));
            }

            // task_guess_printcost
            if ($pathinfo === '/task/guessprintcost') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_guess_printcost;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::guessPrintCostAction',  '_route' => 'task_guess_printcost',);
            }
            not_task_guess_printcost:

            // affilation_type_task_duplicate
            if (preg_match('#^/task/(?P<id>[^/]++)/duplicate\\-down/(?P<type>all|current)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'affilation_type_task_duplicate')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::duplicateDownAction',));
            }

            // task_duplicate
            if (preg_match('#^/task/(?P<id>[^/]++)/duplicate$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_duplicate;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_duplicate')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::duplicateAction',));
            }
            not_task_duplicate:

            // task_submit_files
            if ($pathinfo === '/task/submit-files') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_submit_files;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TaskController::submitFilesAction',  '_route' => 'task_submit_files',);
            }
            not_task_submit_files:

        }

        if (0 === strpos($pathinfo, '/s')) {
            if (0 === strpos($pathinfo, '/suppliergroup')) {
                // suppliergroup
                if (rtrim($pathinfo, '/') === '/suppliergroup') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'suppliergroup');
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::indexAction',  '_route' => 'suppliergroup',);
                }

                // suppliergroup_show
                if (preg_match('#^/suppliergroup/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'suppliergroup_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::showAction',));
                }

                // suppliergroup_new
                if ($pathinfo === '/suppliergroup/new') {
                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::newAction',  '_route' => 'suppliergroup_new',);
                }

                // suppliergroup_create
                if ($pathinfo === '/suppliergroup/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_suppliergroup_create;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::createAction',  '_route' => 'suppliergroup_create',);
                }
                not_suppliergroup_create:

                // suppliergroup_edit
                if (preg_match('#^/suppliergroup/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'suppliergroup_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::editAction',));
                }

                // suppliergroup_update
                if (preg_match('#^/suppliergroup/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_suppliergroup_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'suppliergroup_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::updateAction',));
                }
                not_suppliergroup_update:

                // suppliergroup_delete
                if (preg_match('#^/suppliergroup/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_suppliergroup_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'suppliergroup_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::deleteAction',));
                }
                not_suppliergroup_delete:

                // suppliergroup_contact
                if ($pathinfo === '/suppliergroup/contact-suppliergroup') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_suppliergroup_contact;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::contactSupplierGroupRelationAction',  '_route' => 'suppliergroup_contact',);
                }
                not_suppliergroup_contact:

                // suppliergroup_contact_delete
                if (preg_match('#^/suppliergroup/(?P<id>[^/]++)/(?P<contactId>[^/]++)/contact\\-suppliergroup\\-delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'DELETE', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'DELETE', 'HEAD'));
                        goto not_suppliergroup_contact_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'suppliergroup_contact_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::supplierGroupContactDeleteAction',));
                }
                not_suppliergroup_contact_delete:

                // suppliergroup_new_related
                if (preg_match('#^/suppliergroup/(?P<id>[^/]++)/(?P<name>supplier)/new$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'suppliergroup_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SupplierGroupController::newRelatedAction',));
                }

            }

            if (0 === strpos($pathinfo, '/stakeholderfacebookurl')) {
                // customerfacebookurl
                if (rtrim($pathinfo, '/') === '/stakeholderfacebookurl') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'customerfacebookurl');
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::indexAction',  '_route' => 'customerfacebookurl',);
                }

                // customerfacebookurl_show
                if (preg_match('#^/stakeholderfacebookurl/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'customerfacebookurl_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::showAction',));
                }

                // customerfacebookurl_new
                if ($pathinfo === '/stakeholderfacebookurl/new') {
                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::newAction',  '_route' => 'customerfacebookurl_new',);
                }

                // customerfacebookurl_create
                if ($pathinfo === '/stakeholderfacebookurl/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_customerfacebookurl_create;
                    }

                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::createAction',  '_route' => 'customerfacebookurl_create',);
                }
                not_customerfacebookurl_create:

                // customerfacebookurl_edit
                if (preg_match('#^/stakeholderfacebookurl/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'customerfacebookurl_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::editAction',));
                }

                // customerfacebookurl_update
                if (preg_match('#^/stakeholderfacebookurl/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_customerfacebookurl_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'customerfacebookurl_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::updateAction',));
                }
                not_customerfacebookurl_update:

                // customerfacebookurl_delete
                if (preg_match('#^/stakeholderfacebookurl/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_customerfacebookurl_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'customerfacebookurl_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CustomerFacebookUrlController::deleteAction',));
                }
                not_customerfacebookurl_delete:

            }

        }

        if (0 === strpos($pathinfo, '/facebookurl')) {
            // facebookurl
            if (rtrim($pathinfo, '/') === '/facebookurl') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'facebookurl');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::indexAction',  '_route' => 'facebookurl',);
            }

            // facebookurl_show
            if (preg_match('#^/facebookurl/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facebookurl_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::showAction',));
            }

            // facebookurl_new
            if ($pathinfo === '/facebookurl/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::newAction',  '_route' => 'facebookurl_new',);
            }

            // facebookurl_create
            if ($pathinfo === '/facebookurl/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_facebookurl_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::createAction',  '_route' => 'facebookurl_create',);
            }
            not_facebookurl_create:

            // facebookurl_edit
            if (preg_match('#^/facebookurl/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facebookurl_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::editAction',));
            }

            // facebookurl_update
            if (preg_match('#^/facebookurl/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_facebookurl_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facebookurl_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::updateAction',));
            }
            not_facebookurl_update:

            // facebookurl_delete
            if (preg_match('#^/facebookurl/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_facebookurl_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facebookurl_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::deleteAction',));
            }
            not_facebookurl_delete:

            // facebookurl_postednow
            if (preg_match('#^/facebookurl/(?P<id>[^/]++)/postednow$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facebookurl_postednow')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookUrlController::postedNowAction',));
            }

        }

        if (0 === strpos($pathinfo, '/surveyresult')) {
            // surveyresult
            if (rtrim($pathinfo, '/') === '/surveyresult') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'surveyresult');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::indexAction',  '_route' => 'surveyresult',);
            }

            // surveyresult_show
            if (preg_match('#^/surveyresult/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'surveyresult_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::showAction',));
            }

            // surveyresult_new
            if ($pathinfo === '/surveyresult/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::newAction',  '_route' => 'surveyresult_new',);
            }

            // surveyresult_create
            if ($pathinfo === '/surveyresult/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_surveyresult_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::createAction',  '_route' => 'surveyresult_create',);
            }
            not_surveyresult_create:

            // surveyresult_edit
            if (preg_match('#^/surveyresult/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'surveyresult_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::editAction',));
            }

            // surveyresult_update
            if (preg_match('#^/surveyresult/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_surveyresult_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'surveyresult_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::updateAction',));
            }
            not_surveyresult_update:

            // surveyresult_delete
            if (preg_match('#^/surveyresult/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_surveyresult_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'surveyresult_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyResultController::deleteAction',));
            }
            not_surveyresult_delete:

        }

        if (0 === strpos($pathinfo, '/complaint')) {
            // complaint
            if (rtrim($pathinfo, '/') === '/complaint') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'complaint');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::indexAction',  '_route' => 'complaint',);
            }

            // complaint_show
            if (preg_match('#^/complaint/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'complaint_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::showAction',));
            }

            // complaint_new
            if ($pathinfo === '/complaint/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::newAction',  '_route' => 'complaint_new',);
            }

            // complaint_create
            if ($pathinfo === '/complaint/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_complaint_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::createAction',  '_route' => 'complaint_create',);
            }
            not_complaint_create:

            // complaint_edit
            if (preg_match('#^/complaint/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'complaint_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::editAction',));
            }

            // complaint_update
            if (preg_match('#^/complaint/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_complaint_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'complaint_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::updateAction',));
            }
            not_complaint_update:

            // complaint_delete
            if (preg_match('#^/complaint/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_complaint_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'complaint_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::deleteAction',));
            }
            not_complaint_delete:

            // complaint_new_related
            if (preg_match('#^/complaint/(?P<id>[^/]++)/(?P<name>task|note)/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'complaint_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::newRelatedAction',));
            }

            // complaint_notify
            if (preg_match('#^/complaint/(?P<id>[^/]++)/notify$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'complaint_notify')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::notifyAction',));
            }

            // Complaint_proposal
            if (preg_match('#^/complaint/(?P<id>[^/]++)/proposal$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'Complaint_proposal')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::proposalAction',));
            }

            // Complaint_no_answer
            if (preg_match('#^/complaint/(?P<id>[^/]++)/no\\-answer$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'Complaint_no_answer')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ComplaintController::noAnswerAction',));
            }

        }

        if (0 === strpos($pathinfo, '/monitoredurl')) {
            // monitoredurl
            if (rtrim($pathinfo, '/') === '/monitoredurl') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'monitoredurl');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::indexAction',  '_route' => 'monitoredurl',);
            }

            // monitoredurl_show
            if (preg_match('#^/monitoredurl/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'monitoredurl_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::showAction',));
            }

            // monitoredurl_new
            if ($pathinfo === '/monitoredurl/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::newAction',  '_route' => 'monitoredurl_new',);
            }

            // monitoredurl_create
            if ($pathinfo === '/monitoredurl/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_monitoredurl_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::createAction',  '_route' => 'monitoredurl_create',);
            }
            not_monitoredurl_create:

            // monitoredurl_edit
            if (preg_match('#^/monitoredurl/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'monitoredurl_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::editAction',));
            }

            // monitoredurl_update
            if (preg_match('#^/monitoredurl/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_monitoredurl_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'monitoredurl_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::updateAction',));
            }
            not_monitoredurl_update:

            // monitoredurl_delete
            if (preg_match('#^/monitoredurl/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_monitoredurl_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'monitoredurl_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::deleteAction',));
            }
            not_monitoredurl_delete:

            // monitoredurl_postednow
            if (preg_match('#^/monitoredurl/(?P<id>[^/]++)/postednow$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'monitoredurl_postednow')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::postedNowAction',));
            }

            // monitoredurl_new_related
            if (preg_match('#^/monitoredurl/(?P<id>[^/]++)/(?P<name>complaint)/new$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'monitoredurl_new_related')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MonitoredUrlController::newRelatedAction',));
            }

        }

        if (0 === strpos($pathinfo, '/timetracking')) {
            // timetracking
            if (rtrim($pathinfo, '/') === '/timetracking') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'timetracking');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::indexAction',  '_route' => 'timetracking',);
            }

            // timetracking_show
            if (preg_match('#^/timetracking/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetracking_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::showAction',));
            }

            // timetracking_new
            if ($pathinfo === '/timetracking/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::newAction',  '_route' => 'timetracking_new',);
            }

            // timetracking_create
            if ($pathinfo === '/timetracking/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_timetracking_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::createAction',  '_route' => 'timetracking_create',);
            }
            not_timetracking_create:

            // timetracking_edit
            if (preg_match('#^/timetracking/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetracking_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::editAction',));
            }

            // timetracking_update
            if (preg_match('#^/timetracking/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_timetracking_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetracking_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::updateAction',));
            }
            not_timetracking_update:

            // timetracking_delete
            if (preg_match('#^/timetracking/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_timetracking_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timetracking_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimetrackingController::deleteAction',));
            }
            not_timetracking_delete:

        }

        if (0 === strpos($pathinfo, '/city')) {
            // city
            if (rtrim($pathinfo, '/') === '/city') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'city');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::indexAction',  '_route' => 'city',);
            }

            // city_show
            if (preg_match('#^/city/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::showAction',));
            }

            // city_new
            if ($pathinfo === '/city/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::newAction',  '_route' => 'city_new',);
            }

            // city_create
            if ($pathinfo === '/city/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_city_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::createAction',  '_route' => 'city_create',);
            }
            not_city_create:

            // city_edit
            if (preg_match('#^/city/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::editAction',));
            }

            // city_update
            if (preg_match('#^/city/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_city_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::updateAction',));
            }
            not_city_update:

            // city_delete
            if (preg_match('#^/city/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_city_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::deleteAction',));
            }
            not_city_delete:

            // city_contact
            if ($pathinfo === '/city/contact-city') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_city_contact;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::contactCityRelationAction',  '_route' => 'city_contact',);
            }
            not_city_contact:

            // city_contact_delete
            if (preg_match('#^/city/(?P<id>[^/]++)/(?P<contactId>[^/]++)/contact\\-city\\-delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'DELETE', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'DELETE', 'HEAD'));
                    goto not_city_contact_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'city_contact_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CityController::contactCityDeleteAction',));
            }
            not_city_contact_delete:

        }

        if (0 === strpos($pathinfo, '/report')) {
            // report_survey_analysis
            if ($pathinfo === '/report/survey') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SurveyAnalysisController::reportAction',  '_route' => 'report_survey_analysis',);
            }

            // report_time_track
            if ($pathinfo === '/report/timetrack') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimeTrackReportController::timeTrackAction',  '_route' => 'report_time_track',);
            }

            // report_export_csv
            if ($pathinfo === '/report/export/csv') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_report_export_csv;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\TimeTrackReportController::exportAction',  '_route' => 'report_export_csv',);
            }
            not_report_export_csv:

            // report_campaign_saving
            if ($pathinfo === '/report/campaignsaving') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignReportController::savingAction',  '_route' => 'report_campaign_saving',);
            }

            // report_facebook
            if ($pathinfo === '/report/facebook') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\FacebookReportController::reportAction',  '_route' => 'report_facebook',);
            }

            // report_cpspm
            if ($pathinfo === '/report/cpspm') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\CampaignReportController::cpspmAction',  '_route' => 'report_cpspm',);
            }

            // report_visit
            if ($pathinfo === '/report/visit') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\VisitReportController::reportAction',  '_route' => 'report_visit',);
            }

            // report_missingtt
            if ($pathinfo === '/report/missingtt') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\MissingTimetrackingsReportController::reportAction',  '_route' => 'report_missingtt',);
            }

        }

        if (0 === strpos($pathinfo, '/accesslevel')) {
            // accesslevel
            if (rtrim($pathinfo, '/') === '/accesslevel') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'accesslevel');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::indexAction',  '_route' => 'accesslevel',);
            }

            // accesslevel_show
            if (preg_match('#^/accesslevel/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'accesslevel_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::showAction',));
            }

            // accesslevel_new
            if ($pathinfo === '/accesslevel/new') {
                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::newAction',  '_route' => 'accesslevel_new',);
            }

            // accesslevel_create
            if ($pathinfo === '/accesslevel/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_accesslevel_create;
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::createAction',  '_route' => 'accesslevel_create',);
            }
            not_accesslevel_create:

            // accesslevel_edit
            if (preg_match('#^/accesslevel/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'accesslevel_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::editAction',));
            }

            // accesslevel_update
            if (preg_match('#^/accesslevel/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_accesslevel_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'accesslevel_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::updateAction',));
            }
            not_accesslevel_update:

            // accesslevel_delete
            if (preg_match('#^/accesslevel/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_accesslevel_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'accesslevel_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::deleteAction',));
            }
            not_accesslevel_delete:

            // accesslevel_duplicate
            if (preg_match('#^/accesslevel/(?P<id>[^/]++)/duplicate$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_accesslevel_duplicate;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'accesslevel_duplicate')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\AccessLevelController::duplicateAction',));
            }
            not_accesslevel_duplicate:

        }

        if (0 === strpos($pathinfo, '/conf')) {
            // configvalue
            if (rtrim($pathinfo, '/') === '/conf') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'configvalue');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ConfigValueController::indexAction',  '_route' => 'configvalue',);
            }

            // configvalue_show
            if (preg_match('#^/conf/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'configvalue_show')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ConfigValueController::showAction',));
            }

            // configvalue_edit
            if (preg_match('#^/conf/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'configvalue_edit')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ConfigValueController::editAction',));
            }

            // configvalue_update
            if (preg_match('#^/conf/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_configvalue_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'configvalue_update')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ConfigValueController::updateAction',));
            }
            not_configvalue_update:

            // configvalue_delete
            if (preg_match('#^/conf/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_configvalue_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'configvalue_delete')), array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ConfigValueController::deleteAction',));
            }
            not_configvalue_delete:

        }

        if (0 === strpos($pathinfo, '/excelimport')) {
            // excelimport_upload
            if (rtrim($pathinfo, '/') === '/excelimport') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'excelimport_upload');
                }

                return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ExcelImportController::uploadAction',  '_route' => 'excelimport_upload',);
            }

            if (0 === strpos($pathinfo, '/excelimport/s')) {
                // excelimport_save_upload
                if ($pathinfo === '/excelimport/save_upload') {
                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ExcelImportController::saveUploadAction',  '_route' => 'excelimport_save_upload',);
                }

                // excelimport_select
                if ($pathinfo === '/excelimport/select') {
                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\ExcelImportController::selectAction',  '_route' => 'excelimport_select',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Beon\\IntranetBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
