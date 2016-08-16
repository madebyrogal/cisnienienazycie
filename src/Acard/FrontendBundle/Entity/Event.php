<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 */
class Event
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $address;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var string
     */
    private $time_details;

    /**
     * @var float
     */
    private $lat;

    /**
     * @var float
     */
    private $lng;

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
     * Set place
     *
     * @param string $place
     * @return Event
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Event
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
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set time_details
     *
     * @param string $timeDetails
     * @return Event
     */
    public function setTimeDetails($timeDetails)
    {
        $this->time_details = $timeDetails;

        return $this;
    }

    /**
     * Get time_details
     *
     * @return string 
     */
    public function getTimeDetails()
    {
        return $this->time_details;
    }

    /**
     * Set lat
     *
     * @param float $lat
     * @return Event
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
     * @return Event
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

    /**
     * Set city
     *
     * @param \Acard\FrontendBundle\Entity\City $city
     * @return Event
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
    /**
     * @var string
     */
    private $info;


    /**
     * Set info
     *
     * @param string $info
     * @return Event
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'place' => $this->getPlace(),
            'address' => $this->getAddress(),
            'start_date' => $this->getStartDate()->format('Y-m-d'),
            'time_details' => $this->getTimeDetails(),
            'info' => $this->getInfo(),
            'lat' => $this->getLat(),
            'lng' => $this->getLng(),
        );
    }
    /**
     * @var \DateTime
     */
    private $end_date;


    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }
}
