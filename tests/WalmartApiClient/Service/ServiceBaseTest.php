<?php

/**
 * Base service test case with helper functions
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
class ServiceBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Get mock of the TransportService
     * 
     * @return \Mockery\MockInterface
     */
    protected function getTransportMock()
    {
        $guzzle  = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl  = 'http://api.walmartlabs.com/v1/';
        $apiKey  = 'walmartapikey';
        return \Mockery::mock('\WalmartApiClient\Http\TransportService', [$guzzle, $handler, $apiUrl, $apiKey]);
    }


    /**
     * Get mock of Entity and instance of Service
     * 
     * @param string $service Base name of the Service
     * @param string $apiUri URI of entity source API resource
     * @param string $apiParams API request params
     * @param string $apiReturn API response
     * @return array Array containing Entity mock and Service instance
     */
    protected function getServiceMocksForEntity($service, $apiUri, $apiParams, $apiReturn)
    {
        if ($service == 'Offer') {
            $service     = 'Product';
            $serviceName = 'Offer';
        } else {
            $serviceName = $service;
        }

        $transport = $this->getTransportMock();
        $transport->shouldReceive('callApi')->once()->with($apiUri, $apiParams)->andReturn($apiReturn);

        $entityClass = "\\WalmartApiClient\\Entity\\$service";
        $entity      = \Mockery::mock($entityClass, [$apiReturn]);

        $entityFactory = \Mockery::mock('\WalmartApiClient\Factory\EntityFactoryInterface');
        $entityFactory->shouldReceive('instance')->once()->with($entityClass, $apiReturn)->andReturn($entity);

        $collectionFactory = \Mockery::mock('\WalmartApiClient\Factory\CollectionFactoryInterface');

        $serviceClass = "\\WalmartApiClient\\Service\\{$serviceName}Service";
        $svc          = new $serviceClass($transport, $entityFactory, $collectionFactory);

        return ['entity' => $entity, 'service' => $svc];
    }


    /**
     * Get mock of Collection and instance of Service
     * 
     * @param string $service Base name of the Service
     * @param string $apiUri URI of entity source API resource
     * @param string $apiParams API request params
     * @param string $apiReturn API response
     * @param string $collectionKey Collection items key in API response
     * @param array $collectionParams Collection specific parameters
     * @return array Array containing Collection mock and Service instance
     */
    protected function getServiceMocksForCollection($service, $apiUri, $apiParams, $apiReturn, $collectionKey, $collectionParams)
    {
        $serviceName = $service;

        if ($service == 'Offer') {
            $service = 'Product';
        }

        $transport = $this->getTransportMock();
        $transport->shouldReceive('callApi')->once()->with($apiUri, $apiParams)->andReturn($apiReturn);

        $entityClass     = "\\WalmartApiClient\\Entity\\$service";
        $items           = $collectionKey !== null ? isset($apiReturn[$collectionKey]) ? $apiReturn[$collectionKey] : [] : $apiReturn;
        $collectionItems = $items;

        $entityFactory = \Mockery::mock('\WalmartApiClient\Factory\EntityFactoryInterface');

        if (!empty($items)) {
            $entity1 = \Mockery::mock($entityClass, [$items[0]]);
            $entity2 = \Mockery::mock($entityClass, [$items[1]]);

            $entityFactory->shouldReceive('instance')->once()->with($entityClass, $items[0])->andReturn($entity1);
            $entityFactory->shouldReceive('instance')->once()->with($entityClass, $items[1])->andReturn($entity2);

            $collectionItems = [$entity1, $entity2];
        }

        $collectionClass = "\\WalmartApiClient\\Entity\\Collection\\{$service}Collection";
        $collection      = \Mockery::mock("{$collectionClass}Interface");

        $collectionFactory = \Mockery::mock('\WalmartApiClient\Factory\CollectionFactoryInterface');
        $collectionFactory->shouldReceive('instance')->once()->with($collectionClass, $collectionItems, $collectionParams)->andReturn($collection);

        $serviceClass = "\\WalmartApiClient\\Service\\{$serviceName}Service";
        $svc          = new $serviceClass($transport, $entityFactory, $collectionFactory);

        return ['collection' => $collection, 'service' => $svc];
    }


    /**
     * Get Service with simplified mocks injected only for testing exceptions
     * 
     * @param string $service
     * @return mixed The relevant service
     */
    protected function getServiceMocksForException($service)
    {
        $transport = $this->getTransportMock();

        $entityFactory     = \Mockery::mock('\WalmartApiClient\Factory\EntityFactoryInterface');
        $collectionFactory = \Mockery::mock('\WalmartApiClient\Factory\CollectionFactoryInterface');

        $serviceClass = '\\WalmartApiClient\\Service\\' . $service . 'Service';
        return new $serviceClass($transport, $entityFactory, $collectionFactory);
    }
}
