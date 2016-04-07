<?php

/**
 * Exception handler interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       02/04/2016
 */
namespace WalmartApiClient\Exception\Handler;

interface ExceptionHandlerInterface
{

    /**
     * Handle concrete exceptions method
     * 
     * @param \Exception    $exc      Exception to handle
     */
    public function handle(\Exception $exc);
}
