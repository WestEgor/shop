<?php

namespace repository;

use PDO;
use PDOStatement;

/**
 * Class AbstractRepository
 * Implements RepositoryInterface
 * @package repository
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * PDO instance
     * @var PDO
     */
    private PDO $pdo;

    /**
     * AbstractRepository constructor.
     * @param PDO $pdo instance of PDO
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Abstract method
     * @return string query of selecting all
     */
    public abstract function readAllQuery(): string;

    /**
     * Abstract method
     * @return string query of selecting with specified id
     */
    public abstract function readByKeyQuery(): string;

    /**
     * Abstract method
     * @return string query of inserting in table a record
     */
    public abstract function createQuery(): string;

    /**
     * Abstract method
     * @return string query of updating a record in table
     */
    public abstract function updateQuery(): string;

    /**
     * Abstract method
     * @return string query of deleting a record in table
     */
    public abstract function deleteQuery(): string;


    /**
     * Abstract method
     * Work with statement to create record in table
     * @param PDOStatement $statement statement of prepared query
     * @param object $object object of entity
     * @return bool
     * return TRUE iff record was created in table
     * return FALSE if record was not created in table
     */
    public abstract function createStatement(PDOStatement $statement, object $object): bool;

    /**
     * Abstract method
     * Work with statement to get all records from table
     *
     * @param PDOStatement $statement statement of query
     * @return array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     */
    public abstract function readAllStatement(PDOStatement $statement): array|false;

    /**
     * Abstract method
     * Work with statement to get record from specified ID table with
     *
     * @param PDOStatement $statement statement of prepared query
     * @param int $key id that searching
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     */
    public abstract function readByKeyStatement(PDOStatement $statement, int $key): object|false;

    /**
     * @param PDOStatement $statement statement of prepared query
     * @param object $object object of entity
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     */
    public abstract function updateStatement(PDOStatement $statement, object $object): bool;


    /**
     * Implementing RepositoryInterface
     *
     * @return array|false
     */
    public function readAll(): array|false
    {
        $statement = $this->pdo->query($this->readAllQuery());
        if (!$statement) return false;
        return $this->readAllStatement($statement);
    }

    /**
     * Implementing RepositoryInterface
     * @param int $key
     * @return object|false
     */
    public function read(int $key): object|false
    {
        $statement = $this->pdo->prepare($this->readByKeyQuery());
        $statement->bindValue(':id', $key);
        $statement->execute();
        return $this->readByKeyStatement($statement, $key);
    }


    /**
     * Implementing RepositoryInterface
     * @param object $object
     * @return bool
     */
    public function create(object $object): bool
    {
        $statement = $this->pdo->prepare($this->createQuery());
        return $this->createStatement($statement, $object);
    }

    /**
     * Implementing RepositoryInterface Method
     * @param object $object
     * @return bool
     */
    public function update(object $object): bool
    {
        $statement = $this->pdo->prepare($this->updateQuery());
        return $this->updateStatement($statement, $object);
    }

    /**
     * Implementing RepositoryInterface Method
     * @param int $key
     * @return bool
     */
    public function delete(int $key): bool
    {
        $statement = $this->pdo->prepare($this->deleteQuery());
        $statement->bindValue(':id', $key);
        return $statement->execute();
    }
}