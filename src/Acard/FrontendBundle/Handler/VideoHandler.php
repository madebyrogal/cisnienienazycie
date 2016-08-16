<?php

namespace Acard\FrontendBundle\Handler;

class VideoHandler extends Handler
{
    public function getAllVideos()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Video')->findAll();
    }
} 