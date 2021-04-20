<?php


namespace repository\order_details;

use config\Connector as Connection;
use model\OrderDetails;
use PDO;

class OrderDetailsEntityMethods
{

    public static function createOrderDetails(int $productId, int $orderId, int $quantity_ordered, float $price): bool
    {
        $pdo = Connection::get()->getConnect();
        $orderDetails = OrderDetails::parameterizedConstructor($productId, $orderId, $quantity_ordered, $price);
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->create($orderDetails);
    }


    public static function readAllOrderDetails(PDO $pdo): array|false
    {
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->readAll();
    }

    public static function readOrderDetailsByKey(PDO $pdo, int $id): object|false
    {
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->read($id);
    }


    public static function updateOrderDetails(PDO $pdo, int $id,
                                              int $quantity_ordered, float $price, int $productId, int $orderId): bool
    {
        $orderDetails = OrderDetails::parameterizedConstructor($productId, $orderId, $quantity_ordered, $price);
        $orderDetails->setId($id);
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->update($orderDetails);
    }

    public static function deleteOrderDetails(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->delete($id);
    }

}