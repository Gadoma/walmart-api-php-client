<?php

/**
 * Product entity interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @SuppressWarnings(PHPMD)
 */
interface ProductInterface
{

    /**
     * @return int
     */
    public function getItemId();

    /**
     * @param int $itemId
     */
    public function setItemId($itemId);

    /**
     * @return int
     */
    public function getParentItemId();

    /**
     * @param int $parentItemId
     */
    public function setParentItemId($parentItemId);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return float
     */
    public function getMsrp();

    /**
     * @param float $msrp
     */
    public function setMsrp($msrp);

    /**
     * @return float
     */
    public function getSalePrice();

    /**
     * @param float $salePrice
     */
    public function setSalePrice($salePrice);

    /**
     * @return string
     */
    public function getUpc();

    /**
     * @param string $upc
     */
    public function setUpc($upc);

    /**
     * @return string
     */
    public function getCategoryPath();

    /**
     * @param string $categoryPath
     */
    public function setCategoryPath($categoryPath);

    /**
     * @return string
     */
    public function getCategoryNode();

    /**
     * @param string $categoryNode
     */
    public function setCategoryNode($categoryNode);

    /**
     * @return string
     */
    public function getShortDescription();

    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription);

    /**
     * @return string
     */
    public function getLongDescription();

    /**
     * @param string $longDescription
     */
    public function setLongDescription($longDescription);

    /**
     * @return string
     */
    public function getBrandName();

    /**
     * @param string $brandName
     */
    public function setBrandName($brandName);

    /**
     * @return string
     */
    public function getThumbnailImage();

    /**
     * @param string $thumbnailImage
     */
    public function setThumbnailImage($thumbnailImage);

    /**
     * @return string
     */
    public function getMediumImage();

    /**
     * @param string $mediumImage
     */
    public function setMediumImage($mediumImage);

    /**
     * @return string
     */
    public function getLargeImage();

    /**
     * @param string $largeImage
     */
    public function setLargeImage($largeImage);

    /**
     * @return string
     */
    public function getProductTrackingUrl();

    /**
     * @param string $productTrackingUrl
     */
    public function setProductTrackingUrl($productTrackingUrl);

    /**
     * @return string
     */
    public function getProductUrl();

    /**
     * @param string $productUrl
     */
    public function setProductUrl($productUrl);

    /**
     * @return string
     */
    public function getAddToCartUrl();

    /**
     * @param string $addToCartUrl
     */
    public function setAddToCartUrl($addToCartUrl);

    /**
     * @return string
     */
    public function getAffiliateAddToCartUrl();

    /**
     * @param string $affiliateAddToCartUrl
     */
    public function setAffiliateAddToCartUrl($affiliateAddToCartUrl);

    /**
     * @return bool
     */
    public function isNinetySevenCentShipping();

    /**
     * @param bool $ninetySevenCentShipping
     */
    public function setNinetySevenCentShipping($ninetySevenCentShipping);

    /**
     * @return float
     */
    public function getStandardShipRate();

    /**
     * @param float $standardShipRate
     */
    public function setStandardShipRate($standardShipRate);

    /**
     * @return float
     */
    public function getTwoThreeDayShippingRate();

    /**
     * @param float $twoThreeDayShippingRate
     */
    public function setTwoThreeDayShippingRate($twoThreeDayShippingRate);

    /**
     * @return float
     */
    public function getOvernightShippingRate();

    /**
     * @param float $overnightShippingRate
     */
    public function setOvernightShippingRate($overnightShippingRate);

    /**
     * @return string
     */
    public function getSize();

    /**
     * @param string $size
     */
    public function setSize($size);

    /**
     * @return string
     */
    public function getColor();

    /**
     * @param string $color
     */
    public function setColor($color);

    /**
     * @return bool
     */
    public function isMarketplace();

    /**
     * @param bool $marketplace
     */
    public function setMarketplace($marketplace);

    /**
     * @return string
     */
    public function getSellerInfo();

    /**
     * @param string $sellerInfo
     */
    public function setSellerInfo($sellerInfo);

    /**
     * @return bool
     */
    public function isShipToStore();

    /**
     * @param bool $shipToStore
     */
    public function setShipToStore($shipToStore);

    /**
     * @return bool
     */
    public function isFreeShipToStore();

    /**
     * @param bool $freeShipToStore
     */
    public function setFreeShipToStore($freeShipToStore);

    /**
     * @return string
     */
    public function getModelNumber();

    /**
     * @param string $modelNumber
     */
    public function setModelNumber($modelNumber);

    /**
     * @return bool
     */
    public function isBundle();

    /**
     * @param bool $bundle
     */
    public function setBundle($bundle);

    /**
     * @return bool
     */
    public function isAvailableOnline();

    /**
     * @param bool $availableOnline
     */
    public function setAvailableOnline($availableOnline);

    /**
     * @return string
     */
    public function getStock();

    /**
     * @param string $stock
     */
    public function setStock($stock);

    /**
     * @return bool
     */
    public function isRollBack();

    /**
     * @param bool $rollBack
     */
    public function setRollBack($rollBack);

    /**
     * @return bool
     */
    public function isSpecialBuy();

    /**
     * @param bool $specialBuy
     */
    public function setSpecialBuy($specialBuy);

    /**
     * @return float
     */
    public function getCustomerRating();

    /**
     * @param float $customerRating
     */
    public function setCustomerRating($customerRating);

    /**
     * @return string
     */
    public function getCustomerRatingImage();

    /**
     * @param string $customerRatingImage
     */
    public function setCustomerRatingImage($customerRatingImage);

    /**
     * @return int
     */
    public function getNumReviews();

    /**
     * @param int $numReviews
     */
    public function setNumReviews($numReviews);

    /**
     * @return bool
     */
    public function isClearance();

    /**
     * @param bool $clearance
     */
    public function setClearance($clearance);

    /**
     * @return bool
     */
    public function isPreOrder();

    /**
     * @param bool $preOrder
     */
    public function setPreOrder($preOrder);

    /**
     * @return string
     */
    public function getPreOrderShipsOn();

    /**
     * @param string $preOrderShipsOn
     */
    public function setPreOrderShipsOn($preOrderShipsOn);

    /**
     * @return bool
     */
    public function isFreeShippingOver50Dollars();

    /**
     * @param bool $freeShippingOver50Dollars
     */
    public function setFreeShippingOver50Dollars($freeShippingOver50Dollars);

    /**
     * @return array
     */
    public function getGiftOptions();

    /**
     * @param array $giftOptions
     */
    public function setGiftOptions($giftOptions);

    /**
     * @return array
     */
    public function getImageEntities();

    /**
     * @param array $imageEntities
     */
    public function setImageEntities($imageEntities);

    /**
     *
     * @return int
     */
    public function getMaxItemsInOrder();

    /**
     *
     * @param int $maxItemsInOrder
     */
    public function setMaxItemsInOrder($maxItemsInOrder);

    /**
     *
     * @return array
     */
    public function getVariants();

    /**
     *
     * @param array $variants
     */
    public function setVariants($variants);

    /**
     *
     * @return array
     */
    public function getAttributes();

    /**
     *
     * @param array $attributes
     */
    public function setAttributes($attributes);
}
