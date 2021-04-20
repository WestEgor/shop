<?php

namespace repository\products;

use config\Connector as Connection;
use model\Product;
use PDO;

/**
 * Class @ProductsEntityMethods
 * Class which have static methods to manipulate @ProductsEntities methods
 *
 * @package repository\products
 */
class ProductsEntityMethods
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
     * Methods, that create record in 'product' entity in @param string $name @Product name
     * @param int $quantity @Product quantity
     * @param float $price @Product price
     * @param float $msrp @Product msrp
     * @return bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     * @package public
     */
    public static function createProduct(string $name, int $quantity, float $price, float $msrp): bool
    {
        $pdo = Connection::get()->getConnect();
        $product = self::createProductInstance($name, $quantity, $price, $msrp);
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->create($product);
    }

    /**
     * Methods, that get all records of 'product' entity in @param PDO $pdo instance of @PDO
     * @return array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     * @package public
     *
     */
    public static function readAllProducts(PDO $pdo): array|false
    {
        $productsDB = new ProductsEntity($pdo);
        return $productsDB->readAll();
    }

    /**
     * Methods, that get record with specified key of 'product' entity in @param PDO $pdo instance of @PDO
     * @param int $id @Product id
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     * @package public
     *
     */
    public static function readProductByKey(PDO $pdo, int $id): object|false
    {
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->read($id);
    }

    /**
     * Methods, that update record in 'product' entity in @param PDO $pdo instance of @PDO
     * @param int $id @Product id
     * @param string $name @Product name
     * @param int $quantity @Product quantity
     * @param float $price @Product price
     * @param float $msrp @Product msrp
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     * @package public
     */
    public static function updateProduct(PDO $pdo, int $id,
                                         string $name, int $quantity, float $price, float $msrp): bool
    {
        $product = Product::parameterizedConstructor($id, $name, $quantity, $price, $msrp);
        $productEntity = new ProductsEntity($pdo);
        return $productEntity->update($product);
    }

    /**
     * Methods, that delete record in 'product' entity in @package public
     * @param int $id @Product id
     * @return bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     */
    public static function deleteProduct( int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $deleteProd = new ProductsEntity($pdo);
        return $deleteProd->delete($id);
    }

}
