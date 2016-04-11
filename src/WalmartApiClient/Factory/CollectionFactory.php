<?php

/**
 * Collection factory
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Factory;

class CollectionFactory implements CollectionFactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function instance($className, array $elements = [], array $collectionParameters = [])
    {
        if (!class_exists($className)) {
            throw new \InvalidArgumentException("Class $className does not exist.");
        }

        $reflector = new \ReflectionClass($className);
        return $reflector->newInstanceArgs([$elements, $collectionParameters]);
    }
}
