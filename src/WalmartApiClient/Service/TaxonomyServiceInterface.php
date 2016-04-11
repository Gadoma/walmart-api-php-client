<?php

/**
 * Taxonomy service interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       08/04/2016
 */
namespace WalmartApiClient\Service;

interface TaxonomyServiceInterface
{

    /**
     * Get the full taxonomy tree
     *
     * @return \WalmartApiClient\Entity\Collection\CategoryCollectionInterface A collection of base categories
     */
    public function getCategories();
}
