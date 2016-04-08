<?php

/**
 * Product service test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Service;

/**
 * @SuppressWarnings(PHPMD)
 */
class ProductServiceTest extends ServiceBaseTest
{

    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getById
     */
    public function testGetById()
    {
        $mocks   = $this->getServiceMocksForEntity('Product', 'items/1', [], ['itemId' => 1]);
        $service = $mocks['service'];

        $actual   = $service->getById(1);
        $expected = $mocks['entity'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getById
     * @covers WalmartApiClient\Service\AbstractService::guardInt
     * @expectedException \InvalidArgumentException
     */
    public function testGetByIdWrongArgumentException()
    {
        $service = $this->getServiceMocksForException('Product');

        $service->getById('12345');
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getByUpc
     */
    public function testGetByUpc()
    {
        $mocks   = $this->getServiceMocksForEntity('Product', 'items', ['upc' => '12345'], ['itemId' => 1]);
        $service = $mocks['service'];

        $actual   = $service->getByUpc('12345');
        $expected = $mocks['entity'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getByIds
     */
    public function testGetByIds()
    {
        $mocks   = $this->getServiceMocksForCollection('Product', 'items', ['ids' => '1,2'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getByIds([1, 2]);
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getByIds
     * @covers WalmartApiClient\Service\AbstractService::guardIntArray
     * @expectedException \InvalidArgumentException
     */
    public function testGetByIdsWrongArgumentException()
    {
        $service = $this->getServiceMocksForException('Product');

        $service->getByIds(['12345']);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getByIds
     * @covers WalmartApiClient\Service\AbstractService::guardIntArray
     * @expectedException \InvalidArgumentException
     */
    public function testGetByIdsEmptyArgumentException()
    {
        $service = $this->getServiceMocksForException('Product');

        $service->getByIds([]);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getBySearch
     * @covers WalmartApiClient\Service\AbstractService::getEntityCollection
     */
    public function testGetBySearch()
    {
        $mocks   = $this->getServiceMocksForCollection('Product', 'search', ['query' => 'search', 'start' => 1, 'numItems' => 25, 'sort' => 'relevance', 'order' => 'asc', 'facets' => 'off', 'responseGroup' => 'full'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', ['query' => 'search', 'start' => 1, 'numItems' => 25, 'sort' => 'relevance', 'order' => 'asc', 'facets' => 'off', 'totalResults' => null]);
        $service = $mocks['service'];

        $actual   = $service->getBySearch('search');
        $expected = $mocks['collection'];


        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getBySearch
     */
    public function testGetBySearchWithCategory()
    {
        $mocks   = $this->getServiceMocksForCollection('Product', 'search', ['query' => 'search', 'categoryId' => '12345', 'start' => 1, 'numItems' => 25, 'sort' => 'relevance', 'order' => 'asc', 'facets' => 'off', 'responseGroup' => 'full'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', ['query' => 'search', 'categoryId' => '12345', 'start' => 1, 'numItems' => 25, 'sort' => 'relevance', 'order' => 'asc', 'facets' => 'off', 'totalResults' => null]);
        $service = $mocks['service'];

        $actual   = $service->getBySearch('search', '12345');
        $expected = $mocks['collection'];


        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getAllBySearch
     */
    public function testGetAllBySearch()
    {
        $mocks      = $this->getServiceMocksForCollection('Product', 'search', ['query' => 'search', 'start' => 1, 'numItems' => 25, 'sort' => 'relevance', 'order' => 'asc', 'facets' => 'off', 'responseGroup' => 'full'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', ['query' => 'search', 'start' => 1, 'numItems' => 25, 'sort' => 'relevance', 'order' => 'asc', 'facets' => 'off', 'totalResults' => null]);
        $service    = $mocks['service'];
        $collection = $mocks['collection'];

        $collection->shouldReceive('count')->once()->andReturn(2);
        $collection->shouldReceive('getTotalResults')->once()->andReturn(2);
        $collection->shouldReceive('setNumItems')->once()->with(2);

        $actual   = $service->getAllBySearch('search');
        $expected = $collection;

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getPostbrowsedById
     */
    public function testGetPostbrowsedById()
    {
        $mocks   = $this->getServiceMocksForCollection('Product', 'postbrowse', ['itemId' => 12345], [['itemId' => 1], ['itemId' => 2]], null, []);
        $service = $mocks['service'];


        $actual   = $service->getPostbrowsedById(12345);
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getRecommendedById
     */
    public function testGetRecommendedById()
    {
        $mocks   = $this->getServiceMocksForCollection('Product', 'nbp', ['itemId' => 12345], [['itemId' => 1], ['itemId' => 2]], null, []);
        $service = $mocks['service'];


        $actual   = $service->getRecommendedById(12345);
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\ProductService::getTrending
     * @covers WalmartApiClient\Service\AbstractService::getEntityCollection
     */
    public function testGetTrending()
    {
        $mocks   = $this->getServiceMocksForCollection('Product', 'trends', [], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getTrending();
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }
}
