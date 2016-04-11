<?php

/**
 * Abstract collection
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

abstract class AbstractCollection implements AbstractCollectionInterface, \Countable
{

    /**
     * @var array Collection item storage
     */
    protected $elements = [];

    /**
     * Constructor with specific collection parameters attribution
     * 
     * @param array $elements Items of collection
     * @param array $collectionParameters Specific collection parameters
     */
    public function __construct(array $elements = [], array $collectionParameters = [])
    {
        $this->addMany($elements);

        foreach ($collectionParameters as $field => $value) {
            if (property_exists($this, $field) && $field !== 'elements') {
                $this->$field = $value;
            }
        }
    }


    /**
     * {@inheritdoc}
     */
    public function add(\WalmartApiClient\Entity\AbstractEntityInterface $item)
    {
        $this->elements[spl_object_hash($item)] = $item;
    }


    /**
     * {@inheritdoc}
     */
    public function addMany(array $items)
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }


    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->elements;
    }


    /**
     * {@inheritdoc}
     */
    public function getFirst()
    {
        return reset($this->elements);
    }


    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->elements = [];
    }


    /**
     * {@inheritdoc}
     */
    public function remove(\WalmartApiClient\Entity\AbstractEntityInterface $item)
    {
        unset($this->elements[spl_object_hash($item)]);
    }


    /**
     * {@inheritdoc}
     */
    public function merge(\WalmartApiClient\Entity\Collection\AbstractCollectionInterface $collection)
    {
        $this->elements = array_merge($this->elements, $collection->getAll());
    }


    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->elements);
    }


    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $array = [];

        foreach ($this->elements as $item) {
            $array[] = $item->toArray();
        }

        return $array;
    }
}
