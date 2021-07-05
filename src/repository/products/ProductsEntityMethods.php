<?php

namespace repository\products;

use config\Connector as Connection;
use model\Product;
use PDO;

/**
 * Class ProductsEntityMethods
 * Class which have static methods to manipulate ProductsEntities methods
 * @package repository\products
 */
class ProductsEntityMethods
{

    /**
     * Methods, that create record in 'products' entity in @param string $name Product name
     * @param int $quantity Product quantity
     * @param float $price Product price
     * @param float $msrp Product msrp
     * @return bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     * @package public
     */
    public static function createProduct(string $name, int $quantity, float $price, float $msrp): bool
    {
        $pdo = Connection::get()->getConnect();
        $product = new Product($name, $quantity, $price, $msrp);
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->create($product);
    }

    /**
     * Methods, that get all records of 'products' entity in @param PDO $pdo instance of PDO
     * @return array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     * @package public
     */
    public static function readAllProducts(PDO $pdo): array|false
    {
        $productsDB = new ProductsEntity($pdo);
        return $productsDB->readAll();
    }

    /**
     * Methods, that get record with specified key of 'products' entity in @param PDO $pdo instance of PDO
     * @param int $id Product id
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     * @package public
     */
    public static function readProductByKey(PDO $pdo, int $id): object|false
    {
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->read($id);
    }

    /**
     * Methods, that update record in 'product' entity in @param PDO $pdo instance of PDO
     * @param int $id Product id
     * @param string $name Product name
     * @param int $quantity Product quantity
     * @param float $price Product price
     * @param float $msrp Product msrp
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     * @package public
     */
    public static function updateProduct(PDO $pdo, int $id,
                                         string $name, int $quantity, float $price, float $msrp): bool
    {
        $product = new Product($name, $quantity, $price, $msrp, $id);
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->update($product);
    }

    /**
     * Methods, that delete record in 'product' entity in @param int $id Product id
     * @return bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     * @package public
     */
    public static function deleteProduct(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $deleteProd = new ProductsEntity($pdo);
        return $deleteProd->delete($id);
    }

}
