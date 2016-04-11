<?php

/**
 * Transport service interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       01/04/2016
 */
namespace WalmartApiClient\Http;

interface TransportServiceInterface
{

    /**
     * The main method for handling interactions with the Walmart API
     * @param string $uri The API resource URI
     * @param array $constraints The array of request parameters
     * @return array Response data
     * @throws \WalmartApiClient\Exception\ApiException
     */
    public function callApi($uri, array $constraints = []);
}
