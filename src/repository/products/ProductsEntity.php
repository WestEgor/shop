<?php

namespace repository\products;

use model\Product;
use PDOStatement;
use repository\AbstractRepository;
use PDO;

/**
 * Class @ProductsEntity
 * Extends @AbstractRepository
 * Class for work with entity 'products'
 *
 * @package repository\products
 */
class ProductsEntity extends AbstractRepository
{

    /**
     * @return string
     */
    public function createQuery(): string
    {
        return 'INSERT INTO products(name,quantity,price,msrp) 
                VALUES(:name,:quantity,:price,:msrp)';
    }

    /**
     * @return string
     */
    public function readAllQuery(): string
    {
        return 'SELECT * FROM products';
    }

    /**
     * @return string
     */
    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM products WHERE id = :id';
    }

    /**
     * @return string
     */
    public function updateQuery(): string
    {
        return 'UPDATE products 
                SET name = :name, quantity = :quantity, price = :price, msrp = :msrp 
                WHERE id = :id';
    }

    /**
     * @return string
     */
    public function deleteQuery(): string
    {
        return 'DELETE FROM products WHERE id = :id';
    }


    /**
     * @param PDOStatement $statement
     * @return array|false
     */
    public function readAllStatement(PDOStatement $statement): array|false
    {
        $products = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $msrp = $row['msrp'];
            $product = Product::parameterizedConstructor($id, $name, $quantity, $price, $msrp);
            $products[] = $product;
        }
        return $products;
    }

    /**
     * @param PDOStatement $statement
     * @param int $key
     * @return Product|false
     */
    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $product = new Product();
        $obj = $statement->fetchObject();
        if (!$obj) return false;
        $product->setAll($obj);
        return $product;
    }

    /**
     * @param PDOStatement $statement
     * @param object $object
     * @return bool
     */
    public function createStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':name', $object->getName());
        $statement->bindValue(':quantity', $object->getQuantity());
        $statement->bindValue(':price', $object->getPrice());
        $statement->bindValue(':msrp', $object->getMsrp());
        return $statement->execute();
    }


    /**
     * @param PDOStatement $statement
     * @param object $object
     * @return bool
     */
    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':name', $object->getName());
        $statement->bindValue(':quantity', $object->getQuantity());
        $statement->bindValue(':price', $object->getPrice());
        $statement->bindValue(':msrp', $object->getMsrp());
        $statement->bindValue(':id', $object->getId());
        return $statement->execute();
    }
}