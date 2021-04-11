<?php

namespace repository;


abstract class AbstractRepository implements RepositoryInterface
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public abstract function selectString(): string;

    public abstract function getReadAllStatement($stmt): array;

    public function readAll(): array
    {
        $stmt = $this->pdo->query($this->selectString());
        return $this->getReadAllStatement($stmt);
    }

    public function read(int $key): object
    {

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