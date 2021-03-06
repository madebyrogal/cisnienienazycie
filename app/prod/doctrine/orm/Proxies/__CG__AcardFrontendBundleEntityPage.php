<?php

namespace Proxies\__CG__\Acard\FrontendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Page extends \Acard\FrontendBundle\Entity\Page implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'name', 'meta_title', 'meta_description', 'meta_keywords', 'url_title', 'text', 'is_editable', 'wrapper_css_class', 'page_template');
        }

        return array('__isInitialized__', 'id', 'name', 'meta_title', 'meta_description', 'meta_keywords', 'url_title', 'text', 'is_editable', 'wrapper_css_class', 'page_template');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Page $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaTitle($metaTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetaTitle', array($metaTitle));

        return parent::setMetaTitle($metaTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetaTitle', array());

        return parent::getMetaTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaDescription($metaDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetaDescription', array($metaDescription));

        return parent::setMetaDescription($metaDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetaDescription', array());

        return parent::getMetaDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetaKeywords($metaKeywords)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetaKeywords', array($metaKeywords));

        return parent::setMetaKeywords($metaKeywords);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetaKeywords()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetaKeywords', array());

        return parent::getMetaKeywords();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlTitle($urlTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlTitle', array($urlTitle));

        return parent::setUrlTitle($urlTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlTitle', array());

        return parent::getUrlTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setText($text)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setText', array($text));

        return parent::setText($text);
    }

    /**
     * {@inheritDoc}
     */
    public function getText()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getText', array());

        return parent::getText();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsEditable($isEditable)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsEditable', array($isEditable));

        return parent::setIsEditable($isEditable);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsEditable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsEditable', array());

        return parent::getIsEditable();
    }

    /**
     * {@inheritDoc}
     */
    public function setWrapperCssClass($wrapperCssClass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWrapperCssClass', array($wrapperCssClass));

        return parent::setWrapperCssClass($wrapperCssClass);
    }

    /**
     * {@inheritDoc}
     */
    public function getWrapperCssClass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWrapperCssClass', array());

        return parent::getWrapperCssClass();
    }

    /**
     * {@inheritDoc}
     */
    public function setPageTemplate(\Acard\FrontendBundle\Entity\PageTemplate $pageTemplate = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageTemplate', array($pageTemplate));

        return parent::setPageTemplate($pageTemplate);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageTemplate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageTemplate', array());

        return parent::getPageTemplate();
    }

}
