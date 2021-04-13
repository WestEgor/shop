<?php

namespace repository;


use InvalidArgumentException;

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


    public abstract function createStatement($stmt, $obj): bool;

    public abstract function readAllStatement($stmt): array;

    public abstract function readByKeyStatement($stmt, $key): object;

    public abstract function updateStatement($stmt, $obj): bool;


    public function readAll(): array
    {
        $stmt = $this->pdo->query($this->readAllQuery());
        return $this->readAllStatement($stmt);
    }

    public function read(int $key): object
    {
        try {
            $stmt = $this->pdo->prepare($this->readByKeyQuery());
            $stmt->bindValue(':id', $key);
            $stmt->execute();
            $obj = $this->readByKeyStatement($stmt, $key);
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        }
        return $obj;
    }


    public function create(object $obj): bool
    {
        $stmt = $this->pdo->prepare($this->createQuery());
        return $this->createStatement($stmt, $obj);
    }

    public function update(object $obj): bool
    {
        $stmt = $this->pdo->prepare($this->updateQuery());
        return $this->updateStatement($stmt, $obj);
    }

    public function delete(int $key): void
    {
        $stmt = $this->pdo->prepare($this->deleteQuery());
        $stmt->bindValue(':id', $key);
        $stmt->execute();
    }
}