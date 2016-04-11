<?php

/**
 * Entity factory interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Factory;

interface EntityFactoryInterface
{

    /**
     * Return new instance of given entity class hydrated with given data 
     * 
     * @param string $className The entity class name
     * @param array $entityData The entity properties
     * @return \WalmartApiClient\Entity\AbstractEntityInterface
     */
    public function instance($className, array $entityData = []);
}
