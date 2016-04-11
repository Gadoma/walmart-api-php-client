<?php

/**
 * Abstract collection test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

/**
 * @SuppressWarnings(PHPMD)
 */
class AbstractCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::__construct
     */
    public function testConstruct()
    {
        $collection = new ProductCollection();

        $this->assertTrue($collection instanceof \WalmartApiClient\Entity\Collection\AbstractCollectionInterface);
        $this->assertTrue($collection->getAll() === []);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::__construct
     */
    public function testConstructWithElements()
    {
        $product    = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $collection = new ProductCollection([$product]);

        $this->assertTrue($collection instanceof \WalmartApiClient\Entity\Collection\AbstractCollectionInterface);
        $this->assertTrue($collection->getFirst() === $product);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::__construct
     */
    public function testConstructWithParams()
    {
        $product    = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $collection = new ProductCollection([$product], ['query' => 'search']);

        $this->assertTrue($collection instanceof \WalmartApiClient\Entity\Collection\AbstractCollectionInterface);
        $this->assertTrue($collection->getFirst() === $product);
        $this->assertTrue($collection->getQuery() === 'search');
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::add
     */
    public function testAdd()
    {
        $product    = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $collection = new ProductCollection();
        $collection->add($product);

        $this->assertTrue($collection->getFirst() === $product);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::addMany
     */
    public function testAddMany()
    {
        $product1   = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2   = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $collection = new ProductCollection();
        $collection->addMany([$product1, $product2]);

        $this->assertTrue($collection->getAll() === [spl_object_hash($product1) => $product1, spl_object_hash($product2) => $product2]);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::getAll
     */
    public function testGetAll()
    {
        $product1   = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2   = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $collection = new ProductCollection([$product1, $product2]);

        $this->assertTrue($collection->getAll() === [spl_object_hash($product1) => $product1, spl_object_hash($product2) => $product2]);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::getFirst
     */
    public function testGetFirst()
    {
        $product1   = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2   = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $collection = new ProductCollection([$product1, $product2]);

        $this->assertTrue($collection->getFirst() === $product1);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::clear
     */
    public function testClear()
    {
        $product    = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $collection = new ProductCollection([$product]);
        $collection->clear();

        $this->assertTrue($collection->getAll() === []);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::remove
     */
    public function testRemove()
    {
        $product1   = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2   = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $collection = new ProductCollection([$product1, $product2]);
        $collection->remove($product1);


        $this->assertTrue($collection->getFirst() === $product2);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::count
     */
    public function testCount()
    {
        $product1   = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2   = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $collection = new ProductCollection([$product1, $product2]);

        $this->assertTrue(count($collection) == 2);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::merge
     */
    public function testMerge()
    {
        $product1    = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2    = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $product3    = new \WalmartApiClient\Entity\Product(['itemId' => 3]);
        $product4    = new \WalmartApiClient\Entity\Product(['itemId' => 4]);
        $collection1 = new ProductCollection([$product1, $product2]);
        $collection2 = new ProductCollection([$product3, $product4]);

        $collection1->merge($collection2);
        $items = $collection1->getAll();

        $this->assertTrue(count($collection1) == 4);
        $this->assertTrue(array_pop($items) == $product4);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\AbstractCollection::toArray
     */
    public function testToArray()
    {
        $product1   = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $product2   = new \WalmartApiClient\Entity\Product(['itemId' => 2]);
        $collection = new ProductCollection([$product1, $product2]);
        $array      = $collection->toArray();

        $this->assertTrue($array[0]['itemId'] === 1);
        $this->assertTrue($array[1]['itemId'] === 2);
    }
}
