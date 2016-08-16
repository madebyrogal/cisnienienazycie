<?php

namespace Acard\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompetitionForm
 */
class CompetitionForm
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
    private $street;

    /**
     * @var string
     */
    private $buildingNr;

    /**
     * @var string
     */
    private $flatNr;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $descTime;

    /**
     * @var string
     */
    private $descAim;

    /**
     * @var string
     */
    private $descPeople;

    /**
     * @var string
     */
    private $descEfect;

    /**
     * @var boolean
     */
    private $accept1;


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
     * @return CompetitionForm
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
     * Set street
     *
     * @param string $street
     * @return CompetitionForm
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set buildingNr
     *
     * @param string $buildingNr
     * @return CompetitionForm
     */
    public function setBuildingNr($buildingNr)
    {
        $this->buildingNr = $buildingNr;

        return $this;
    }

    /**
     * Get buildingNr
     *
     * @return string 
     */
    public function getBuildingNr()
    {
        return $this->buildingNr;
    }

    /**
     * Set flatNr
     *
     * @param string $flatNr
     * @return CompetitionForm
     */
    public function setFlatNr($flatNr)
    {
        $this->flatNr = $flatNr;

        return $this;
    }

    /**
     * Get flatNr
     *
     * @return string 
     */
    public function getFlatNr()
    {
        return $this->flatNr;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     * @return CompetitionForm
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string 
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return CompetitionForm
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return CompetitionForm
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return CompetitionForm
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CompetitionForm
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return CompetitionForm
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set descTime
     *
     * @param string $descTime
     * @return CompetitionForm
     */
    public function setDescTime($descTime)
    {
        $this->descTime = $descTime;

        return $this;
    }

    /**
     * Get descTime
     *
     * @return string 
     */
    public function getDescTime()
    {
        return $this->descTime;
    }

    /**
     * Set descAim
     *
     * @param string $descAim
     * @return CompetitionForm
     */
    public function setDescAim($descAim)
    {
        $this->descAim = $descAim;

        return $this;
    }

    /**
     * Get descAim
     *
     * @return string 
     */
    public function getDescAim()
    {
        return $this->descAim;
    }

    /**
     * Set descPeople
     *
     * @param string $descPeople
     * @return CompetitionForm
     */
    public function setDescPeople($descPeople)
    {
        $this->descPeople = $descPeople;

        return $this;
    }

    /**
     * Get descPeople
     *
     * @return string 
     */
    public function getDescPeople()
    {
        return $this->descPeople;
    }

    /**
     * Set descEfect
     *
     * @param string $descEfect
     * @return CompetitionForm
     */
    public function setDescEfect($descEfect)
    {
        $this->descEfect = $descEfect;

        return $this;
    }

    /**
     * Get descEfect
     *
     * @return string 
     */
    public function getDescEfect()
    {
        return $this->descEfect;
    }

    /**
     * Set accept1
     *
     * @param boolean $accept1
     * @return CompetitionForm
     */
    public function setAccept1($accept1)
    {
        $this->accept1 = $accept1;

        return $this;
    }

    /**
     * Get accept1
     *
     * @return boolean 
     */
    public function getAccept1()
    {
        return $this->accept1;
    }
    
    /**
     * Set from array
     */
    public function setFromArray($array){
        foreach($array as $key => $val){
            $this->$key = $val;
        }
    }
}
