<?php

namespace repository\orders;

use config\Connector as Connection;
use DateTime;
use model\Order;
use PDO;

/**
 * Class OrdersEntityMethods
 * Class which have static methods to manipulate ProductsEntities methods
 * @package repository\products
 */
class OrdersEntityMethods
{
    /**
     * Methods, that create record in 'orders' entity in @package public
     * @param DateTime $orderDate
     * @param DateTime $requiredDate
     * @param string $status
     * @param string $comments
     * @param int $customersId
     * @return bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     */
    public static function createOrder(DateTime $orderDate, DateTime $requiredDate,
                                       string $status, string $comments, int $customersId): bool
    {
        $pdo = Connection::get()->getConnect();
        $order = Order::parameterizedConstructor($orderDate, $requiredDate, $status, $comments, $customersId);
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->create($order);
    }

    /**
     * Methods, that get all records of 'orders' entity in @package public
     * @param PDO $pdo
     * @return array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     */
    public static function readAllOrders(PDO $pdo): array|false
    {
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->readAll();
    }

    /**
     * Methods, that get record with specified key of 'orders' entity in @package public
     * @param PDO $pdo
     * @param int $id
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     */
    public static function readOrderByKey(PDO $pdo, int $id): object|false
    {
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->read($id);
    }

    /**
     * Methods, that update record in 'orders' entity in @package public
     * @param PDO $pdo
     * @param int $id
     * @param DateTime $orderDate
     * @param DateTime $requiredDate
     * @param string $status
     * @param string $comments
     * @param int $customersId
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     */
    public static function updateOrder(PDO $pdo, int $id, DateTime $orderDate, DateTime $requiredDate,
                                       string $status, string $comments, int $customersId): bool
    {
        $order = Order::parameterizedConstructor($orderDate, $requiredDate, $status, $comments, $customersId);
        $order->setId($id);
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->update($order);
    }


    /**
     * Methods, that delete record in 'orders' entity in @package public
     * @param int $id
     * @return bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     */
    public static function deleteOrder(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $ordersEntity = new OrdersEntity($pdo);
        return $ordersEntity->delete($id);
    }

}