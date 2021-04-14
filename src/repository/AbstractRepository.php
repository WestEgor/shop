<?php

namespace repository;

use PDOStatement;

abstract class AbstractRepository implements RepositoryInterface
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public abstract function readAllQuery(): string;

    public abstract function readByKeyQuery(): string;

    public abstract function createQuery(): string;

    public abstract function updateQuery(): string;

    public abstract function deleteQuery(): string;


    public abstract function createStatement(PDOStatement $statement, object $object): bool;

    public abstract function readAllStatement(PDOStatement $statement): array|false;

    public abstract function readByKeyStatement(PDOStatement $statement, int $key): object|false;

    public abstract function updateStatement(PDOStatement $statement, object $obj): bool;


    public function readAll(): array|false
    {
        $statement = $this->pdo->query($this->readAllQuery());
        return $this->readAllStatement($statement);
    }

    public function read(int $key): object|false
    {
        $statement = $this->pdo->prepare($this->readByKeyQuery());
        $statement->bindValue(':id', $key);
        $statement->execute();
        return $this->readByKeyStatement($statement, $key);
    }


    public function create(object $object): bool
    {
        $statement = $this->pdo->prepare($this->createQuery());
        return $this->createStatement($statement, $object);
    }

    public function update(object $object): bool
    {
        $statement = $this->pdo->prepare($this->updateQuery());
        return $this->updateStatement($statement, $object);
    }

    public function delete(int $key): bool
    {
        $statement = $this->pdo->prepare($this->deleteQuery());
        $statement->bindValue(':id', $key);
        return $statement->execute();
    }
}