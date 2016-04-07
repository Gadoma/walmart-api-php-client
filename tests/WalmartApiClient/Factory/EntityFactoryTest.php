<?php

/**
 * Entity factory test
 *
 * @package     Walmart API PHP Client
 * @author      Gadoma <gadoma@users.noreply.github.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       05/04/2016
 */
namespace WalmartApiClient\Factory;

/**
 * @SuppressWarnings(PHPMD)
 */
class EntityFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @covers WalmartApiClient\Factory\EntityFactory::instance
     */
    public function testInstance()
    {
        $factory = new \WalmartApiClient\Factory\EntityFactory();

        $entity = $factory->instance('\\WalmartApiClient\\Entity\\Product', ['itemId' => 1]);

        $this->assertTrue($entity instanceof \WalmartApiClient\Entity\ProductInterface);
        $this->assertTrue($entity->getItemId() === 1);
    }
}
