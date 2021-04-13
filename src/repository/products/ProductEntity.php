<?php

namespace repository\products;


use InvalidArgumentException;
use model\Product;
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


    public function readAllStatement($stmt): array
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

    public function readByKeyStatement($stmt, $key): object
    {
        $product = new Product();
        if ($obj = $stmt->fetchObject()) {
            $product->setAll($obj);
            return $product;
        } else {
            throw new InvalidArgumentException('CANNOT FIND OBJECT WITH SELECTED ID' . "\n");
        }
    }

    public function createStatement($stmt, $obj): bool
    {
        $stmt->bindValue(':name', $obj->getName());
        $stmt->bindValue(':quantity', $obj->getQuantity());
        $stmt->bindValue(':price', $obj->getPrice());
        $stmt->bindValue(':msrp', $obj->getMsrp());
        return $stmt->execute();
    }


    public function updateStatement($stmt, $obj): bool
    {
        $stmt->bindValue(':name', $obj->getName());
        $stmt->bindValue(':quantity', $obj->getQuantity());
        $stmt->bindValue(':price', $obj->getPrice());
        $stmt->bindValue(':msrp', $obj->getMsrp());
        $stmt->bindValue(':id', $obj->getId());
        return $stmt->execute();
    }
}