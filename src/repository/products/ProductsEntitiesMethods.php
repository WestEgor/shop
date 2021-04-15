<?php

namespace repository\products;

use model\Product;
use PDO;

/**
 * Class @ProductsEntitiesMethods
 * Class which have static methods to manipulate @ProductsEntities methods
 *
 * @package repository\products
 */
class ProductsEntitiesMethods
{

    /**
     * Method, that create @Product instance
     *
     * @param string $name @Product name
     * @param int $quantity @Product quantity
     * @param float $price @Product price
     * @param float $msrp @Product msrp
     * @return Product
     */
     private static function createProductInstance(string $name, int $quantity, float $price, float $msrp): Product
    {
        $product = new Product();
        $product->setName($name);
        $product->setQuantity($quantity);
        $product->setPrice($price);
        $product->setMsrp($msrp);
        return $product;
    }

    /**
     * Methods, that create record in 'product' entity in @package public
     *
     * @param PDO $pdo instance of @PDO
     * @param string $name @Product name
     * @param int $quantity @Product quantity
     * @param float $price @Product price
     * @param float $msrp @Product msrp
     * @return bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     */
    public static function createProduct(PDO $pdo, string $name, int $quantity, float $price, float $msrp): bool
    {
        $product = self::createProductInstance($name, $quantity, $price, $msrp);
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->create($product);
    }

    /**
     * Methods, that get all records of 'product' entity in @package public
     *
     * @param PDO $pdo instance of @PDO
     * @return array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     */
    public static function readAllProducts(PDO $pdo): array|false
    {
        $productsDB = new ProductsEntity($pdo);
        return $productsDB->readAll();
    }

    /**
     * Methods, that get record with specified key of 'product' entity in @package public
     *
     * @param PDO $pdo instance of @PDO
     * @param int $id @Product id
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     */
    public static function readProductByKey(PDO $pdo, int $id): object|false
    {
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->read($id);
    }

    /**
     * Methods, that update record in 'product' entity in @package public
     *
     * @param PDO $pdo instance of @PDO
     * @param int $id @Product id
     * @param string $name @Product name
     * @param int $quantity @Product quantity
     * @param float $price @Product price
     * @param float $msrp @Product msrp
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     */
    public static function updateProduct(PDO $pdo, int $id,
                                         string $name, int $quantity, float $price, float $msrp): bool
    {
        $product = self::createProductInstance($name, $quantity, $price, $msrp);
        $product->setId($id);
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->update($product);
    }

    /**
     * Methods, that delete record in 'product' entity in @package public
     *
     * @param PDO $pdo instance of @PDO
     * @param int $id @Product id
     * @return bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     */
    public static function deleteProduct(PDO $pdo, int $id): bool
    {
        $deleteProd = new ProductsEntity($pdo);
        return $deleteProd->delete($id);
    }

}
