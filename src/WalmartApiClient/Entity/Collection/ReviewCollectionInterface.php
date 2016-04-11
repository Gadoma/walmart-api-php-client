<?php

/**
 * Review collection interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

interface ReviewCollectionInterface
{

    /**
     * @return int
     */
    public function getItemId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return float
     */
    public function getSalePrice();

    /**
     * @return string
     */
    public function getUpc();

    /**
     * @return string
     */
    public function getCategoryPath();

    /**
     * @return string
     */
    public function getBrandName();

    /**
     * @return string
     */
    public function getProductTrackingUrl();

    /**
     * @return string
     */
    public function getProductUrl();

    /**
     * @return string
     */
    public function getCategoryNode();

    /**
     * @return array
     */
    public function getReviewStatistics();

    /**
     * @return bool
     */
    public function isAvailableOnline();
}
