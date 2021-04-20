<?php


namespace model;


interface ModelInterface
{
    /**
     * @param object $keys PDO::fetchObject returns stdClass
     * Methods used for parse from stdClass to objectClass
     * @return bool
     * return TRUE if object exists
     * return FALSE if object is null (false)
     */
    public function setAll(object $keys);

}