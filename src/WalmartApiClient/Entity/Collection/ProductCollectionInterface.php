<?php

/**
 * Product collection interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

interface ProductCollectionInterface
{

    /**
     * @return string
     */
    public function getQuery();

    /**
     * @return string
     */
    public function getCategoryId();

    /**
     * @return string
     */
    public function getSort();

    /**
     * @return string
     */
    public function getOrder();

    /**
     * @return int
     */
    public function getTotalResults();

    /**
     * @return int
     */
    public function getStart();

    /**
     * @return int
     */
    public function getNumItems();

    /**
     * @param int
     */
    public function setNumItems($value);

    /**
     * @return array
     */
    public function getFacets();
}
