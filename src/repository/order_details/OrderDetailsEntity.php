<?php

namespace repository\order_details;

use model\Order;
use model\OrderDetails;
use model\Product;
use PDO;
use PDOStatement;
use repository\AbstractRepository;

/**
 * Class OrderDetailsEntity
 * Extends AbstractRepository
 * Class for work with entity 'order_details'
 *
 * @package repository\order_details
 */
class OrderDetailsEntity extends AbstractRepository
{

    /**
     * Implementation of abstract method
     *
     * @return string query of select all in 'order_details'
     */
    public function readAllQuery(): string
    {
        return 'SELECT * FROM order_details';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of select all in 'order_details' with id
     */
    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM order_details WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of insert in 'order_details'
     */
    public function createQuery(): string
    {
        return 'INSERT INTO order_details(products_id,orders_id, quantity_ordered, price) 
                VALUES(:products_id, :orders_id, :quantity_ordered, :price)';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of update in 'order_details'
     */
    public function updateQuery(): string
    {
        return 'UPDATE order_details 
                SET products_id = :products_id, orders_id=: orders_id, 
                    quantity_ordered = :quantity_ordered, price = :price
                WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of delete in 'order_details' with id
     */
    public function deleteQuery(): string
    {
        return 'DELETE FROM order_details WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  object       $object
     * @return bool
     */
    public function createStatement(PDOStatement $statement, object $object): bool
    {
        if ($object instanceof OrderDetails) {
            $statement->bindValue(':products_id', $object->getProductId());
            $statement->bindValue(':orders_id', $object->getOrderId());
            $statement->bindValue(':quantity_ordered', $object->getQuantityOrdered());
            $statement->bindValue(':price', $object->getPrice());
            return $statement->execute();
        }
        return false;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @return array|false
     */
    public function readAllStatement(PDOStatement $statement): array|false
    {
        $orderDetailsArray = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $productId = $row['products_id'];
            $orderId = $row['orders_id'];
            $quantityOrdered = $row['quantity_ordered'];
            $price = $row['price'];
            $order = new OrderDetails($productId, $orderId, $quantityOrdered, $price, $id);
            $orderDetailsArray[] = $order;
        }
        return $orderDetailsArray;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  int          $key
     * @return object|false
     */
    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $orderDetails = new OrderDetails();
        $obj = $statement->fetchObject();
        if (!$obj) {
            return false;
        }
        $orderDetails->setAll($obj);
        return $orderDetails;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  object       $object
     * @return bool
     */
    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        if ($object instanceof OrderDetails) {
            $statement->bindValue(':products_id', $object->getProductId());
            $statement->bindValue(':orders_id', $object->getOrderId());
            $statement->bindValue(':quantity_ordered', $object->getQuantityOrdered());
            $statement->bindValue(':price', $object->getPrice());
            $statement->bindValue(':id', $object->getId());
            return $statement->execute();
        }
        return false;
    }
}
