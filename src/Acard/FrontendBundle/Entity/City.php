<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * City
 */
class City
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
    private $name;

    /**
     * @var \Acard\FrontendBundle\Entity\Province
     */
    private $province;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $surgeries;


    public function __construct()
    {
        $this->surgeries = new ArrayCollection();
    }
    
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
     * @return City
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
     * Set name
     *
     * @param string $name
     * @return City
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
     * Set province
     *
     * @param \Acard\FrontendBundle\Entity\Province $province
     * @return City
     */
    public function setProvince(\Acard\FrontendBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \Acard\FrontendBundle\Entity\Province 
     */
    public function getProvince()
    {
        return $this->province;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'label' => $this->getLabel(),
            'lat' => $this->getLat(),
            'lng' => $this->getLng(),
            'province' => $this->getProvince() ? $this->getProvince()->toArray() : array()
        );
    }
    /**
     * @var float
     */
    private $lat;

    /**
     * @var float
     */
    private $lng;


    /**
     * Set lat
     *
     * @param float $lat
     * @return City
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     * @return City
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return float 
     */
    public function getLng()
    {
        return $this->lng;
    }

    function __toString()
    {
        return $this->getLabel();
    }

    /**
     * Add surgeries
     *
     * @param \Acard\FrontendBundle\Entity\Surgeries $surgeries
     * @return City
     */
    public function addSurgery(\Acard\FrontendBundle\Entity\Surgeries $surgeries)
    {
        $this->surgeries[] = $surgeries;

        return $this;
    }

    /**
     * Remove surgeries
     *
     * @param \Acard\FrontendBundle\Entity\Surgeries $surgeries
     */
    public function removeSurgery(\Acard\FrontendBundle\Entity\Surgeries $surgeries)
    {
        $this->surgeries->removeElement($surgeries);
    }

    /**
     * Get surgeries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSurgeries()
    {
        return $this->surgeries;
    }
}
