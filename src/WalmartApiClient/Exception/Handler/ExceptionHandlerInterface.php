<?php

/**
 * Exception handler interface
 *
 * @package     Walmart API PHP Client
 * @author      Gadoma <gadoma@users.noreply.github.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       02/04/2016
 */
namespace WalmartApiClient\Exception\Handler;

interface ExceptionHandlerInterface
{

    /**
     * Handle concrete exceptions method
     * @param \Exception    $e      Exception to handle
     */
    public function handle(\Exception $e);
}
