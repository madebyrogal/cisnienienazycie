<?php

namespace Acard\BackendBundle\Handler;

use Acard\FrontendBundle\Entity\GalleryElement;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class GalleryHandler extends Handler
{
    public function getAllGalleryElements()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:GalleryElement')->findAll();
    }

    public function deleteGalleryElement($id)
    {
        /** @var $galleryElement GalleryElement */
        $galleryElement = $this->getDoctrine()->getRepository('AcardFrontendBundle:GalleryElement')->find($id);
        if (!$galleryElement) {
            return false;
        }

        @unlink($this->getUploadDir() . $galleryElement->getFile());
        @unlink($this->getUploadDir() . $galleryElement->getThumbnailFile());

        $this->getDoctrine()->getManager()->remove($galleryElement);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }

    public function persistGalleryElement(GalleryElement $galleryElement)
    {
        $uploadDir = $this->getUploadDir();
        $randomFileName = bin2hex(openssl_random_pseudo_bytes(8));

        /** @var $file UploadedFile */
        if ($file = $galleryElement->getFile()) {
            $file->move($uploadDir, $randomFileName . ".{$file->getClientOriginalExtension()}");
            $fullPath = $uploadDir . $randomFileName . ".{$file->getClientOriginalExtension()}";

            $galleryElement->setFile($randomFileName . ".{$file->getClientOriginalExtension()}");

            $fullThumbnailPath = $uploadDir . $randomFileName . '_thumbnail.png';
            if (extension_loaded('gd')) {
                $imagine = new \Imagine\Gd\Imagine();
            } else if (extension_loaded('imagick')) {
                $imagine = new \Imagine\Imagick\Imagine();
            }
            $imagine->open($fullPath)
                ->thumbnail(new \Imagine\Image\Box(300, 200), \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND)
                ->save($fullThumbnailPath);

            $galleryElement->setThumbnailFile($randomFileName . '_thumbnail.png');
        }

        $this->getDoctrine()->getManager()->persist($galleryElement);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }
} 