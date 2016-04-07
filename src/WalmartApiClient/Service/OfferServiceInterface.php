<?php

/**
 * Offer service interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Service;

interface OfferServiceInterface
{

    /**
     * Get value of the day
     * 
     * @return \WalmartApiClient\Entity\ProductInterface
     */
    public function getVod();

    /**
     * Get products available for pre-order for the given category
     * 
     * @param string $category Category id 
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getPreorder($category);

    /**
     * Get bestseller product offers for the given category
     * 
     * @param string $category Category id 
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getBestsellers($category);

    /**
     * Get rollback product offers for the given category
     * 
     * @param string $category Category id 
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getRollback($category);

    /**
     * Get clearance product offers for the given category
     * 
     * @param string $category Category id 
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getClearance($category);

    /**
     * Get specialbuy product offers for the given category
     * 
     * @param string $category Category id 
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getSpecialbuy($category);
}
