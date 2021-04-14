<?php

namespace repository\products;

use model\Product;
use PDO;

class ProductsMethods
{

    static private function getProduct(string $name, int $quantity, float $price, float $msrp): Product
    {
        $product = new Product();
        $product->setName($name);
        $product->setQuantity($quantity);
        $product->setPrice($price);
        $product->setMsrp($msrp);
        return $product;
    }

    static public function createProduct(PDO $pdo, string $name, int $quantity, float $price, float $msrp): bool
    {
        $product = self::getProduct($name, $quantity, $price, $msrp);
        $productEntity = new ProductEntity($pdo);
        return $productEntity->create($product);
    }

    static public function updateProduct(PDO $pdo, int $id, string $name, int $quantity, float $price, float $msrp): bool
    {
        $product = self::getProduct($name, $quantity, $price, $msrp);
        $product->setId($id);
        $productEntity = new ProductEntity($pdo);
        return $productEntity->update($product);
    }

    public static function deleteProduct(PDO $pdo, int $id): bool
    {
        $deleteProd = new ProductEntity($pdo);
        return $deleteProd->delete($id);
    }
}
