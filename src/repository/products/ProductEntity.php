<?php

namespace repository\products;

use model\Product;
use PDOStatement;
use repository\AbstractRepository;
use PDO;

class ProductEntity extends AbstractRepository
{

    public function createQuery(): string
    {
        return 'INSERT INTO products(name,quantity,price,msrp) 
                VALUES(:name,:quantity,:price,:msrp)';
    }

    public function readAllQuery(): string
    {
        return 'SELECT * FROM products';
    }

    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM products WHERE id = :id';
    }

    public function updateQuery(): string
    {
        return 'UPDATE products 
                SET name = :name, quantity = :quantity, price = :price, msrp = :msrp 
                WHERE id = :id';
    }

    public function deleteQuery(): string
    {
        return 'DELETE FROM products WHERE id = :id';
    }


    public function readAllStatement(PDOStatement $statement): array|false
    {
        $products = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setQuantity($row['quantity']);
            $product->setPrice($row['price']);
            $product->setMsrp($row['msrp']);
            $products[] = $product;
        }
        return $products;
    }

    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $product = new Product();
        $obj = $statement->fetchObject();
        $product->setAll($obj);
        return $product;
    }

    public function createStatement(PDOStatement $statement, $object): bool
    {
        $statement->bindValue(':name', $object->getName());
        $statement->bindValue(':quantity', $object->getQuantity());
        $statement->bindValue(':price', $object->getPrice());
        $statement->bindValue(':msrp', $object->getMsrp());
        return $statement->execute();
    }


    public function updateStatement(PDOStatement $statement, $obj): bool
    {
        $statement->bindValue(':name', $obj->getName());
        $statement->bindValue(':quantity', $obj->getQuantity());
        $statement->bindValue(':price', $obj->getPrice());
        $statement->bindValue(':msrp', $obj->getMsrp());
        $statement->bindValue(':id', $obj->getId());
        return $statement->execute();
    }
}