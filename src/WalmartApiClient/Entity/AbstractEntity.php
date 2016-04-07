<?php

/**
 * Abstract base entity DTO
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       04/04/2016
 */
namespace WalmartApiClient\Entity;

abstract class AbstractEntity implements AbstractEntityInterface
{

    /**
     * Constructor with property hydration
     * 
     * @param array $entityData Entity data
     */
    public function __construct(array $entityData = [])
    {
        foreach ($entityData as $field => $value) {
            if (property_exists($this, $field)) {
                $method = 'set' . ucfirst($field);
                $this->$method($value);
            }
        }
    }


    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $reflectionClass = new \ReflectionClass(get_class($this));
        $array           = [];
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($this);
            $property->setAccessible(false);
        }
        return $array;
    }
}
