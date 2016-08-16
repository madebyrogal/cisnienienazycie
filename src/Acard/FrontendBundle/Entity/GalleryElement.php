<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GalleryElement
 */
class GalleryElement
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $thumbnail_file;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     * @return GalleryElement
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return GalleryElement
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set thumbnail_file
     *
     * @param string $thumbnailFile
     * @return GalleryElement
     */
    public function setThumbnailFile($thumbnailFile)
    {
        $this->thumbnail_file = $thumbnailFile;

        return $this;
    }

    /**
     * Get thumbnail_file
     *
     * @return string 
     */
    public function getThumbnailFile()
    {
        return $this->thumbnail_file;
    }
}
