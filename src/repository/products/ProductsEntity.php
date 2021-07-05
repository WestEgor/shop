<?php

namespace repository\products;

use model\Product;
use PDOStatement;
use repository\AbstractRepository;
use PDO;

/**
 * Class ProductsEntity
 * Extends AbstractRepository
 * Class for work with entity 'products'
 * @package repository\products
 */
class ProductsEntity extends AbstractRepository
{

    /**
     * Implementation of abstract method
     * @return string query of insert in 'products'
     */
    public function createQuery(): string
    {
        return 'INSERT INTO products(name,quantity,price,msrp) 
                VALUES(:name,:quantity,:price,:msrp)';
    }

    /**
     * Implementation of abstract method
     * @return string query of select all in 'products'
     */
    public function readAllQuery(): string
    {
        return 'SELECT * FROM products';
    }

    /**
     * Implementation of abstract method
     * @return string query of select all in 'products' with id
     */
    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM products WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     * @return string query of update in 'products'
     */
    public function updateQuery(): string
    {
        return 'UPDATE products 
                SET name = :name, quantity = :quantity, price = :price, msrp = :msrp 
                WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     * @return string query of delete in 'products' with id
     */
    public function deleteQuery(): string
    {
        return 'DELETE FROM products WHERE id = :id';
    }


    /**
     * Implementation of abstract method
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
            $product = new Product($name, $quantity, $price, $msrp, $id);
            $products[] = $product;
        }
        return $products;
    }

    /**
     * Implementation of abstract method
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
     * Implementation of abstract method
     * @param PDOStatement $statement
     * @param object $object
     * @return bool
     */
    public function createStatement(PDOStatement $statement, object $object): bool
    {
        if ($object instanceof Product) {
            $statement->bindValue(':name', $object->getName());
            $statement->bindValue(':quantity', $object->getQuantity());
            $statement->bindValue(':price', $object->getPrice());
            $statement->bindValue(':msrp', $object->getMsrp());
            return $statement->execute();
        }
        return false;
    }


    /**
     * Implementation of abstract method
     * @param PDOStatement $statement
     * @param object $object
     * @return bool
     */
    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        if ($object instanceof Product) {
            $statement->bindValue(':name', $object->getName());
            $statement->bindValue(':quantity', $object->getQuantity());
            $statement->bindValue(':price', $object->getPrice());
            $statement->bindValue(':msrp', $object->getMsrp());
            $statement->bindValue(':id', $object->getId());
            return $statement->execute();
        }
        return false;
    }
}