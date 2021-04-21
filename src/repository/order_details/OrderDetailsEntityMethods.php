<?php

namespace repository\order_details;

use config\Connector as Connection;
use model\OrderDetails;
use PDO;

/**
 * Class OrderDetailsEntityMethods
 * Class which have static methods to manipulate OrderDetailsEntities methods
 * @package repository\order_details
 */
class OrderDetailsEntityMethods
{

    /**
     * Methods, that create record in 'order_details' entity in @package public
     * @param int $productId
     * @param int $orderId
     * @param int $quantity_ordered
     * @param float $price
     * @return bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     */
    public static function createOrderDetails(int $productId, int $orderId, int $quantity_ordered, float $price): bool
    {
        $pdo = Connection::get()->getConnect();
        $orderDetails = OrderDetails::parameterizedConstructor($productId, $orderId, $quantity_ordered, $price);
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->create($orderDetails);
    }


    /**
     * Methods, that get all records of 'order_details' entity in @package public
     * @param PDO $pdo
     * @return array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     */
    public static function readAllOrderDetails(PDO $pdo): array|false
    {
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->readAll();
    }

    /**
     * Methods, that get record with specified key of 'order_details' entity in @package public
     * @param PDO $pdo
     * @param int $id
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     */
    public static function readOrderDetailsByKey(PDO $pdo, int $id): object|false
    {
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->read($id);
    }

    /**
     * Methods, that update record in 'order_details' entity in @package public
     * @param PDO $pdo
     * @param int $id
     * @param int $quantity_ordered
     * @param float $price
     * @param int $productId
     * @param int $orderId
     * @return bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     */
    public static function updateOrderDetails(PDO $pdo, int $id,
                                              int $quantity_ordered, float $price, int $productId, int $orderId): bool
    {
        $orderDetails = OrderDetails::parameterizedConstructor($productId, $orderId, $quantity_ordered, $price);
        $orderDetails->setId($id);
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->update($orderDetails);
    }

    /**
     * Methods, that delete record in 'order_details' entity in @package public
     * @param int $id
     * @return bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     */
    public static function deleteOrderDetails(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $orderDetailsEntity = new OrderDetailsEntity($pdo);
        return $orderDetailsEntity->delete($id);
    }

}