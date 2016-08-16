<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/19/14
 * Time: 5:03 AM
 */

namespace Acard\FrontendBundle\Controller;


use Acard\FrontendBundle\Handler\GalleryHandler;

class GalleryController extends Controller
{
    public function getAction()
    {
        /** @var $galleryHandler GalleryHandler */
        $galleryHandler = $this->getHandlerFactory()->createHandler('Gallery');

        return $this->render('AcardFrontendBundle:Gallery:get.html.twig', array(
            'galleryElements' => $galleryHandler->getAllGalleryElements()
        ));
    }
} 