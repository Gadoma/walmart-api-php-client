<?php

/**
 * Transport service
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       01/04/2016
 */
namespace WalmartApiClient\Http;

class TransportService implements TransportServiceInterface
{

    /**
     * @var string  Walmart API base url 
     */
    protected $apiBaseUrl;

    /**
     *
     * @var string  Walmart API user access token
     */
    protected $apiKey;

    /**
     *
     * @var string  Walmart API LinkShare publisher id
     */
    protected $apiLinkShareId;

    /**
     *
     * @var \WalmartApiClient\Exception\Handler\ExceptionHandlerInterface Walmart API exceptions handler
     */
    protected $apiExceptionHandler;

    /**
     *
     * @var \GuzzleHttp\ClientInterface Guzzle HTTP transport client
     */
    protected $httpService;

    /**
     * The constructor with injected HTTP client, exception handler and API access details
     * 
     * @param \GuzzleHttp\Client $transport HTTP http transport client
     * @param \WalmartApiClient\Exception\Handler\ExceptionHandlerInterface $handler Walmart API exceptions handler
     * @param string $apiKey Walmart API user access token
     * @param string $apiLinkShareId Walmart API LinkShare publisher id
     * @param string $apiBaseUrl Walmart API base url 
     */
    public function __construct(\GuzzleHttp\ClientInterface $transport, \WalmartApiClient\Exception\Handler\ExceptionHandlerInterface $handler, $apiKey, $apiLinkShareId = null, $apiBaseUrl = 'http://api.walmartlabs.com/v1/')
    {
        $this->guardNonEmpty($apiBaseUrl);
        $this->guardNonEmpty($apiKey);

        $this->apiBaseUrl          = $apiBaseUrl;
        $this->apiKey              = $apiKey;
        $this->apiLinkShareId      = $apiLinkShareId;
        $this->apiExceptionHandler = $handler;
        $this->httpService         = $transport;
    }


    /**
     * Helper function to prevent empty values of API base url and key
     * 
     * @param string $value Value to test if empty
     * @throws \InvalidArgumentException
     */
    protected function guardNonEmpty($value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("The API base url and key cannot be empty!");
        }
    }


    /**
     * Helper function for constructing the full API request URL
     * 
     * @param string $uri URI of the API resource
     * @param array $constraints Request parameters
     * @return string The full API call URL with parameters
     */
    protected function composeUrl($uri, array $constraints = [])
    {
        $constraints['apiKey'] = $this->apiKey;
        $constraints['format'] = 'json';

        if (!empty($this->apiLinkShareId)) {
            $constraints['lsPublisherId'] = $this->apiLinkShareId;
        }

        $queryString = empty($constraints) ? '' : '?' . http_build_query($constraints);
        $requestUrl  = $this->apiBaseUrl . $uri . $queryString;

        return $requestUrl;
    }


    /**
     * {@inheritdoc}
     */
    public function callApi($uri, array $constraints = [])
    {
        $url = $this->composeUrl($uri, $constraints);

        try {
            $response = $this->httpService->request('GET', $url, []);
            return json_decode($response->getBody(), true);
        } catch (\Exception $exc) {
            $this->apiExceptionHandler->handle($exc);
        }
    }
}
