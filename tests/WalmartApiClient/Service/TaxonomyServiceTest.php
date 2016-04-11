<?php

/**
 * Taxonomy service test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       08/04/2016
 */
namespace WalmartApiClient\Service;

/**
 * @SuppressWarnings(PHPMD)
 */
class TaxonomyServiceTest extends ServiceBaseTest
{

    /**
     * @test
     * @covers WalmartApiClient\Service\TaxonomyService::getCategories
     * @covers WalmartApiClient\Service\TaxonomyService::buildTaxonomy
     */
    public function testGetCategories()
    {
        $fixture = '{
                        "categories": [
                          {
                            "id": "91083",
                            "name": "Auto & Tires",
                            "path": "Auto & Tires",
                            "children": [
                              {
                                "id": "91083_1080484",
                                "name": "ATV, Motorcycle, & RV Accessories",
                                "path": "Auto & Tires/ATV, Motorcycle, & RV Accessories",
                                "children": [
                                  {
                                    "id": "91083_1080484_49954",
                                    "name": "ATV Accessories",
                                    "path": "Auto & Tires/ATV, Motorcycle, & RV Accessories/ATV Accessories"
                                  }
                                ]
                              }
                            ]
                          }
                        ]
                    }';


        $entityClass = "\\WalmartApiClient\\Entity\\Category";

        $grandChildEntityMock = \Mockery::mock($entityClass);
        $grandChildEntityMock->shouldReceive('setId')->once()->with('91083_1080484_49954');
        $grandChildEntityMock->shouldReceive('setName')->once()->with('ATV Accessories');
        $grandChildEntityMock->shouldReceive('setPath')->once()->with('Auto & Tires/ATV, Motorcycle, & RV Accessories/ATV Accessories');

        $childEntityMock = \Mockery::mock($entityClass);
        $childEntityMock->shouldReceive('setId')->once()->with('91083_1080484');
        $childEntityMock->shouldReceive('setName')->once()->with('ATV, Motorcycle, & RV Accessories');
        $childEntityMock->shouldReceive('setPath')->once()->with('Auto & Tires/ATV, Motorcycle, & RV Accessories');
        $childEntityMock->shouldReceive('setChildren')->once()->with([$grandChildEntityMock]);

        $parentEntityMock = \Mockery::mock($entityClass);
        $parentEntityMock->shouldReceive('setId')->once()->with('91083');
        $parentEntityMock->shouldReceive('setName')->once()->with('Auto & Tires');
        $parentEntityMock->shouldReceive('setPath')->once()->with('Auto & Tires');
        $parentEntityMock->shouldReceive('setChildren')->once()->with([$childEntityMock]);

        $entityFactory = \Mockery::mock('\WalmartApiClient\Factory\EntityFactoryInterface');
        $entityFactory->shouldReceive('instance')->once()->with($entityClass, [])->andReturn($parentEntityMock);
        $entityFactory->shouldReceive('instance')->once()->with($entityClass, [])->andReturn($childEntityMock);
        $entityFactory->shouldReceive('instance')->once()->with($entityClass, [])->andReturn($grandChildEntityMock);

        $collectionClass = "\\WalmartApiClient\\Entity\\Collection\\CategoryCollection";
        $collection      = \Mockery::mock($collectionClass);
        $collectionItems = [$parentEntityMock];

        $collectionFactory = \Mockery::mock('\WalmartApiClient\Factory\CollectionFactoryInterface');
        $collectionFactory->shouldReceive('instance')->once()->with($collectionClass, $collectionItems, [])->andReturn($collection);

        $transport = $this->getTransportMock();
        $transport->shouldReceive('callApi')->once()->with('taxonomy')->andReturn(json_decode($fixture, true));

        $serviceClass = "\\WalmartApiClient\\Service\\TaxonomyService";
        $service      = new $serviceClass($transport, $entityFactory, $collectionFactory);

        $actual   = $service->getCategories();
        $expected = $collection;

        $this->assertTrue($actual === $expected);
    }
}
