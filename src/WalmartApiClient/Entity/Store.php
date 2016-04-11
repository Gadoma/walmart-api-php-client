<?php

/**
 * Store entity DTO
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       07/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD)
 */
class Store extends AbstractEntity implements StoreInterface
{

    /**
     * @var int Shop number 
     */
    private $no;

    /**
     * @var string Shop name
     */
    private $name;

    /**
     * @var string Shop country name
     */
    private $country;

    /**
     * @var array Shop geo-coordinates
     */
    private $coordinates;

    /**
     * @var string Shop street address
     */
    private $streetAddress;

    /**
     * @var string Shop city
     */
    private $city;

    /**
     * @var string Shop state province code
     */
    private $stateProvCode;

    /**
     * @var string Shop zip code
     */
    private $zip;

    /**
     * @var string Shop phone number
     */
    private $phoneNumber;

    /**
     * @var bool Is the shop open on Sunday
     */
    private $sundayOpen;

    /**
     * @var string Shop timezone
     */
    private $timezone;

    /**
     * @return int
     */
    public function getNo()
    {
        return $this->no;
    }


    /**
     * @param int $no
     */
    public function setNo($no)
    {
        $this->no = $no;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }


    /**
     * @return array
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }


    /**
     * @param array $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }


    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }


    /**
     * @param string $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }


    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }


    /**
     * @return string
     */
    public function getStateProvCode()
    {
        return $this->stateProvCode;
    }


    /**
     * @param string $stateProvCode
     */
    public function setStateProvCode($stateProvCode)
    {
        $this->stateProvCode = $stateProvCode;
    }


    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }


    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }


    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }


    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }


    /**
     * @return bool
     */
    public function isSundayOpen()
    {
        return $this->sundayOpen;
    }


    /**
     * @param bool $sundayOpen
     */
    public function setSundayOpen($sundayOpen)
    {
        $this->sundayOpen = $sundayOpen;
    }


    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }


    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
}
