<?php

/**
 * Review collection
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
class ReviewCollection extends AbstractCollection implements ReviewCollectionInterface
{

    /**
     * @var int Reviewed product itemId
     */
    protected $itemId;

    /**
     * @var string Reviewed product name
     */
    protected $name;

    /**
     * @var float Reviewed product price
     */
    protected $salePrice;

    /**
     * @var string Reviewed product UPC
     */
    protected $upc;

    /**
     * @var string Reviewed product category breadcrumb trail
     */
    protected $categoryPath;

    /**
     * @var string Reviewed product brand
     */
    protected $brandName;

    /**
     * @var string Reviewed product full tracking url
     */
    protected $productTrackingUrl;

    /**
     * @var string Reviewed product direct url
     */
    protected $productUrl;

    /**
     * @var string Reviewed product category
     */
    protected $categoryNode;

    /**
     * @var array Reviewed product review stats
     */
    protected $reviewStatistics;

    /**
     * @var bool Reviewed product online availability flag
     */
    protected $availableOnline;

    /**
     * {@inheritdoc}
     */
    public function getItemId()
    {
        return $this->itemId;
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * {@inheritdoc}
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }


    /**
     * {@inheritdoc}
     */
    public function getUpc()
    {
        return $this->upc;
    }


    /**
     * {@inheritdoc}
     */
    public function getCategoryPath()
    {
        return $this->categoryPath;
    }


    /**
     * {@inheritdoc}
     */
    public function getBrandName()
    {
        return $this->brandName;
    }


    /**
     * {@inheritdoc}
     */
    public function getProductTrackingUrl()
    {
        return $this->productTrackingUrl;
    }


    /**
     * {@inheritdoc}
     */
    public function getProductUrl()
    {
        return $this->productUrl;
    }


    /**
     * {@inheritdoc}
     */
    public function getCategoryNode()
    {
        return $this->categoryNode;
    }


    /**
     * {@inheritdoc}
     */
    public function getReviewStatistics()
    {
        return $this->reviewStatistics;
    }


    /**
     * {@inheritdoc}
     */
    public function isAvailableOnline()
    {
        return $this->availableOnline;
    }
}
