<?php

namespace repository;

interface RepositoryInterface
{
    public function readAll(): array|false;

    public function read(int $key): object|false;

    public function create(object $object): bool;

    public function update(object $object): bool;

    public function delete(int $key): bool;
}