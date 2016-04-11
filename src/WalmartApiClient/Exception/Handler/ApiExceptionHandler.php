<?php

/**
 * Exception handler class
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       02/04/2016
 */
namespace WalmartApiClient\Exception\Handler;

class ApiExceptionHandler implements ExceptionHandlerInterface
{

    /**
     * Handle client error exceptions
     * 
     * @param \GuzzleHttp\Exception\ClientException $exc
     * @throws \WalmartApiClient\Exception\ApiForbiddenException
     * @throws \WalmartApiClient\Exception\ApiNotFoundException
     * @throws \WalmartApiClient\Exception\ApiRequestUriTooLongException
     * @throws \WalmartApiClient\Exception\ApiBadRequestException
     */
    protected function handleClientException(\GuzzleHttp\Exception\ClientException $exc)
    {
        if ($exc->hasResponse() && isset(json_decode($exc->getResponse()->getBody(), true)['errors'])) {
            $exception = array_shift(json_decode($exc->getResponse()->getBody(), true)['errors']);

            switch ($exception['code']) {
                case 403 : throw new \WalmartApiClient\Exception\ApiForbiddenException($exception['message'], $exception['code']);
                case 404 : throw new \WalmartApiClient\Exception\ApiNotFoundException($exception['message'], $exception['code']);
                case 414 : throw new \WalmartApiClient\Exception\ApiRequestUriTooLongException($exception['message'], $exception['code']);
                default : throw new \WalmartApiClient\Exception\ApiBadRequestException($exception['message'], $exception['code']);
            }
        }

        throw new \WalmartApiClient\Exception\ApiBadRequestException('Bad Request', 400);
    }


    /**
     * Handle server error exceptions
     * 
     * @param \GuzzleHttp\Exception\ServerException $exc
     * @throws \WalmartApiClient\Exception\ApiBadGatewayException
     * @throws \WalmartApiClient\Exception\ApiServiceUnavailableException
     * @throws \WalmartApiClient\Exception\ApiGatewayTimeoutException
     * @throws \WalmartApiClient\Exception\ApiInternalServerErrorException
     */
    protected function handleServerException(\GuzzleHttp\Exception\ServerException $exc)
    {
        if ($exc->hasResponse() && $exc->getResponse()->getStatusCode() !== null) {
            $code = $exc->getResponse()->getStatusCode();

            switch ($code) {
                case 502 : throw new \WalmartApiClient\Exception\ApiBadGatewayException('Bad gateway', $code);
                case 503 : throw new \WalmartApiClient\Exception\ApiServiceUnavailableException('Service unavailable', $code);
                case 504 : throw new \WalmartApiClient\Exception\ApiGatewayTimeoutException('Gateway timeout', $code);
            }
        }

        throw new \WalmartApiClient\Exception\ApiInternalServerErrorException('Internal server error', 500);
    }


    /**
     * {@inheritDoc}
     */
    public function handle(\Exception $exc)
    {
        if ($exc instanceof \GuzzleHttp\Exception\ConnectException) {
            throw new \WalmartApiClient\Exception\ApiTransportErrorException($exc->getMessage());
        }

        if ($exc instanceof \GuzzleHttp\Exception\ClientException) {
            $this->handleClientException($exc);
        }

        if ($exc instanceof \GuzzleHttp\Exception\ServerException) {
            $this->handleServerException($exc);
        }

        if ($exc instanceof \GuzzleHttp\Exception\RequestException) {
            throw new \WalmartApiClient\Exception\ApiBadRequestException($exc->getMessage(), 400);
        }

        throw new \WalmartApiClient\Exception\ApiException($exc->getMessage());
    }
}
