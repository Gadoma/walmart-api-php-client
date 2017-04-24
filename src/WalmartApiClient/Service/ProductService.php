<?php

/**
 * Product service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Service;

class ProductService extends AbstractService implements ProductServiceInterface
{
    const DEFAULT_PAGE_SIZE  = 25;
    const DEFAULT_SORT_FIELD = 'relevance';
    const DEFAULT_SORT_ORDER = 'asc';
    const ENTITY_CLASS      = '\\WalmartApiClient\\Entity\\Product';
    const COLLECTION_CLASS   = '\\WalmartApiClient\\Entity\\Collection\\ProductCollection';
    const COLLECTION_KEY     = 'items';

    /**
     * {@inheritdoc}
     */
    public function getById($itemId)
    {
        $this->guardInt($itemId);

        return $this->getEntity('items/' . $itemId);
    }


    /**
     * {@inheritdoc}
     */
    public function getByUpc($upc)
    {
        $this->guardString($upc);

        return $this->getEntity('items', ['upc' => $upc]);
    }


    /**
     * {@inheritdoc}
     */
    public function getByIds(array $ids)
    {
        $this->guardIntArray($ids);

        return $this->getEntityCollection('items', ['ids' => implode(',', $ids)], self::COLLECTION_KEY);
    }


    /**
     * {@inheritdoc}
     */
    public function getBySearch($phrase, $category = '', $facets = 'off', $facetFilter = '', $facetRange = '', $start = 1, $limit = self::DEFAULT_PAGE_SIZE, $sortField = self::DEFAULT_SORT_FIELD, $sortOrder = self::DEFAULT_SORT_ORDER)
    {
        $this->guardString($phrase);

        $searchParams = [
            'query'    => $phrase,
            'start'    => $start,
            'numItems' => $limit,
            'sort'     => $sortField,
            'order'    => $sortOrder,
            'facets'   => $facets
        ];

        $constraints                  = array_merge($searchParams, ['responseGroup' => 'full']);
        $searchParams['totalResults'] = null;

        if ($category !== '') {
            $constraints['categoryId']  = $category;
            $searchParams['categoryId'] = $category;
        }

        if ($facets == 'on') {
            if ($facetFilter !== '') {
                $constraints['facet.filter'] = $facetFilter;
            }
            
            if ($facetRange !== '') {
                $constraints['facet.range'] = $facetRange;
            }
        }

        return $this->getEntityCollection('search', $constraints, self::COLLECTION_KEY, $searchParams);
    }


    /**
     * {@inheritdoc}
     */
    public function getAllBySearch($phrase, $category = '', $facets = 'off', $facetFilter = '', $facetRange = '', $sortField = self::DEFAULT_SORT_FIELD, $sortOrder = self::DEFAULT_SORT_ORDER)
    {
        $this->guardString($phrase);

        $start = 1;
        $page  = $this->getBySearch($phrase, $category, $facets, $facetFilter, $facetRange, $start, self::DEFAULT_PAGE_SIZE, $sortField, $sortOrder);

        while ($page->count() < $page->getTotalResults()) {
            $start += self::DEFAULT_PAGE_SIZE;
            $page->merge($this->getBySearch($phrase, $category, $facets, $facetFilter, $facetRange, $start, self::DEFAULT_PAGE_SIZE, $sortField, $sortOrder));
        }

        $page->setNumItems($page->getTotalResults());

        return $page;
    }


    /**
     * {@inheritdoc}
     */
    public function getPostbrowsedById($itemId)
    {
        $this->guardInt($itemId);

        return $this->getEntityCollection('postbrowse', ['itemId' => $itemId]);
    }


    /**
     * {@inheritdoc}
     */
    public function getRecommendedById($itemId)
    {
        $this->guardInt($itemId);

        return $this->getEntityCollection('nbp', ['itemId' => $itemId]);
    }


    /**
     * {@inheritdoc}
     */
    public function getTrending()
    {
        return $this->getEntityCollection('trends', [], self::COLLECTION_KEY);
    }
}
