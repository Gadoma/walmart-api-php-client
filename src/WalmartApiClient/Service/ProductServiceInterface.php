<?php

/**
 * Product service interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Service;

interface ProductServiceInterface
{

    /**
     * Get product by id
     * 
     * @param int $itemId
     * @return \WalmartApiClient\Entity\ProductInterface
     */
    public function getById($itemId);

    /**
     * Get product by UPC
     * 
     * @param string $upc
     * @return \WalmartApiClient\Entity\ProductInterface
     */
    public function getByUpc($upc);

    /**
     * Get product collection by ids
     * 
     * @param array $itemIds
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getByIds(array $itemIds);

    /**
     * Get product collection by search, includes selected page-range of products
     *
     * @param string $phrase Search query
     * @param string $category Category id
     * @param string $facets Include facets in result
     * @param string $facetFilter Name of facet filter
     * @param string $facetRange Value for ranged facet filters
     * @param int $start Page offset
     * @param int $limit Number of items per page
     * @param string $sortField Sort field name
     * @param string $sortOrder Sord order
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getBySearch($phrase, $category = '', $facets = 'off', $facetFilter = '', $facetRange = '', $start = 1, $limit = self::DEFAULT_PAGE_SIZE, $sortField = self::DEFAULT_SORT_FIELD, $sortOrder = self::DEFAULT_SORT_ORDER);

    /**
     * Get product collection by search, includes all resulting products
     *
     * @param string $phrase Search query
     * @param string $category Category id
     * @param string $facets Include facets in result
     * @param string $facetFilter Name of facet filter
     * @param string $facetRange Value for ranged facet filters
     * @param string $sortField Sort field name
     * @param string $sortOrder Sord order
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getAllBySearch($phrase, $category = '', $facets = 'off', $facetFilter = '', $facetRange = '', $sortField = self::DEFAULT_SORT_FIELD, $sortOrder = self::DEFAULT_SORT_ORDER);

    /**
     * Get other browsed product collection based on given product id
     * 
     * @param int $itemId
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getPostbrowsedById($itemId);

    /**
     * Get recommened product collection based on given product id
     * 
     * @param int $itemId
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getRecommendedById($itemId);

    /**
     * Get product collection of trending products
     * 
     * @return \WalmartApiClient\Entity\Collection\ProductCollectionInterface
     */
    public function getTrending();
}
