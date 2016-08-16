<?php

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Entity\Video;
use Acard\FrontendBundle\Handler\VideoHandler;

class VideoController extends Controller
{
    public function mainPageVideosAction()
    {
        /** @var $videoHandler VideoHandler */
        $videoHandler = $this->getHandlerFactory()->createHandler('Video');
        $videos = $videoHandler->getAllVideos();
        /** @var $video1 Video */
        $video1 = array_pop($videos);
        if ($video1 instanceof Video) {
            $params = array();
            parse_str(parse_url($video1->getUrl())['query'], $params);
            $video1 = array_key_exists('v', $params) ? $params['v'] : '';
        }
        /** @var $video2 Video */
        $video2 = array_pop($videos);
        if ($video2 instanceof Video) {
            $params = array();
            parse_str(parse_url($video2->getUrl())['query'], $params);
            $video2 = array_key_exists('v', $params) ? $params['v'] : '';
        }

        return $this->render('AcardFrontendBundle:Video:mainPageVideos.html.twig', array(
            'video1' => $video1,
            'video2' => $video2,
        ));
    }
}