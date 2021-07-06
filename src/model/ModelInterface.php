<?php

namespace model;

/**
 * Interface ModelInterface
 * Must have interface for classes, that represents entities
 * Classes in @package model/support_classes NOT need to implement this interface
 *
 * @package model
 */
interface ModelInterface
{
    /**
     * @param  object $keys stdClass
     *                      Methods used for parse from stdClass to objectClass
     * @return bool
     * return TRUE if object exists
     * return FALSE if object is null (false)
     */
    public function setAll(object $keys): bool;
}
