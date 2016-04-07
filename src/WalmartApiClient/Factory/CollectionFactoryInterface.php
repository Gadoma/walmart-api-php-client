<?php

/**
 * Collection factory interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Factory;

interface CollectionFactoryInterface
{

    /**
     * Return new instance of given entity collection class hydrated with given objects and auxiliary data 
     * 
     * @param string $className The collection class name
     * @param array $elements The collection items
     * @param array $collectionParameters
     * @return \WalmartApiClient\Entity\Collection\AbstractCollectionInterface
     */
    public function instance($className, array $elements = [], array $collectionParameters = []);
}
