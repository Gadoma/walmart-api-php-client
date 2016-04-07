<?php

/**
 * Store entity interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       07/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @SuppressWarnings(PHPMD)
 */
interface StoreInterface
{

    /**
     * @return int
     */
    public function getNo();

    /**
     * @param int $no
     */
    public function setNo($no);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     */
    public function setCountry($country);

    /**
     * @return array
     */
    public function getCoordinates();

    /**
     * @param array $coordinates
     */
    public function setCoordinates($coordinates);

    /**
     * @return string
     */
    public function getStreetAddress();

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress($streetAddress);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getStateProvCode();

    /**
     * @param string $stateProvCode
     */
    public function setStateProvCode($stateProvCode);

    /**
     * @return string
     */
    public function getZip();

    /**
     * @param string $zip
     */
    public function setZip($zip);

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * @return bool
     */
    public function isSundayOpen();

    /**
     * @param bool $sundayOpen
     */
    public function setSundayOpen($sundayOpen);

    /**
     * @return string
     */
    public function getTimezone();

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone);
}
