<?php

namespace Acard\BackendBundle\Handler;

use Acard\FrontendBundle\Entity\Video;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class VideoHandler extends Handler
{
    public function getAllVideos()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Video')->findAll();
    }

    public function getVideo($id)
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Video')->find($id);
    }

    public function persistVideo(Video $video)
    {
        $uploadDir = $this->getUploadDir();
        $randomFileName = bin2hex(openssl_random_pseudo_bytes(8));

        /** @var $file UploadedFile */
        if ($file = $video->getPoster()) {
            $file->move($uploadDir, $randomFileName . ".{$file->getClientOriginalExtension()}");
            $fullPath = $uploadDir . $randomFileName . ".{$file->getClientOriginalExtension()}";
            $video->setPoster($randomFileName . ".{$file->getClientOriginalExtension()}");
        }

        $this->getDoctrine()->getManager()->persist($video);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }

    public function deleteVideo($id)
    {
        $video = $this->getVideo($id);
        @unlink($this->getUploadDir() . $video->getPoster());
        $this->getDoctrine()->getManager()->remove($video);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }
} 