<?php

/**
 * Exception handler class
 *
 * @package     Walmart API PHP Client
 * @author      Gadoma <gadoma@users.noreply.github.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       02/04/2016
 */
namespace WalmartApiClient\Exception\Handler;

class ApiExceptionHandler implements ExceptionHandlerInterface
{

    /**
     * Handle client error exceptions
     * @param \GuzzleHttp\Exception\ClientException $e
     * @throws \WalmartApiClient\Exception\ApiForbiddenException
     * @throws \WalmartApiClient\Exception\ApiNotFoundException
     * @throws \WalmartApiClient\Exception\ApiRequestUriTooLongException
     * @throws \WalmartApiClient\Exception\ApiBadRequestException
     */
    protected function handleClientException(\GuzzleHttp\Exception\ClientException $e)
    {
        if ($e->hasResponse() && isset(json_decode($e->getResponse()->getBody(), true)['errors'])) {
            $exception = array_shift(json_decode($e->getResponse()->getBody(), true)['errors']);

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
     * @param \GuzzleHttp\Exception\ServerException $e
     * @throws \WalmartApiClient\Exception\ApiBadGatewayException
     * @throws \WalmartApiClient\Exception\ApiServiceUnavailableException
     * @throws \WalmartApiClient\Exception\ApiGatewayTimeoutException
     * @throws \WalmartApiClient\Exception\ApiInternalServerErrorException
     */
    protected function handleServerException(\GuzzleHttp\Exception\ServerException $e)
    {
        if ($e->hasResponse() && $e->getResponse()->getStatusCode() !== null) {
            $code = $e->getResponse()->getStatusCode();

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
    public function handle(\Exception $e)
    {
        if ($e instanceof \GuzzleHttp\Exception\ConnectException) {
            throw new \WalmartApiClient\Exception\ApiTransportErrorException($e->getMessage());
        }

        if ($e instanceof \GuzzleHttp\Exception\ClientException) {
            $this->handleClientException($e);
        }

        if ($e instanceof \GuzzleHttp\Exception\ServerException) {
            $this->handleServerException($e);
        }

        if ($e instanceof \GuzzleHttp\Exception\RequestException) {
            throw new \WalmartApiClient\Exception\ApiBadRequestException($e->getMessage(), 400);
        }

        throw new \WalmartApiClient\Exception\ApiException($e->getMessage());
    }
}
