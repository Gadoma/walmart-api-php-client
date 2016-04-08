<?php

/**
 * Store service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       07/04/2016
 */
namespace WalmartApiClient\Service;

class StoreService extends AbstractService implements StoreServiceInterface
{

    const ENTITY_CLASS    = '\\WalmartApiClient\\Entity\\Store';
    const COLLECTION_CLASS = '\\WalmartApiClient\\Entity\\Collection\\StoreCollection';
    const COLLECTION_KEY   = null;

    /**
     * Search nearby stores
     *
     * @param float $lat Store search geo-latitude
     * @param float $lon Store search geo-longitude
     * @param string $city Store search city
     * @param string $zip Store search zip code
     * @return \WalmartApiClient\Entity\Collection\StoreCollection
     */
    protected function getStores($lat = null, $lon = null, $city = null, $zip = null)
    {
        $storeParams = [
            'lat'  => $lat,
            'lon'  => $lon,
            'city' => $city,
            'zip'  => $zip,
        ];

        $constraints = array_filter($storeParams, function ($param) {
            return $param !== null;
        });

        return $this->getEntityCollection('stores', $constraints, self::COLLECTION_KEY, $storeParams);
    }


    /**
     * {@inheritdoc}
     */
    public function getStoresByCoordinates($lat, $lon)
    {
        $this->guardFloat($lat);
        $this->guardFloat($lon);

        return $this->getStores($lat, $lon);
    }


    /**
     * {@inheritdoc}
     */
    public function getStoresByCity($city)
    {
        $this->guardString($city);

        return $this->getStores(null, null, $city);
    }


    /**
     * {@inheritdoc}
     */
    public function getStoresByZip($zip)
    {
        $this->guardString($zip);

        return $this->getStores(null, null, null, $zip);
    }
}
