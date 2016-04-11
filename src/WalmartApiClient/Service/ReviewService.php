<?php

/**
 * Review service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Service;

class ReviewService extends AbstractService implements ReviewServiceInterface
{

    const ENTITY_CLASS    = '\\WalmartApiClient\\Entity\\Review';
    const COLLECTION_CLASS = '\\WalmartApiClient\\Entity\\Collection\\ReviewCollection';
    const COLLECTION_KEY   = 'reviews';

    /**
     * {@inheritdoc} 
     */
    public function getReviews($itemId)
    {
        $this->guardInt($itemId);

        $reviewParams = [
            'itemId'             => null,
            'name'               => null,
            'salePrice'          => null,
            'upc'                => null,
            'categoryPath'       => null,
            'brandName'          => null,
            'productTrackingUrl' => null,
            'productUrl'         => null,
            'categoryNode'       => null,
            'reviewStatistics'   => null,
            'availableOnline'    => null,
        ];

        return $this->getEntityCollection('reviews/' . $itemId, [], self::COLLECTION_KEY, $reviewParams);
    }
}
