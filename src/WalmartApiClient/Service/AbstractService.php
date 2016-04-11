<?php

/**
 * Abstract base service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Service;

abstract class AbstractService
{

    /**
     *
     * @var \WalmartApiClient\Http\TransportServiceInterface The transport service 
     */
    protected $transportService;

    /**
     *
     * @var \WalmartApiClient\Factory\EntityFactoryInterface The entity factory 
     */
    protected $entityFactory;

    /**
     *
     * @var \WalmartApiClient\Factory\CollectionFactoryInterface The collection factory 
     */
    protected $collectionFactory;

    /**
     * Constructor with injected transport service and relevant factories
     * 
     * @param \WalmartApiClient\Http\TransportServiceInterface $transport HTTP Transport service
     * @param \WalmartApiClient\Factory\EntityFactoryInterface $entityFactory Entity factory
     * @param \WalmartApiClient\Factory\CollectionFactoryInterface $collectionFactory Collection factory
     */
    public function __construct(\WalmartApiClient\Http\TransportServiceInterface $transport, \WalmartApiClient\Factory\EntityFactoryInterface $entityFactory, \WalmartApiClient\Factory\CollectionFactoryInterface $collectionFactory)
    {
        $this->transportService  = $transport;
        $this->entityFactory     = $entityFactory;
        $this->collectionFactory = $collectionFactory;
    }


    /**
     * Helper function to guard that the checked value is int
     * 
     * @param mixed $value Value to check
     * @throws \InvalidArgumentException
     */
    protected function guardInt($value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException();
        }
    }


    /**
     * Helper function to guard that the checked value is float
     * 
     * @param mixed $value Value to check
     * @throws \InvalidArgumentException
     */
    protected function guardFloat($value)
    {
        if (!is_float($value)) {
            throw new \InvalidArgumentException();
        }
    }


    /**
     * Helper function to guard that the checked value is a non-empty array of integers
     * 
     * @param mixed $array Value to check
     * @throws \InvalidArgumentException
     */
    protected function guardIntArray($array)
    {
        if (empty($array) || !is_array($array)) {
            throw new \InvalidArgumentException();
        }

        foreach ($array as $value) {
            if (!is_int($value)) {
                throw new \InvalidArgumentException();
            }
        }
    }


    /**
     * Helper function to guard that the checked value is a non-empty string
     * 
     * @param mixed $value Value to check
     * @throws \InvalidArgumentException
     */
    protected function guardString($value)
    {
        if (empty($value) || !is_string($value)) {
            throw new \InvalidArgumentException();
        }
    }


    /**
     * Base method for fetching a single entity from API 
     * 
     * @param string $uri API Service URI
     * @param array $constraints Request parameters
     * @return \WalmartApiClient\Entity\AbstractEntityInterface
     */
    protected function getEntity($uri, $constraints = [])
    {
        $response = $this->transportService->callApi($uri, $constraints);

        return $this->entityFactory->instance(static::ENTITY_CLASS, $response);
    }


    /**
     * Base method for fetching a collection of entities from API 
     * 
     * @param string $uri API Service URI
     * @param array $constraints Request parameters
     * @param string $collectionKey The key of items array in response
     * @param array $collectionParams Auxiliary collection parameters to be extracted from response
     * @return \WalmartApiClient\Entity\Collection\AbstractCollectionInterface
     */
    protected function getEntityCollection($uri, $constraints = [], $collectionKey = null, $collectionParams = [])
    {
        $response = $this->transportService->callApi($uri, $constraints);

        $result = [];

        $rowset = ($collectionKey !== null) ? isset($response[$collectionKey]) ? $response[$collectionKey] : [] : $response;

        foreach ($rowset as $entity) {
            $result[] = $this->entityFactory->instance(static::ENTITY_CLASS, $entity);
        }

        if ($collectionKey !== null) {
            foreach ($collectionParams as $key => $value) {
                $collectionParams[$key] = isset($response[$key]) ? $response[$key] : $value;
            }
        }

        return $this->collectionFactory->instance(static::COLLECTION_CLASS, $result, $collectionParams);
    }
}
