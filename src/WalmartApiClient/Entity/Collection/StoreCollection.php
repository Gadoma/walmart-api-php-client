<?php

/**
 * Store collection interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       07/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

/**
 * @codeCoverageIgnore
 */
class StoreCollection extends AbstractCollection implements StoreCollectionInterface
{

    /**
     * @var float Geo-latitude of store search results
     */
    protected $lat;

    /**
     * @var float Geo-longitude of store search results
     */
    protected $lon;

    /**
     * @var string City of store search results
     */
    protected $city;

    /**
     * @var string Zip code of store search results
     */
    protected $zip;

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }


    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }


    /**
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }


    /**
     * @param float $lon
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
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
}
