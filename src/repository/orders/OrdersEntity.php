<?php

namespace repository\orders;

use DateTime;
use model\Order;
use PDO;
use PDOStatement;
use repository\AbstractRepository;
use util\DateMethods;

/**
 * Class OrdersEntity
 * Extends AbstractRepository
 * Class for work with entity 'orders'
 *
 * @package repository\orders
 */
class OrdersEntity extends AbstractRepository
{

    /**
     * Implementation of abstract method
     *
     * @return string query of insert in 'orders'
     */
    public function createQuery(): string
    {
        return 'INSERT INTO orders(order_date, required_date,status,comments,customers_id) 
                VALUES(:order_date, :required_date, :status, :comments, :customers_id)';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of select all in 'orders'
     */
    public function readAllQuery(): string
    {
        return 'SELECT * FROM orders';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of select all in 'orders' with id
     */
    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM orders WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of update in 'orders'
     */
    public function updateQuery(): string
    {
        return 'UPDATE orders 
                SET order_date = :order_date, required_date = :required_date,status= :status, 
                    comments=:comments, customers_id = :customers_id
                WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of delete in 'orders' with
     */
    public function deleteQuery(): string
    {
        return 'DELETE FROM orders WHERE id = :id';
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
        if ($object instanceof Order) {
            $statement->bindValue(':order_date', $object->getOrderDate()->format('Y-m-d'));
            $statement->bindValue(':required_date', $object->getRequiredDate()->format('Y-m-d'));
            $statement->bindValue(':status', $object->getStatus());
            $statement->bindValue(':comments', $object->getComments());
            $statement->bindValue(':customers_id', $object->getCustomerId());
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
        $orders = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $orderDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $row['order_date']));
            $requiredDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $row['required_date']));
            $status = $row['status'];
            $comments = $row['comments'];
            $customersId = $row['customers_id'];
            $order = new Order($orderDate, $requiredDate, $status, $comments, $customersId, $id);
            $orders[] = $order;
        }
        return $orders;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  int          $key
     * @return Order|false
     */
    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $order = new Order();
        $obj = $statement->fetchObject();
        if (!$obj) {
            return false;
        }
        $order->setAll($obj);
        return $order;
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
        if ($object instanceof Order) {
            $statement->bindValue(':order_date', $object->getOrderDate()->format('Y-m-d'));
            $statement->bindValue(':required_date', $object->getRequiredDate()->format('Y-m-d'));
            $statement->bindValue(':status', $object->getStatus());
            $statement->bindValue(':comments', $object->getComments());
            $statement->bindValue(':customers_id', $object->getCustomerId());
            $statement->bindValue(':id', $object->getId());
            return $statement->execute();
        }
        return false;
    }
}
