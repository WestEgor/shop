<?php

namespace repository;


use InvalidArgumentException;
use TypeError;

abstract class AbstractRepository implements RepositoryInterface
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public abstract function readAllQuery(): string;

    public abstract function readByKeyQuery(): string;

    public abstract function getReadAllStatement($stmt): array;

    public abstract function getReadByKeyStatement($stmt, $key): object;

    public function readAll(): array
    {
        $stmt = $this->pdo->query($this->readAllQuery());
        return $this->getReadAllStatement($stmt);
    }

    public function read(int $key): object
    {
        try {
            $stmt = $this->pdo->prepare($this->readByKeyQuery());
            $stmt->bindValue(':id', $key);
            $stmt->execute();
            $ss = $this->getReadByKeyStatement($stmt, $key);
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        }
        return $ss;
    }


    public function create(object $obj): void
    {

    }

    public function update(object $obj): void
    {

    }

    public function delete(int $key): void
    {

    }
}