<?php

/**
 * Category entity DTO
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       08/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD)
 */
class Category extends AbstractEntity implements CategoryInterface
{

    /**
     * @var string Category id  
     */
    private $id;

    /**
     * @var string Category name  
     */
    private $name;

    /**
     * @var string Category breadcrumb trail
     */
    private $path;

    /**
     * @var array Child categories
     */
    private $children;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }


    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }


    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }


    /**
     * @param array $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }
}
