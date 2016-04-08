# Walmart Open API PHP client

[![GitHub license](https://img.shields.io/github/license/gadoma/walmart-api-php-client.svg)](https://github.com/Gadoma/walmart-api-php-client/blob/develop/LICENSE) [![Travis build status](https://img.shields.io/travis/Gadoma/walmart-api-php-client/master.svg)](https://travis-ci.org/Gadoma/walmart-api-php-client) [![Coveralls test coverage](https://img.shields.io/coveralls/gadoma/walmart-api-php-client/master.svg)](https://coveralls.io/github/Gadoma/walmart-api-php-client?branch=master) [![SensioLabsInsight grade](https://img.shields.io/sensiolabs/i/da616870-ae52-463f-9222-1d20482addbd.svg)](https://insight.sensiolabs.com/projects/da616870-ae52-463f-9222-1d20482addbd)


## Introduction

Welcome to the Walmart Open API PHP Client, a [Composer](https://getcomposer.org/) package for interacting with the [Walmart Open API](https://developer.walmartlabs.com/). 

This library is powered by [Guzzle 6](https://github.com/guzzle/guzzle) thus requires PHP >= 5.5.0 to work.

Extensive [PHPUnit](https://github.com/sebastianbergmann/phpunit) tests are provided, the builds are handled by [Travis-CI](https://travis-ci.org) and test code coverage is calculated by [Coveralls.io](https://coveralls.io).    

### Contributing

If you notice any bugs or have an idea for improvements, feel free to submit a ticket to the project [Issue Tracker](https://github.com/Gadoma/walmart-api-php-client/issues).

Pull requests are welcome, just remember to submit them to the _develop_ branch. Any PRs to the _master_ branch will be rejected.

## Installation

### Composer

If you don't have Composer already available on your local system, install it first:

```bash
curl -sS https://getcomposer.org/installer | php
```

### Manual installation

Create a _composer.json_ file and add an entry in the "require" section:

```javascript
{
    "require": {
        "gadoma/walmart-api-php-client": "^1.0"
    }
}
```

Run the below command afterwards:

```bash
php composer.phar install
```

### Composer installation

Alternatively to the above method you can just run the following:

```bash
php composer.phar require gadoma/walmart-api-php-client:^1.0
```

## Usage

### Walmart API key

In order to use the Walmart Open API you need to obtain an API key. You can get it by registering a [Walmart developer account](https://developer.walmartlabs.com/member/register).

### Basic usage

```php
// composer autoload
require 'vendor/autoload.php';

//API details
$apiUrl = 'http://api.walmartlabs.com/v1/';
$apiKey = 'yourWalmartApiKey';

//Basic components used by the Services
$httpClient        = new \GuzzleHttp\Client();
$errorHandler      = new \WalmartApiClient\Exception\Handler\ApiExceptionHandler();
$transportService  = new \WalmartApiClient\Http\TransportService($httpClient, $errorHandler, $apiUrl, $apiKey);
$entityFactory     = new \WalmartApiClient\Factory\EntityFactory();
$collectionFactory = new \WalmartApiClient\Factory\CollectionFactory();

//Actual Services you will use for interacting with the API
$productService  = new \WalmartApiClient\Service\ProductService($transportService, $entityFactory, $collectionFactory);
$offerService    = new \WalmartApiClient\Service\OfferService($transportService, $entityFactory, $collectionFactory);
$reviewService   = new \WalmartApiClient\Service\ReviewService($transportService, $entityFactory, $collectionFactory);
$taxonomyService = new \WalmartApiClient\Service\TaxonomyService($transportService, $entityFactory, $collectionFactory);

```

## Features

Each of the available Services is a wrapper for one or more Walmart Open API services. The available methods' declarations and descriptions can be found in the [Service interfaces](https://github.com/Gadoma/walmart-api-php-client/tree/develop/src/WalmartApiClient/Service). Each of the methods returns either a single specific Entity (e.g. Product) or a Collection of Entities (e.g. Categories Collection).

### Product service

#### Integrates with

- [Product Lookup API](https://developer.walmartlabs.com/docs/read/Home)
- [Search API](https://developer.walmartlabs.com/docs/read/Search_API)
- [Product Recommendation API](https://developer.walmartlabs.com/docs/read/Product_Recommendation_API)
- [Post Browsed Products API](https://developer.walmartlabs.com/docs/read/Post_Browsed_Products_API)
- [Trending API](https://developer.walmartlabs.com/docs/read/Trending_API)

#### Available methods

- getById
- getByUpc
- getByIds
- getBySearch
- getAllBySearch
- getPostbrowsedById
- getRecommendedById
- getTrending

### Offer service

#### Integrates with

- [Special Feeds API](https://developer.walmartlabs.com/docs/read/Special_Feeds)

#### Available methods

- getVod
- getPreorder
- getBestsellers
- getRollback
- getClearance
- getSpecialbuy

### Review service

#### Integrates with

- [Reviews API](https://developer.walmartlabs.com/docs/read/Reviews_Api)

#### Available methods

- getReviews

### Store service

#### Integrates with

- [Store Locator API](https://developer.walmartlabs.com/docs/read/Store_Locator_API)

#### Available methods

- getStoresByCoordinates
- getStoresByCity
- getStoresByZip

### Taxonomy service

#### Integrates with

- [Taxonomy API](https://developer.walmartlabs.com/docs/read/Taxonomy_API)

#### Available methods

- getCategories

