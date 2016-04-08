<?php

/**
 * Category collection
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       08/04/2016
 */
namespace WalmartApiClient\Entity\Collection;

class CategoryCollection extends AbstractCollection
{

    /**
     * Recursive function to build a nested array of categories
     * 
     * @param array $array The category array
     * @param array $data The data array with (sub)category data
     * @return array (Sub)category array
     */
    protected function toArrayRecursive($array, $data)
    {
        foreach ($data as $category) {
            $item = $category->toArray();

            if (isset($item['children']) && !empty($item['children'])) {
                $children         = $this->toArrayRecursive([], $item['children']);
                $item['children'] = $children;
            }

            $array[] = $item;
        }

        return $array;
    }


    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->toArrayRecursive([], $this->elements);
    }
}
