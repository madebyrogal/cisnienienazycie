<?php

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\Video;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadVideoData extends AbstractFixture
{
    function load(ObjectManager $manager)
    {
        $youtubeLinks = array(
            'https://www.youtube.com/watch?v=rtHRqMSyTCc',
            'https://www.youtube.com/watch?v=rtHRqMSyTCc',
            'https://www.youtube.com/watch?v=rtHRqMSyTCc',
            'https://www.youtube.com/watch?v=rtHRqMSyTCc',
        );

        foreach ($youtubeLinks as $youtubeLink) {
            $video = new Video();
            $video->setLabel('To jest fajny film #' . mt_rand(999, 99999));
            $video->setUrl($youtubeLink);

            $manager->persist($video);
        }

        $manager->flush();
    }
}