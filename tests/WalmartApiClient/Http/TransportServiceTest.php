<?php

/**
 * Transport service test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       01/04/2016
 */
namespace WalmartApiClient\Http;

/**
 * @SuppressWarnings(PHPMD)
 */
class TransportServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::__construct
     */
    public function testProperCreateObject()
    {
        $guzzle  = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiKey  = 'walmartapikey';

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey);

        $this->assertTrue($client instanceof \WalmartApiClient\Http\TransportService);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::__construct
     * @covers \WalmartApiClient\Http\TransportService::guardNonEmpty
     * @expectedException \InvalidArgumentException
     */
    public function testCreateObjectUrlException()
    {
        $guzzle  = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl  = '';
        $apiKey  = 'walmartapikey';

        new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey, null, $apiUrl);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::__construct
     * @covers \WalmartApiClient\Http\TransportService::guardNonEmpty
     * @expectedException \InvalidArgumentException
     */
    public function testCreateObjectKeyException()
    {
        $guzzle  = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiKey  = '';

        new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     * @covers \WalmartApiClient\Http\TransportService::composeUrl
     */
    public function testCallApi()
    {
        $response = \Mockery::mock('\GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->once()->andReturn('{"super": "cool"}');

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?apiKey=walmartapikey&format=json', []])->andReturn($response);

        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiKey  = 'walmartapikey';

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey);

        $expected = ['super' => 'cool'];
        $actual   = $client->callApi('uri', []);

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     * @covers \WalmartApiClient\Http\TransportService::composeUrl
     */
    public function testCallApiWithLinkShare()
    {
        $response = \Mockery::mock('\GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->once()->andReturn('{"super": "cool"}');

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?apiKey=walmartapikey&format=json&lsPublisherId=lsid', []])->andReturn($response);

        $handler      = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiKey       = 'walmartapikey';
        $apiLinkShare = 'lsid';

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey, $apiLinkShare);

        $expected = ['super' => 'cool'];
        $actual   = $client->callApi('uri', []);

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     * @covers \WalmartApiClient\Http\TransportService::composeUrl
     */
    public function testCallApiWithConstraints()
    {
        $response = \Mockery::mock('\GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->once()->andReturn('{"super": "cool"}');

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?constraint=value&apiKey=walmartapikey&format=json', []])->andReturn($response);

        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiKey  = 'walmartapikey';

        $constraints = ['constraint' => 'value'];

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey);

        $expected = ['super' => 'cool'];
        $actual   = $client->callApi('uri', $constraints);

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     * @covers \WalmartApiClient\Http\TransportService::composeUrl
     * @expectedException \WalmartApiClient\Exception\ApiGatewayTimeoutException
     */
    public function testCallApiException()
    {
        $exception       = new \GuzzleHttp\Exception\ServerException('exception', new \GuzzleHttp\Psr7\Request('GET', 'someurl'), new \GuzzleHttp\Psr7\Response(504, [], ''));
        $thrownException = new \WalmartApiClient\Exception\ApiGatewayTimeoutException();

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?constraint=value&apiKey=walmartapikey&format=json', []])->andThrow($exception);

        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $handler->shouldReceive('handle')->once()->andThrow($thrownException);

        $apiKey = 'walmartapikey';

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiKey);
        $client->callApi('uri', []);
    }
}
