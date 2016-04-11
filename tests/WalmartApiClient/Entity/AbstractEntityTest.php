<?php

/**
 * Abstract entity test
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @SuppressWarnings(PHPMD)
 */
class AbstractEntityTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers WalmartApiClient\Entity\AbstractEntity::__construct
     */
    public function testConstruct()
    {
        $entity = new \WalmartApiClient\Entity\Product(['itemId' => 1]);

        $this->assertTrue($entity instanceof \WalmartApiClient\Entity\AbstractEntityInterface);
    }


    /**
     * @test
     * @covers WalmartApiClient\Entity\AbstractEntity::toArray
     */
    public function testToArray()
    {
        $entity = new \WalmartApiClient\Entity\Product(['itemId' => 1]);
        $array  = $entity->toArray();

        $this->assertTrue($array['itemId'] === 1);
    }
}
