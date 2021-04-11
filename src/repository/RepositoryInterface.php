<?php

namespace repository;

interface RepositoryInterface
{
    public function readAll(): array;

    public function read(int $key): object;

    public function create(object $obj): void;

    public function update(object $obj): void;

    public function delete(int $key): void;
}