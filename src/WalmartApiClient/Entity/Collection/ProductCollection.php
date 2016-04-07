<?php

/**
 * Product collection
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

/**
 * @codeCoverageIgnore
 */
class ProductCollection extends AbstractCollection implements ProductCollectionInterface
{

    /**
     * @var string Search query
     */
    protected $query;

    /**
     * @var string Search category
     */
    protected $categoryId;

    /**
     * @var string Search result sort field
     */
    protected $sort;

    /**
     * @var string Search result sort order
     */
    protected $order;

    /**
     * @var int Search result total number of items
     */
    protected $totalResults;

    /**
     * @var int Search result offset
     */
    protected $start;

    /**
     * @var int Search result page size
     */
    protected $numItems;

    /**
     * @var array The array of search facets
     */
    protected $facets;

    /**
     * {@inheritdoc}
     */
    public function getQuery()
    {
        return $this->query;
    }


    /**
     * {@inheritdoc}
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }


    /**
     * {@inheritdoc}
     */
    public function getSort()
    {
        return $this->sort;
    }


    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return $this->order;
    }


    /**
     * {@inheritdoc}
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }


    /**
     * {@inheritdoc}
     */
    public function getStart()
    {
        return $this->start;
    }


    /**
     * {@inheritdoc}
     */
    public function getNumItems()
    {
        return $this->numItems;
    }


    /**
     * {@inheritdoc}
     */
    public function setNumItems($value)
    {
        $this->numItems = $value;
    }


    /**
     * {@inheritdoc}
     */
    public function getFacets()
    {
        return $this->facets;
    }
}
