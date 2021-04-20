<?php

namespace repository\orders;

use config\Connector as Connection;
use DateTime;
use model\Order;
use PDO;

class OrdersEntityMethods
{

    public static function createOrder(DateTime $orderDate, DateTime $requiredDate,
                                         string $status, string $comments, int $customersId): bool
    {
        $pdo = Connection::get()->getConnect();
        $order = Order::parameterizedConstructor($orderDate, $requiredDate, $status, $comments, $customersId);
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->create($order);
    }

    public static function readAllOrders(PDO $pdo): array|false
    {
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->readAll();
    }

    public static function readOrderByKey(PDO $pdo, int $id): object|false
    {
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->read($id);
    }

    public static function updateOrder(PDO $pdo, int $id, DateTime $orderDate, DateTime $requiredDate,
                                         string $status, string $comments, int $customersId): bool
    {
        $order = Order::parameterizedConstructor($orderDate, $requiredDate, $status, $comments, $customersId);
        $order->setId($id);
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->update($order);
    }


    public static function deleteOrder(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->delete($id);
    }

}