<?php

namespace repository;

/**
 * Interface @RepositoryInterface
 * Interfaces of CRUD methods
 *
 * @package repository
 */
interface RepositoryInterface
{
    /**
     * Methods uses to get array of object, which contains in table
     *
     * @return array|false
     * return ARRAY iff table contains minimum 1 record
     * return FALSE if no records in table
     */
    public function readAll(): array|false;

    /**
     * Methods uses to get object with selected id
     *
     * @param  int $key id of search record
     * @return object|false
     * return OBJECT iff table contains minimum 1 record that satisfy $key
     * return FALSE if no records in table
     */
    public function read(int $key): object|false;

    /**
     * Methods uses to create record in table
     *
     * @param  object $object object inserted into table
     * @return bool
     * return TRUE iff record was created
     * return FALSE if record was not created
     */
    public function create(object $object): bool;

    /**
     * Methods uses to update record in table
     *
     * @param  object $object object updated in table
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     */
    public function update(object $object): bool;

    /**
     * Methods uses to delete record from table with selected id
     *
     * @param  int $key id of deleted record
     * @return bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     */
    public function delete(int $key): bool;
}
