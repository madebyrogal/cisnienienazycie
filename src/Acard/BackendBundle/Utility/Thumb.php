<?php

namespace Acard\BackendBundle\Utility;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thumb
 *
 * @author Tomek
 */
class Thumb {

    public static function makeThumb($fullPathFile, $newFileName, $descDir, $sizeX, $sizeY, $mode) {
        $newFileName = $newFileName . '.png';
        if (extension_loaded('gd')) {
            $imagine = new \Imagine\Gd\Imagine();
        } else if (extension_loaded('imagick')) {
            $imagine = new \Imagine\Imagick\Imagine();
        }
        $imagine->open($fullPathFile)
                ->thumbnail(new \Imagine\Image\Box($sizeX, $sizeY), $mode)
                ->save($descDir . $newFileName);
        
        $fileTHName = $newFileName;
        return $fileTHName;
    }

}
