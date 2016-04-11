<?php

/**
 * Category collection test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       08/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

/**
 * @SuppressWarnings(PHPMD)
 */
class CategoryCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers WalmartApiClient\Entity\Collection\CategoryCollection::toArray
     * @covers WalmartApiClient\Entity\Collection\CategoryCollection::toArrayRecursive
     */
    public function testToArray()
    {
        $subcategory = new \WalmartApiClient\Entity\Category(['id' => '1_1', 'name' => 'subcategory', 'path' => 'subcategory']);
        $category    = new \WalmartApiClient\Entity\Category(['id' => '1', 'name' => 'category', 'path' => 'category', 'children' => [$subcategory]]);

        $collection = new CategoryCollection([$category]);
        $array      = $collection->toArray();

        $this->assertTrue($array[0]['id'] === '1');
        $this->assertTrue($array[0]['children'][0]['id'] === '1_1');
    }
}
