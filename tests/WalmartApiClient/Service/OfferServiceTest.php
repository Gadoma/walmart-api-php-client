<?php

/**
 * Offer service test
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
class OfferServiceTest extends ServiceBaseTest
{

    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getVod
     * @covers WalmartApiClient\Service\AbstractService::getEntity
     */
    public function testGetVod()
    {
        $mocks   = $this->getServiceMocksForEntity('Offer', 'vod', [], ['itemId' => 1]);
        $service = $mocks['service'];

        $actual   = $service->getVod();
        $expected = $mocks['entity'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getPreorder
     * @covers WalmartApiClient\Service\AbstractService::getEntityCollection
     */
    public function testGetPreorder()
    {
        $mocks   = $this->getServiceMocksForCollection('Offer', 'feeds/preorder', ['categoryId' => '12345'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getPreorder('12345');
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getPreorder
     * @covers WalmartApiClient\Service\AbstractService::getEntityCollection
     * @covers WalmartApiClient\Service\AbstractService::__construct
     */
    public function testGetPreorderEmptyResult()
    {
        $mocks   = $this->getServiceMocksForCollection('Offer', 'feeds/preorder', ['categoryId' => '12345'], [], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getPreorder('12345');
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
        $this->assertTrue($service instanceof \WalmartApiClient\Service\AbstractService);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getPreorder
     * @covers WalmartApiClient\Service\AbstractService::guardString
     * @expectedException \InvalidArgumentException
     */
    public function testGetPreorderEmptyArgumentException()
    {
        $service = $this->getServiceMocksForException('Offer');

        $service->getPreorder(null);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getPreorder
     * @covers WalmartApiClient\Service\AbstractService::guardString
     * @expectedException \InvalidArgumentException
     */
    public function testGetPreorderWrongArgumentException()
    {
        $service = $this->getServiceMocksForException('Offer');

        $service->getPreorder(12345);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getBestsellers
     */
    public function testGetBestsellers()
    {
        $mocks   = $this->getServiceMocksForCollection('Offer', 'feeds/bestsellers', ['categoryId' => '12345'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getBestsellers('12345');
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getRollback
     */
    public function testGetRollback()
    {
        $mocks   = $this->getServiceMocksForCollection('Offer', 'feeds/rollback', ['categoryId' => '12345'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getRollback('12345');
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getClearance
     */
    public function testGetClearance()
    {
        $mocks   = $this->getServiceMocksForCollection('Offer', 'feeds/clearance', ['categoryId' => '12345'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getClearance('12345');
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers WalmartApiClient\Service\OfferService::getSpecialbuy
     */
    public function testGetSpecialbuy()
    {
        $mocks   = $this->getServiceMocksForCollection('Offer', 'feeds/specialbuy', ['categoryId' => '12345'], ['items' => [['itemId' => 1], ['itemId' => 2]]], 'items', []);
        $service = $mocks['service'];


        $actual   = $service->getSpecialbuy('12345');
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }
}
