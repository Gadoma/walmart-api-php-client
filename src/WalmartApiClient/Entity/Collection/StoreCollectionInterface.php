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

interface StoreCollectionInterface
{

    /**
     * @return float
     */
    public function getLat();

    /**
     * @param float $lat
     */
    public function setLat($lat);

    /**
     * @return float
     */
    public function getLon();

    /**
     * @param float $lon
     */
    public function setLon($lon);

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
    public function getZip();

    /**
     * @param string $zip
     */
    public function setZip($zip);
}
