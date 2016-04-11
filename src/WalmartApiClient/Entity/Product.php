<?php

/**
 * Product entity DTO
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD)
 */
class Product extends AbstractEntity implements ProductInterface
{

    /**
     *
     * @var int Item id 
     */
    private $itemId;

    /**
     *
     * @var int Parent item id if item is variant 
     */
    private $parentItemId;

    /**
     *
     * @var string Product name
     */
    private $name;

    /**
     *
     * @var float Minimum suggester retail price 
     */
    private $msrp;

    /**
     *
     * @var float Standard sale price 
     */
    private $salePrice;

    /**
     *
     * @var string Unique product code 
     */
    private $upc;

    /**
     *
     * @var string Category breadcrumbs trail 
     */
    private $categoryPath;

    /**
     *
     * @var string Category id 
     */
    private $categoryNode;

    /**
     *
     * @var string Product short description 
     */
    private $shortDescription;

    /**
     *
     * @var string Product long description 
     */
    private $longDescription;

    /**
     *
     * @var string Product brand name 
     */
    private $brandName;

    /**
     *
     * @var string Small product image 
     */
    private $thumbnailImage;

    /**
     *
     * @var string Medium product image 
     */
    private $mediumImage;

    /**
     *
     * @var string Large product image
     */
    private $largeImage;

    /**
     *
     * @var string Full product url including LinkShare attribution  
     */
    private $productTrackingUrl;

    /**
     *
     * @var string Walmart product url
     */
    private $productUrl;

    /**
     *
     * @var string Walmart add to cart url 
     */
    private $addToCartUrl;

    /**
     *
     * @var string Full product add to cart url including LinkShare attribution   
     */
    private $affiliateAddToCartUrl;

    /**
     *
     * @var bool Is product eligible for 97cent shipping
     */
    private $ninetySevenCentShipping;

    /**
     *
     * @var float Standard shipping rate 
     */
    private $standardShipRate;

    /**
     *
     * @var float Expedited shipping rate 
     */
    private $twoThreeDayShippingRate;

    /**
     *
     * @var float Rush shipping rate
     */
    private $overnightShippingRate;

    /**
     *
     * @var string Product type
     */
    private $size;

    /**
     *
     * @var string Product color 
     */
    private $color;

    /**
     *
     * @var bool Whether this item is from one of the Walmart marketplace sellers 
     */
    private $marketplace;

    /**
     *
     * @var string Name of the marketplace seller, applicable only for marketplace items
     */
    private $sellerInfo;

    /**
     *
     * @var bool Whether the item can be shipped to the nearest Walmart store.
     */
    private $shipToStore;

    /**
     *
     * @var bool Whether the item qualifies for free shipping to the nearest Walmart store.
     */
    private $freeShipToStore;

    /**
     *
     * @var string Model number attribute for the item
     */
    private $modelNumber;

    /**
     *
     * @var bool Is the item a product bundle
     */
    private $bundle;

    /**
     *
     * @var bool Whether the item is currently available for sale on Walmart.com 
     */
    private $availableOnline;

    /**
     *
     * @var string Indicative quantity of the item available online. Possible values are [Available, Limited Supply, Last few items, Not available]. 
     */
    private $stock;

    /**
     *
     * @var bool Whether the item is price is a Rollback price on Walmart.com 
     */
    private $rollBack;

    /**
     *
     * @var bool Whether the item is a Special Buy item on Walmart.com
     */
    private $specialBuy;

    /**
     *
     * @var float Average customer rating out of 5
     */
    private $customerRating;

    /**
     *
     * @var string Customer rating image
     */
    private $customerRatingImage;

    /**
     *
     * @var int Number of customer reviews available on this item on Walmart.com 
     */
    private $numReviews;

    /**
     *
     * @var bool Whether the item is on clearance on Walmart.com 
     */
    private $clearance;

    /**
     *
     * @var bool Whether this item is available on pre-order on Walmart.com
     */
    private $preOrder;

    /**
     *
     * @var string Date the item will ship on if it is a pre-order item 
     */
    private $preOrderShipsOn;

    /**
     *
     * @var bool Whether this item is eligible for free shipping over 50$
     */
    private $freeShippingOver50Dollars;

    /**
     * @var array The giftwrap options array [allowGiftWrap, allowGiftMessage, allowGiftReceipt]
     */
    private $giftOptions;

    /**
     * @var array The array of Image entities
     */
    private $imageEntities;

    /**
     *
     * @var int Maximum number of items in a single order 
     */
    private $maxItemsInOrder;

    /**
     *
     * @var array The available item variants 
     */
    private $variants;

    /**
     * @var array Product attributes array
     */
    private $attributes;

    /**
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }


    /**
     * @param int $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }


    /**
     * @return int
     */
    public function getParentItemId()
    {
        return $this->parentItemId;
    }


    /**
     * @param int $parentItemId
     */
    public function setParentItemId($parentItemId)
    {
        $this->parentItemId = $parentItemId;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @return float
     */
    public function getMsrp()
    {
        return $this->msrp;
    }


    /**
     * @param float $msrp
     */
    public function setMsrp($msrp)
    {
        $this->msrp = $msrp;
    }


    /**
     * @return float
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }


    /**
     * @param float $salePrice
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
    }


    /**
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }


    /**
     * @param string $upc
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;
    }


    /**
     * @return string
     */
    public function getCategoryPath()
    {
        return $this->categoryPath;
    }


    /**
     * @param string $categoryPath
     */
    public function setCategoryPath($categoryPath)
    {
        $this->categoryPath = $categoryPath;
    }


    /**
     * @return string
     */
    public function getCategoryNode()
    {
        return $this->categoryNode;
    }


    /**
     * @param string $categoryNode
     */
    public function setCategoryNode($categoryNode)
    {
        $this->categoryNode = $categoryNode;
    }


    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }


    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }


    /**
     * @return string
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }


    /**
     * @param string $longDescription
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;
    }


    /**
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }


    /**
     * @param string $brandName
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
    }


    /**
     * @return string
     */
    public function getThumbnailImage()
    {
        return $this->thumbnailImage;
    }


    /**
     * @param string $thumbnailImage
     */
    public function setThumbnailImage($thumbnailImage)
    {
        $this->thumbnailImage = $thumbnailImage;
    }


    /**
     * @return string
     */
    public function getMediumImage()
    {
        return $this->mediumImage;
    }


    /**
     * @param string $mediumImage
     */
    public function setMediumImage($mediumImage)
    {
        $this->mediumImage = $mediumImage;
    }


    /**
     * @return string
     */
    public function getLargeImage()
    {
        return $this->largeImage;
    }


    /**
     * @param string $largeImage
     */
    public function setLargeImage($largeImage)
    {
        $this->largeImage = $largeImage;
    }


    /**
     * @return string
     */
    public function getProductTrackingUrl()
    {
        return $this->productTrackingUrl;
    }


    /**
     * @param string $productTrackingUrl
     */
    public function setProductTrackingUrl($productTrackingUrl)
    {
        $this->productTrackingUrl = $productTrackingUrl;
    }


    /**
     * @return string
     */
    public function getProductUrl()
    {
        return $this->productUrl;
    }


    /**
     * @param string $productUrl
     */
    public function setProductUrl($productUrl)
    {
        $this->productUrl = $productUrl;
    }


    /**
     * @return string
     */
    public function getAddToCartUrl()
    {
        return $this->addToCartUrl;
    }


    /**
     * @param string $addToCartUrl
     */
    public function setAddToCartUrl($addToCartUrl)
    {
        $this->addToCartUrl = $addToCartUrl;
    }


    /**
     * @return string
     */
    public function getAffiliateAddToCartUrl()
    {
        return $this->affiliateAddToCartUrl;
    }


    /**
     * @param string $affiliateAddToCartUrl
     */
    public function setAffiliateAddToCartUrl($affiliateAddToCartUrl)
    {
        $this->affiliateAddToCartUrl = $affiliateAddToCartUrl;
    }


    /**
     * @return bool
     */
    public function isNinetySevenCentShipping()
    {
        return $this->ninetySevenCentShipping;
    }


    /**
     * @param bool $ninetySevenCentShipping
     */
    public function setNinetySevenCentShipping($ninetySevenCentShipping)
    {
        $this->ninetySevenCentShipping = $ninetySevenCentShipping;
    }


    /**
     * @return float
     */
    public function getStandardShipRate()
    {
        return $this->standardShipRate;
    }


    /**
     * @param float $standardShipRate
     */
    public function setStandardShipRate($standardShipRate)
    {
        $this->standardShipRate = $standardShipRate;
    }


    /**
     * @return float
     */
    public function getTwoThreeDayShippingRate()
    {
        return $this->twoThreeDayShippingRate;
    }


    /**
     * @param float $twoThreeDayShippingRate
     */
    public function setTwoThreeDayShippingRate($twoThreeDayShippingRate)
    {
        $this->twoThreeDayShippingRate = $twoThreeDayShippingRate;
    }


    /**
     * @return float
     */
    public function getOvernightShippingRate()
    {
        return $this->overnightShippingRate;
    }


    /**
     * @param float $overnightShippingRate
     */
    public function setOvernightShippingRate($overnightShippingRate)
    {
        $this->overnightShippingRate = $overnightShippingRate;
    }


    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }


    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }


    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }


    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }


    /**
     * @return bool
     */
    public function isMarketplace()
    {
        return $this->marketplace;
    }


    /**
     * @param bool $marketplace
     */
    public function setMarketplace($marketplace)
    {
        $this->marketplace = $marketplace;
    }


    /**
     * @return string
     */
    public function getSellerInfo()
    {
        return $this->sellerInfo;
    }


    /**
     * @param string $sellerInfo
     */
    public function setSellerInfo($sellerInfo)
    {
        $this->sellerInfo = $sellerInfo;
    }


    /**
     * @return bool
     */
    public function isShipToStore()
    {
        return $this->shipToStore;
    }


    /**
     * @param bool $shipToStore
     */
    public function setShipToStore($shipToStore)
    {
        $this->shipToStore = $shipToStore;
    }


    /**
     * @return bool
     */
    public function isFreeShipToStore()
    {
        return $this->freeShipToStore;
    }


    /**
     * @param bool $freeShipToStore
     */
    public function setFreeShipToStore($freeShipToStore)
    {
        $this->freeShipToStore = $freeShipToStore;
    }


    /**
     * @return string
     */
    public function getModelNumber()
    {
        return $this->modelNumber;
    }


    /**
     * @param string $modelNumber
     */
    public function setModelNumber($modelNumber)
    {
        $this->modelNumber = $modelNumber;
    }


    /**
     * @return bool
     */
    public function isBundle()
    {
        return $this->bundle;
    }


    /**
     * @param bool $bundle
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;
    }


    /**
     * @return bool
     */
    public function isAvailableOnline()
    {
        return $this->availableOnline;
    }


    /**
     * @param bool $availableOnline
     */
    public function setAvailableOnline($availableOnline)
    {
        $this->availableOnline = $availableOnline;
    }


    /**
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
    }


    /**
     * @param string $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    /**
     * @return bool
     */
    public function isRollBack()
    {
        return $this->rollBack;
    }


    /**
     * @param bool $rollBack
     */
    public function setRollBack($rollBack)
    {
        $this->rollBack = $rollBack;
    }


    /**
     * @return bool
     */
    public function isSpecialBuy()
    {
        return $this->specialBuy;
    }


    /**
     * @param bool $specialBuy
     */
    public function setSpecialBuy($specialBuy)
    {
        $this->specialBuy = $specialBuy;
    }


    /**
     * @return float
     */
    public function getCustomerRating()
    {
        return $this->customerRating;
    }


    /**
     * @param float $customerRating
     */
    public function setCustomerRating($customerRating)
    {
        $this->customerRating = $customerRating;
    }


    /**
     * @return string
     */
    public function getCustomerRatingImage()
    {
        return $this->customerRatingImage;
    }


    /**
     * @param string $customerRatingImage
     */
    public function setCustomerRatingImage($customerRatingImage)
    {
        $this->customerRatingImage = $customerRatingImage;
    }


    /**
     * @return int
     */
    public function getNumReviews()
    {
        return $this->numReviews;
    }


    /**
     * @param int $numReviews
     */
    public function setNumReviews($numReviews)
    {
        $this->numReviews = $numReviews;
    }


    /**
     * @return bool
     */
    public function isClearance()
    {
        return $this->clearance;
    }


    /**
     * @param bool $clearance
     */
    public function setClearance($clearance)
    {
        $this->clearance = $clearance;
    }


    /**
     * @return bool
     */
    public function isPreOrder()
    {
        return $this->preOrder;
    }


    /**
     * @param bool $preOrder
     */
    public function setPreOrder($preOrder)
    {
        $this->preOrder = $preOrder;
    }


    /**
     * @return string
     */
    public function getPreOrderShipsOn()
    {
        return $this->preOrderShipsOn;
    }


    /**
     * @param string $preOrderShipsOn
     */
    public function setPreOrderShipsOn($preOrderShipsOn)
    {
        $this->preOrderShipsOn = $preOrderShipsOn;
    }


    /**
     * @return bool
     */
    public function isFreeShippingOver50Dollars()
    {
        return $this->freeShippingOver50Dollars;
    }


    /**
     * @param bool $freeShippingOver50Dollars
     */
    public function setFreeShippingOver50Dollars($freeShippingOver50Dollars)
    {
        $this->freeShippingOver50Dollars = $freeShippingOver50Dollars;
    }


    /**
     * @return array
     */
    public function getGiftOptions()
    {
        return $this->giftOptions;
    }


    /**
     * @param array $giftOptions
     */
    public function setGiftOptions($giftOptions)
    {
        $this->giftOptions = $giftOptions;
    }


    /**
     * @return array
     */
    public function getImageEntities()
    {
        return $this->imageEntities;
    }


    /**
     * @param array $imageEntities
     */
    public function setImageEntities($imageEntities)
    {
        $this->imageEntities = $imageEntities;
    }


    /**
     * 
     * @return int
     */
    public function getMaxItemsInOrder()
    {
        return $this->maxItemsInOrder;
    }


    /**
     * 
     * @param int $maxItemsInOrder
     */
    public function setMaxItemsInOrder($maxItemsInOrder)
    {
        $this->maxItemsInOrder = $maxItemsInOrder;
    }


    /**
     * 
     * @return array
     */
    public function getVariants()
    {
        return $this->variants;
    }


    /**
     * 
     * @param array $variants
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
    }


    /**
     * 
     * @return array 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }


    /**
     * 
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
}
