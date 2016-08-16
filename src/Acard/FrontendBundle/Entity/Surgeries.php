<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Surgeries
 */
class Surgeries
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
    private $drName;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var \Acard\FrontendBundle\Entity\City
     */
    private $city;

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
     * @return Surgeries
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
     * Set drName
     *
     * @param string $drName
     * @return Surgeries
     */
    public function setDrName($drName)
    {
        $this->drName = $drName;

        return $this;
    }

    /**
     * Get drName
     *
     * @return string 
     */
    public function getDrName()
    {
        return $this->drName;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Surgeries
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Surgeries
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set city
     *
     * @param \Acard\FrontendBundle\Entity\City $city
     * @return Surgeries
     */
    public function setCity(\Acard\FrontendBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Acard\FrontendBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }
}
