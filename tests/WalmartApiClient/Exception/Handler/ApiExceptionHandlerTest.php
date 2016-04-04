<?php

/**
 * API exception handler test
 *
 * @package     Walmart API PHP Client
 * @author      Gadoma <gadoma@users.noreply.github.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       02/04/2016
 */
namespace WalmartApiClient\Exception\Handler;

class ApiExceptionHandlerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiTransportErrorException
     */
    public function testConnectException()
    {
        $e = new \GuzzleHttp\Exception\ConnectException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiBadRequestException
     */
    public function testClientException()
    {
        $e = new \GuzzleHttp\Exception\ClientException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(400, [], ''));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiForbiddenException
     */
    public function testClientForbiddenException()
    {
        $e = new \GuzzleHttp\Exception\ClientException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(403, ['Content-type' => 'application/json'], '{"errors": [{"code": 403, "message": "Account Inactive"}]}'));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiNotFoundException
     */
    public function testClientNotFoundException()
    {
        $e = new \GuzzleHttp\Exception\ClientException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(404, ['Content-type' => 'application/json'], '{"errors": [{"code": 404, "message": "Wrong endpoint"}]}'));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiRequestUriTooLongException
     */
    public function testClientRequestUriTooLongException()
    {
        $e = new \GuzzleHttp\Exception\ClientException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(414, ['Content-type' => 'application/json'], '{"errors": [{"code": 414, "message": "Request URI too long"}]}'));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiBadRequestException
     */
    public function testClientDomainSpecificException()
    {
        $e = new \GuzzleHttp\Exception\ClientException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(400, ['Content-type' => 'application/json'], '{"errors": [{"code": 4002, "message": "Invalid itemId"}]}'));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiInternalServerErrorException
     */
    public function testServerInternalErrorException()
    {
        $e = new \GuzzleHttp\Exception\ServerException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(500, [], ''));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiBadGatewayException
     */
    public function testServerBadGatewayException()
    {
        $e = new \GuzzleHttp\Exception\ServerException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(502, [], ''));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiServiceUnavailableException
     */
    public function testServerServiceUnavailableException()
    {
        $e = new \GuzzleHttp\Exception\ServerException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(503, [], ''));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiGatewayTimeoutException
     */
    public function testServerGatewayTimeoutException()
    {
        $e = new \GuzzleHttp\Exception\ServerException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(504, [], ''));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiBadRequestException
     */
    public function testRequestException()
    {
        $e = new \GuzzleHttp\Exception\RequestException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'));

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }


    /**
     * @test
     * @covers WalmartApiClient\Exception\Handler\ApiExceptionHandler::handle
     * @expectedException \WalmartApiClient\Exception\ApiException
     */
    public function testDefaultException()
    {
        $e = new \Exception('exception');

        $handler = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();

        $handler->handle($e);
    }
}
