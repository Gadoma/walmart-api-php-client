<?php

/**
 * Review service test
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
class ReviewServiceTest extends ServiceBaseTest
{

    /**
     * @test
     * @covers WalmartApiClient\Service\ReviewService::getReviews
     */
    public function testGetReviews()
    {
        $mocks   = $this->getServiceMocksForCollection('Review', 'reviews/12345', [], ['reviews' => [['reviewer' => 'You'], ['reviewer' => 'Me']]], 'reviews', ['itemId' => null, 'name' => null, 'salePrice' => null, 'upc' => null, 'categoryPath' => null, 'brandName' => null, 'productTrackingUrl' => null, 'productUrl' => null, 'categoryNode' => null, 'reviewStatistics' => null, 'availableOnline' => null]);
        $service = $mocks['service'];


        $actual   = $service->getReviews(12345);
        $expected = $mocks['collection'];

        $this->assertTrue($actual === $expected);
    }
}
