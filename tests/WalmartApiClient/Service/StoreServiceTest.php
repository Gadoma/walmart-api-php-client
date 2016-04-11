<?php

/**
 * Store service test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       07/04/2016
 */
namespace WalmartApiClient\Service;

/**
 * @SuppressWarnings(PHPMD)
 */
class StoreServiceTest extends ServiceBaseTest
{

    /**
     * @test
     * @covers WalmartApiClient\Service\StoreService::getStoresByCity
     * @covers WalmartApiClient\Service\StoreService::getStores
     * @covers WalmartApiClient\Service\AbstractService::getEntityCollection
     */
    public function testGetStoresByCity()
    {
        $mocks   = $this->getServiceMocksForCollection('Store', 'stores', ['city' => 'Chicago'], [['no' => 1], ['no' => 2]], null, ['lat' => null, 'lon' => null, 'city' => 'Chicago', 'zip' => null]);
        $service = $mocks['service'];

        $actual   = $service->getStoresByCity("Chicago");
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\StoreService::getStoresByCoordinates
     * @covers WalmartApiClient\Service\StoreService::getStores
     */
    public function testGetStoresByCoord()
    {
        $mocks   = $this->getServiceMocksForCollection('Store', 'stores', ['lat' => 10.123, 'lon' => -20.123], [['no' => 1], ['no' => 2]], null, ['lat' => 10.123, 'lon' => -20.123, 'city' => null, 'zip' => null]);
        $service = $mocks['service'];

        $actual   = $service->getStoresByCoordinates(10.123, -20.123);
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\StoreService::getStoresByCoordinates
     * @covers WalmartApiClient\Service\AbstractService::guardFloat
     * @expectedException \InvalidArgumentException
     */
    public function testGetStoresByCoordWrongArgument()
    {
        $service = $this->getServiceMocksForException('Store');

        $service->getStoresByCoordinates("12345", "54321");
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\StoreService::getStoresByZip
     * @covers WalmartApiClient\Service\StoreService::getStores
     */
    public function testGetStoresByZip()
    {
        $mocks   = $this->getServiceMocksForCollection('Store', 'stores', ['zip' => '12345'], [['no' => 1], ['no' => 2]], null, ['lat' => null, 'lon' => null, 'city' => null, 'zip' => '12345']);
        $service = $mocks['service'];

        $actual   = $service->getStoresByZip("12345");
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }
}
