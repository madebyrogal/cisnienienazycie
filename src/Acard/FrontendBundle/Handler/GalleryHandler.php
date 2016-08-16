<?php

namespace Acard\FrontendBundle\Handler;

class GalleryHandler extends Handler
{
    public function getAllGalleryElements()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:GalleryElement')->findAll();
    }
} 