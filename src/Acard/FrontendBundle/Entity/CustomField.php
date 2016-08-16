<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomField
 */
class CustomField
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
    private $label;

    /**
     * @var string
     */
    private $value;

    /**
     * @var boolean
     */
    private $is_protected;


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
     * @return CustomField
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
     * Set label
     *
     * @param string $label
     * @return CustomField
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
     * Set value
     *
     * @param string $value
     * @return CustomField
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set is_protected
     *
     * @param boolean $isProtected
     * @return CustomField
     */
    public function setIsProtected($isProtected)
    {
        $this->is_protected = $isProtected;

        return $this;
    }

    /**
     * Get is_protected
     *
     * @return boolean 
     */
    public function getIsProtected()
    {
        return $this->is_protected;
    }
}
