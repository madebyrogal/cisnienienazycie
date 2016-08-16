<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/admin/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/admin/profile/edit') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/re')) {
                if (0 === strpos($pathinfo, '/admin/register')) {
                    // fos_user_registration_register
                    if (rtrim($pathinfo, '/') === '/admin/register') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                    }

                    if (0 === strpos($pathinfo, '/admin/register/c')) {
                        // fos_user_registration_check_email
                        if ($pathinfo === '/admin/register/check-email') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_check_email;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                        }
                        not_fos_user_registration_check_email:

                        if (0 === strpos($pathinfo, '/admin/register/confirm')) {
                            // fos_user_registration_confirm
                            if (preg_match('#^/admin/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirm;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                            }
                            not_fos_user_registration_confirm:

                            // fos_user_registration_confirmed
                            if ($pathinfo === '/admin/register/confirmed') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirmed;
                                }

                                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                            }
                            not_fos_user_registration_confirmed:

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/resetting')) {
                    // fos_user_resetting_request
                    if ($pathinfo === '/admin/resetting/request') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_request;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                    }
                    not_fos_user_resetting_request:

                    // fos_user_resetting_send_email
                    if ($pathinfo === '/admin/resetting/send-email') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_resetting_send_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                    }
                    not_fos_user_resetting_send_email:

                    // fos_user_resetting_check_email
                    if ($pathinfo === '/admin/resetting/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                    }
                    not_fos_user_resetting_check_email:

                    // fos_user_resetting_reset
                    if (0 === strpos($pathinfo, '/admin/resetting/reset') && preg_match('#^/admin/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_resetting_reset;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                    }
                    not_fos_user_resetting_reset:

                }

            }

            // fos_user_change_password
            if ($pathinfo === '/admin/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

            // acard_backend_index
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'acard_backend_index');
                }

                return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\PageController::listAction',  '_route' => 'acard_backend_index',);
            }

            if (0 === strpos($pathinfo, '/admin/page')) {
                // acard_backend_page_index
                if ($pathinfo === '/admin/page') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\PageController::listAction',  '_route' => 'acard_backend_page_index',);
                }

                // acard_backend_page_edit
                if (preg_match('#^/admin/page/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_page_edit')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\PageController::editAction',));
                }

                // acard_backend_page_create
                if ($pathinfo === '/admin/page/create') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\PageController::createAction',  '_route' => 'acard_backend_page_create',);
                }

                // acard_backend_page_delete
                if (0 === strpos($pathinfo, '/admin/page/delete') && preg_match('#^/admin/page/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_page_delete')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\PageController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/city')) {
                // acard_backend_city_index
                if ($pathinfo === '/admin/city') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CityController::listAction',  '_route' => 'acard_backend_city_index',);
                }

                // acard_backend_city_edit
                if (preg_match('#^/admin/city/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_city_edit')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CityController::editAction',));
                }

                // acard_backend_city_create
                if ($pathinfo === '/admin/city/create') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CityController::createAction',  '_route' => 'acard_backend_city_create',);
                }

                // acard_backend_city_delete
                if (0 === strpos($pathinfo, '/admin/city/delete') && preg_match('#^/admin/city/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_city_delete')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CityController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/event')) {
                // acard_backend_event_index
                if ($pathinfo === '/admin/event') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\EventController::listAction',  '_route' => 'acard_backend_event_index',);
                }

                // acard_backend_event_edit
                if (preg_match('#^/admin/event/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_event_edit')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\EventController::editAction',));
                }

                // acard_backend_event_create
                if ($pathinfo === '/admin/event/create') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\EventController::createAction',  '_route' => 'acard_backend_event_create',);
                }

                // acard_backend_event_delete
                if (0 === strpos($pathinfo, '/admin/event/delete') && preg_match('#^/admin/event/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_event_delete')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\EventController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/video')) {
                // acard_backend_video_create
                if ($pathinfo === '/admin/video/create') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\VideoController::createAction',  '_route' => 'acard_backend_video_create',);
                }

                // acard_backend_video_index
                if ($pathinfo === '/admin/video') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\VideoController::listAction',  '_route' => 'acard_backend_video_index',);
                }

                // acard_backend_video_edit
                if (preg_match('#^/admin/video/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_video_edit')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\VideoController::editAction',));
                }

                // acard_backend_video_delete
                if (0 === strpos($pathinfo, '/admin/video/delete') && preg_match('#^/admin/video/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_video_delete')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\VideoController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/gallery')) {
                // acard_backend_gallery_create
                if ($pathinfo === '/admin/gallery/create') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\GalleryController::createAction',  '_route' => 'acard_backend_gallery_create',);
                }

                // acard_backend_gallery_index
                if ($pathinfo === '/admin/gallery') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\GalleryController::listAction',  '_route' => 'acard_backend_gallery_index',);
                }

                // acard_backend_gallery_edit
                if (preg_match('#^/admin/gallery/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_gallery_edit')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\GalleryController::editAction',));
                }

                // acard_backend_gallery_delete
                if (0 === strpos($pathinfo, '/admin/gallery/delete') && preg_match('#^/admin/gallery/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_gallery_delete')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\GalleryController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/custom_field')) {
                // acard_backend_custom_field_index
                if ($pathinfo === '/admin/custom_field') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CustomFieldController::listAction',  '_route' => 'acard_backend_custom_field_index',);
                }

                // acard_backend_custom_field_edit
                if (preg_match('#^/admin/custom_field/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_custom_field_edit')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CustomFieldController::editAction',));
                }

                // acard_backend_custom_field_create
                if ($pathinfo === '/admin/custom_field/create') {
                    return array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CustomFieldController::createAction',  '_route' => 'acard_backend_custom_field_create',);
                }

                // acard_backend_custom_field_delete
                if (0 === strpos($pathinfo, '/admin/custom_field/delete') && preg_match('#^/admin/custom_field/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_backend_custom_field_delete')), array (  '_controller' => 'Acard\\BackendBundle\\Controller\\CustomFieldController::deleteAction',));
                }

            }

        }

        // acard_frontend_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'acard_frontend_homepage');
            }

            return array (  '_controller' => 'Acard\\FrontendBundle\\Controller\\PageController::viewAction',  'pageUrl' => 'index',  '_route' => 'acard_frontend_homepage',);
        }

        // acard_frontend_find_by_city
        if ($pathinfo === '/wydarzenie/znajdzWgMiasta') {
            return array (  '_controller' => 'Acard\\FrontendBundle\\Controller\\EventController::findByCityAction',  '_route' => 'acard_frontend_find_by_city',);
        }

        // acard_frontend_find_by_province
        if ($pathinfo === '/miasto/znajdzWgWojewodztwa') {
            return array (  '_controller' => 'Acard\\FrontendBundle\\Controller\\CityController::findByProvinceAction',  '_route' => 'acard_frontend_find_by_province',);
        }

        // acard_frontend_page_view
        if (preg_match('#^/(?P<pageUrl>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acard_frontend_page_view')), array (  '_controller' => 'Acard\\FrontendBundle\\Controller\\PageController::viewAction',));
        }

        if (0 === strpos($pathinfo, '/admin/city')) {
            // acard_frontend_admin_city_create
            if ($pathinfo === '/admin/city/create') {
                return array (  '_controller' => 'Acard\\FrontendBundle\\Controller\\AdminController::createCityAction',  '_route' => 'acard_frontend_admin_city_create',);
            }

            // acard_frontend_admin_city_list
            if ($pathinfo === '/admin/city/list') {
                return array (  '_controller' => 'Acard\\FrontendBundle\\Controller\\AdminController::listCityAction',  '_route' => 'acard_frontend_admin_city_list',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
