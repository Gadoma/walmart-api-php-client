<?php

/**
 * Review service interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Service;

interface ReviewServiceInterface
{

    /**
     * Get reviews for a given product
     *
     * @param int $itemId Product id
     * @return \WalmartApiClient\Entity\Collection\ReviewCollectionInterface A collection of reviews for given product
     */
    public function getReviews($itemId);
}
