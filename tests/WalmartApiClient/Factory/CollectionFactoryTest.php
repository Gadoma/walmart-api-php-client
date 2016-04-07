<?php

/**
 * Collection factory test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Factory;

/**
 * @SuppressWarnings(PHPMD)
 */
class CollectionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers WalmartApiClient\Factory\CollectionFactory::instance
     */
    public function testInstance()
    {
        $factory = new \WalmartApiClient\Factory\CollectionFactory();

        $product1 = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2 = new \WalmartApiClient\Entity\Product(['itemId' => 2]);

        $collection = $factory->instance('\\WalmartApiClient\\Entity\\Collection\\ProductCollection', [$product1, $product2]);

        $this->assertTrue($collection instanceof \WalmartApiClient\Entity\Collection\ProductCollectionInterface);
        $this->assertTrue($collection->getFirst()->getItemId() === 1);
    }


    /**
     * @test
     * @covers WalmartApiClient\Factory\CollectionFactory::instance
     */
    public function testInstanceWithParams()
    {
        $factory = new \WalmartApiClient\Factory\CollectionFactory();

        $product1 = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2 = new \WalmartApiClient\Entity\Product(['itemId' => 2]);

        $collection = $factory->instance('\\WalmartApiClient\\Entity\\Collection\\ProductCollection', [$product1, $product2], ['query' => 'search']);

        $this->assertTrue($collection instanceof \WalmartApiClient\Entity\Collection\ProductCollectionInterface);
        $this->assertTrue($collection->getFirst()->getItemId() === 1);
        $this->assertTrue($collection->getQuery() === 'search');
    }


    /**
     * @test
     * @covers WalmartApiClient\Factory\CollectionFactory::instance
     * @expectedException \InvalidArgumentException
     */
    public function testInstanceWrongClassException()
    {
        $factory = new \WalmartApiClient\Factory\CollectionFactory();

        $factory->instance('\\IDontExist', [], []);
    }
}
