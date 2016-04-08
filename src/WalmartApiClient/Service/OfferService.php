<?php

/**
 * Offer service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Service;

class OfferService extends AbstractService implements OfferServiceInterface
{

    const ENTITY_CLASS    = '\\WalmartApiClient\\Entity\\Product';
    const COLLECTION_CLASS = '\\WalmartApiClient\\Entity\\Collection\\ProductCollection';
    const COLLECTION_KEY   = 'items';

    /**
     * {@inheritdoc}
     */
    public function getVod()
    {
        return $this->getEntity('vod');
    }


    /**
     * {@inheritdoc}
     */
    public function getPreorder($category)
    {
        $this->guardString($category);
        return $this->getEntityCollection('feeds/preorder', ['categoryId' => $category], static::COLLECTION_KEY);
    }


    /**
     * {@inheritdoc}
     */
    public function getBestsellers($category)
    {
        $this->guardString($category);
        return $this->getEntityCollection('feeds/bestsellers', ['categoryId' => $category], static::COLLECTION_KEY);
    }


    /**
     * {@inheritdoc}
     */
    public function getRollback($category)
    {
        $this->guardString($category);
        return $this->getEntityCollection('feeds/rollback', ['categoryId' => $category], static::COLLECTION_KEY);
    }


    /**
     * {@inheritdoc}
     */
    public function getClearance($category)
    {
        $this->guardString($category);
        return $this->getEntityCollection('feeds/clearance', ['categoryId' => $category], static::COLLECTION_KEY);
    }


    /**
     * {@inheritdoc}
     */
    public function getSpecialbuy($category)
    {
        $this->guardString($category);
        return $this->getEntityCollection('feeds/specialbuy', ['categoryId' => $category], self::COLLECTION_KEY);
    }
}
