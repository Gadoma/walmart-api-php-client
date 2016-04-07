<?php

/**
 * Abstract base entity interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       04/04/2016
 */
namespace WalmartApiClient\Entity;

interface AbstractEntityInterface
{

    /**
     * Return entity data as array
     * 
     * @return array Entity data
     */
    public function toArray();
}
