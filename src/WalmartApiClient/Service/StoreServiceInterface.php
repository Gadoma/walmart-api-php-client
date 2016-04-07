<?php

/**
 * Store service interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       07/04/2016
 */
namespace WalmartApiClient\Service;

interface StoreServiceInterface
{

    /**
     * Get stores nearby geo-coordinates
     * @param float $lat Store search geo-latitude
     * @param float $lon Store search geo-longitude
     * @return \WalmartApiClient\Entity\Collection\StoreCollectionInterface
     */
    public function getStoresByCoordinates($lat, $lon);

    /**
     * Get stores nearby city
     * @param string $city Store search city
     * @return \WalmartApiClient\Entity\Collection\StoreCollectionInterface
     */
    public function getStoresByCity($city);

    /**
     * Get stores nearby zip code
     * @param string $zip Store search zip code
     * @return \WalmartApiClient\Entity\Collection\StoreCollectionInterface
     */
    public function getStoresByZip($zip);
}
