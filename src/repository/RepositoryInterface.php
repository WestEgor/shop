<?php

namespace repository;

interface RepositoryInterface
{
    public function readAll(): array;

    public function read(int $key): object;

    public function create(object $obj): bool;

    public function update(object $obj): bool;

    public function delete(int $key): void;
}