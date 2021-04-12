<?php

namespace repository\products;


use InvalidArgumentException;
use model\Product;
use repository\AbstractRepository;
use PDO;

class ProductEntity extends AbstractRepository
{

    public function readAllQuery(): string
    {
        return 'SELECT * FROM products';
    }

    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM products WHERE id = :id';
    }


    public function getReadAllStatement($stmt): array
    {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    public function getReadByKeyStatement($stmt, $key): object
    {
        $product = new Product();
        if ($obj = $stmt->fetchObject()) {
            $product->setAll($obj);
            return $product;
        } else {
            throw new InvalidArgumentException('CANNOT FIND OBJECT WITH SELECTED ID' . "\n");
        }
    }
}