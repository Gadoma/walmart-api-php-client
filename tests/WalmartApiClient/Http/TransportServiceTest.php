<?php

/**
 * Transport service test
 *
 * @package     Walmart API PHP Client
 * @author      Gadoma <gadoma@users.noreply.github.com>
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
        $apiUrl  = 'http://api.walmartlabs.com/v1/';
        $apiKey  = 'walmartapikey';

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiUrl, $apiKey);

        $this->assertTrue($client instanceof \WalmartApiClient\Http\TransportService);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testCreateObjectUrlException()
    {
        $guzzle  = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl  = '';
        $apiKey  = 'walmartapikey';

        new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiUrl, $apiKey);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testCreateObjectKeyException()
    {
        $guzzle  = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl  = 'http://api.walmartlabs.com/v1/';
        $apiKey  = '';

        new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiUrl, $apiKey);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     */
    public function testCallApi()
    {
        $response = \Mockery::mock('\GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->once()->andReturn('{"super": "cool"}');

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?apiKey=walmartapikey&format=json', []])->andReturn($response);

        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl  = 'http://api.walmartlabs.com/v1/';
        $apiKey  = 'walmartapikey';

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiUrl, $apiKey);

        $expected = ['super' => 'cool'];
        $actual   = $client->callApi('uri', []);

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     */
    public function testCallApiWithLinkShare()
    {
        $response = \Mockery::mock('\GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->once()->andReturn('{"super": "cool"}');

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?apiKey=walmartapikey&format=json&lsPublisherId=lsid', []])->andReturn($response);

        $handler      = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl       = 'http://api.walmartlabs.com/v1/';
        $apiKey       = 'walmartapikey';
        $apiLinkShare = 'lsid';

        $constraints = ['includeLinkShare' => true];

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiUrl, $apiKey, $apiLinkShare);

        $expected = ['super' => 'cool'];
        $actual   = $client->callApi('uri', $constraints);

        $this->assertTrue($actual === $expected);
    }


    /**
     * @test
     * @covers \WalmartApiClient\Http\TransportService::callApi
     */
    public function testCallApiWithConstraints()
    {
        $response = \Mockery::mock('\GuzzleHttp\Psr7\Response');
        $response->shouldReceive('getBody')->once()->andReturn('{"super": "cool"}');

        $guzzle = \Mockery::mock('\GuzzleHttp\ClientInterface');
        $guzzle->shouldReceive('request')->once()->withArgs(['GET', 'http://api.walmartlabs.com/v1/uri?constraint=value&apiKey=walmartapikey&format=json', []])->andReturn($response);

        $handler = \Mockery::mock('\WalmartApiClient\Exception\Handler\ExceptionHandlerInterface');
        $apiUrl  = 'http://api.walmartlabs.com/v1/';
        $apiKey  = 'walmartapikey';

        $constraints = ['constraint' => 'value'];

        $client = new \WalmartApiClient\Http\TransportService($guzzle, $handler, $apiUrl, $apiKey);

        $expected = ['super' => 'cool'];
        $actual   = $client->callApi('uri', $constraints);

        $this->assertTrue($actual === $expected);
    }
}
