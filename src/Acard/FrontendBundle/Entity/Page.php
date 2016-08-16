<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 */
class Page
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $meta_title;

    /**
     * @var string
     */
    private $meta_description;

    /**
     * @var string
     */
    private $meta_keywords;

    /**
     * @var string
     */
    private $url_title;

    /**
     * @var string
     */
    private $text;

    /**
     * @var boolean
     */
    private $is_editable;

    /**
     * @var string
     */
    private $wrapper_css_class;

    /**
     * @var \Acard\FrontendBundle\Entity\PageTemplate
     */
    private $page_template;


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
     * Set name
     *
     * @param string $name
     * @return Page
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set meta_title
     *
     * @param string $metaTitle
     * @return Page
     */
    public function setMetaTitle($metaTitle)
    {
        $this->meta_title = $metaTitle;

        return $this;
    }

    /**
     * Get meta_title
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     * @return Page
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;

        return $this;
    }

    /**
     * Get meta_description
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set meta_keywords
     *
     * @param string $metaKeywords
     * @return Page
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->meta_keywords = $metaKeywords;

        return $this;
    }

    /**
     * Get meta_keywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Set url_title
     *
     * @param string $urlTitle
     * @return Page
     */
    public function setUrlTitle($urlTitle)
    {
        $this->url_title = $urlTitle;

        return $this;
    }

    /**
     * Get url_title
     *
     * @return string 
     */
    public function getUrlTitle()
    {
        return $this->url_title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Page
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set is_editable
     *
     * @param boolean $isEditable
     * @return Page
     */
    public function setIsEditable($isEditable)
    {
        $this->is_editable = $isEditable;

        return $this;
    }

    /**
     * Get is_editable
     *
     * @return boolean 
     */
    public function getIsEditable()
    {
        return $this->is_editable;
    }

    /**
     * Set wrapper_css_class
     *
     * @param string $wrapperCssClass
     * @return Page
     */
    public function setWrapperCssClass($wrapperCssClass)
    {
        $this->wrapper_css_class = $wrapperCssClass;

        return $this;
    }

    /**
     * Get wrapper_css_class
     *
     * @return string 
     */
    public function getWrapperCssClass()
    {
        return $this->wrapper_css_class;
    }

    /**
     * Set page_template
     *
     * @param \Acard\FrontendBundle\Entity\PageTemplate $pageTemplate
     * @return Page
     */
    public function setPageTemplate(\Acard\FrontendBundle\Entity\PageTemplate $pageTemplate = null)
    {
        $this->page_template = $pageTemplate;

        return $this;
    }

    /**
     * Get page_template
     *
     * @return \Acard\FrontendBundle\Entity\PageTemplate 
     */
    public function getPageTemplate()
    {
        return $this->page_template;
    }
}
