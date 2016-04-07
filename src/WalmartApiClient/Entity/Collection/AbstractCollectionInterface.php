<?php

/**
 * Abstract collection interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

interface AbstractCollectionInterface
{

    /**
     * Add item to collection
     *
     * @param \WalmartApiClient\Entity\AbstractEntityInterface $item Object to add to collection
     */
    public function add(\WalmartApiClient\Entity\AbstractEntityInterface $item);

    /**
     * Add multiple items to collection
     *
     * @param array $items Array of objects to add to collection
     */
    public function addMany(array $items);

    /**
     * Get all items of collection
     *
     * @return array All collection elements
     */
    public function getAll();

    /**
     * Get the first item in collection
     *
     * @return \WalmartApiClient\Entity\AbstractEntityInterface First collection element
     */
    public function getFirst();

    /**
     * Clear collection
     */
    public function clear();

    /**
     * Remove item from collection
     *
     * @param \WalmartApiClient\Entity\AbstractEntityInterface $item Object to remove from collection
     */
    public function remove(\WalmartApiClient\Entity\AbstractEntityInterface $item);

    /**
     * Merge items from another collection
     * @param \WalmartApiClient\Entity\Collection\AbstractCollectionInterface $collection
     */
    public function merge(\WalmartApiClient\Entity\Collection\AbstractCollectionInterface $collection);

    /**
     * Get the number of items in collection
     *
     * @implements Countable::count
     * @return int Collection item count
     */
    public function count();

    /**
     * Get all items of collection as array
     * 
     * @return array All collection elements as arrays
     */
    public function toArray();
}
