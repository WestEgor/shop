<?php

namespace repository\products;


use model\Product;
use repository\AbstractRepository;
use PDO;

class ProductEntity extends AbstractRepository
{

    public function selectString(): string
    {
        return 'SELECT * FROM products';
    }

    public function getReadAllStatement($stmt): array
    {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product();
            $product->setId($row['id']);
            $product->setProductName($row['name']);
            $product->setQuantity($row['quantity']);
            $product->setPrice($row['price']);
            $product->setMsrp($row['msrp']);
            $products[] = $product;
        }
        return $products;
    }
}