<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GalleryNews
 */
class GalleryNews
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $newsId;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $fileThumb;

    /**
     * @var string
     */
    private $alt;


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
     * Set newsId
     *
     * @param integer $newsId
     * @return GalleryNews
     */
    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;

        return $this;
    }

    /**
     * Get newsId
     *
     * @return integer 
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return GalleryNews
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
     * Set fileThumb
     *
     * @param string $fileThumb
     * @return GalleryNews
     */
    public function setFileThumb($fileThumb)
    {
        $this->fileThumb = $fileThumb;

        return $this;
    }

    /**
     * Get fileThumb
     *
     * @return string 
     */
    public function getFileThumb()
    {
        return $this->fileThumb;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return GalleryNews
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
    /**
     * @var \Acard\FrontendBundle\Entity\News
     */
    private $news;


    /**
     * Set news
     *
     * @param \Acard\FrontendBundle\Entity\News $news
     * @return GalleryNews
     */
    public function setNews(\Acard\FrontendBundle\Entity\News $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \Acard\FrontendBundle\Entity\News 
     */
    public function getNews()
    {
        return $this->news;
    }
}
