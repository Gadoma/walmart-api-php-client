<?php

/**
 * Taxonomy service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       08/04/2016
 */
namespace WalmartApiClient\Service;

class TaxonomyService extends AbstractService implements TaxonomyServiceInterface
{

    const ENTITY_CLASS    = '\\WalmartApiClient\\Entity\\Category';
    const COLLECTION_CLASS = '\\WalmartApiClient\\Entity\\Collection\\CategoryCollection';
    const COLLECTION_KEY   = 'categories';

    /**
     * Recursive function to build a nested structure of categories
     * 
     * @param array $taxonomy The structure
     * @param array $response The data array with (sub)category data
     * @return array Taxonomy (sub)tree
     */
    protected function buildTaxonomy(array $taxonomy, $response)
    {
        foreach ($response as $category) {
            $item = $this->entityFactory->instance(static::ENTITY_CLASS, []);
            $item->setId($category['id']);
            $item->setName($category['name']);
            $item->setPath($category['path']);

            if (isset($category['children']) && !empty($category['children'])) {
                $children = $this->buildTaxonomy([], $category['children']);
                $item->setChildren($children);
            }

            $taxonomy[] = $item;
        }

        return $taxonomy;
    }


    /**
     * {@inheritdoc} 
     */
    public function getCategories()
    {
        $response = $this->transportService->callApi('taxonomy');

        $taxonomy = $this->buildTaxonomy([], $response[static::COLLECTION_KEY]);

        return $this->collectionFactory->instance(static::COLLECTION_CLASS, $taxonomy, []);
    }
}
