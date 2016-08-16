<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 */
class News {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateFrom;

    /**
     * @var \string
     */
    private $file;

    /**
     * @var \string
     */
    private $fileThumb1;

    /**
     * @var \string
     */
    private $fileThumb2;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $sneakPeak;

    /**
     * @var string
     */
    private $body;

    /**
     * @var boolean
     */
    private $hidden = false;
    
    /**
     * @var string
     */
    private $slug;

    public function __construct() {
        $this->dateFrom = new \DateTime();
    }

    //Zaznacza ktore pliki usunac
    public function setFileToDel($dir) {
        $this->fileToDel = array();
        if($this->getFile() != '') $this->fileToDel[] = $dir . $this->getFile();
        if($this->getFileThumb1() != '') $this->fileToDel[] = $dir . $this->getFileThumb1();
        if($this->getFileThumb2() != '') $this->fileToDel[] = $dir . $this->getFileThumb2();
    }

    public function setFlagRedyToDel($flag = true) {
        $this->readyToDel = $flag;
    }

    //Usuwa zaznaczone pliki
    public function delSetedFile() {
        if (isset($this->readyToDel) && $this->readyToDel && isset($this->fileToDel) && count($this->fileToDel)) {
            foreach ($this->fileToDel as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dateFrom
     *
     * @param \DateTime $dateFrom
     * @return News
     */
    public function setDateFrom($dateFrom) {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    /**
     * Get dateFrom
     *
     * @return \DateTime 
     */
    public function getDateFrom() {
        return $this->dateFrom;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set sneakPeak
     *
     * @param string $sneakPeak
     * @return News
     */
    public function setSneakPeak($sneakPeak) {
        $this->sneakPeak = $sneakPeak;

        return $this;
    }

    /**
     * Get sneakPeak
     *
     * @return string 
     */
    public function getSneakPeak() {
        return $this->sneakPeak;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return News
     */
    public function setBody($body) {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Set hidden
     *
     * @param boolean $hidden
     * @return News
     */
    public function setHidden($hidden) {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden
     *
     * @return boolean 
     */
    public function getHidden() {
        return $this->hidden;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return News
     */
    public function setFile($file) {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * Set fileThumb1
     *
     * @param string $fileThumb1
     * @return News
     */
    public function setFileThumb1($fileThumb1) {
        $this->fileThumb1 = $fileThumb1;

        return $this;
    }

    /**
     * Get fileThumb1
     *
     * @return string 
     */
    public function getFileThumb1() {
        return $this->fileThumb1;
    }

    /**
     * Set fileThumb2
     *
     * @param string $fileThumb2
     * @return News
     */
    public function setFileThumb2($fileThumb2) {
        $this->fileThumb2 = $fileThumb2;

        return $this;
    }

    /**
     * Get fileThumb2
     *
     * @return string 
     */
    public function getFileThumb2() {
        return $this->fileThumb2;
    }


    /**
     * Set slug
     *
     * @param string $slug
     * @return News
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
