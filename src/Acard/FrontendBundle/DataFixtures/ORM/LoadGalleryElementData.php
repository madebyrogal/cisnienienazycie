<?php

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\GalleryElement;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGalleryElementData extends AbstractFixture
{
    function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 5; $i++) {
            $galleryElement = new GalleryElement();
            $galleryElement->setLabel('Lorem ipsum, man! ' . mt_rand(999, 9999999));
            $galleryElement->setFile("/uploads/img{$i}.jpg");
            $galleryElement->setThumbnailFile("/uploads/img{$i}_thumbnail.jpg");
            $manager->persist($galleryElement);
        }

        $manager->flush();
    }
}