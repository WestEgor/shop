<?php


namespace repository\orders;


use DateTime;
use model\Order;
use PDO;
use PDOStatement;
use repository\AbstractRepository;

class OrdersEntity extends AbstractRepository
{

    public function readAllQuery(): string
    {
        return 'SELECT * FROM orders';
    }

    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM orders WHERE id = :id';
    }

    public function createQuery(): string
    {
        return 'INSERT INTO orders(order_date, required_date,status,comments,customers_id) 
                VALUES(:order_date, :required_date, :status, :comments, :customers_id)';
    }

    public function updateQuery(): string
    {
        return 'UPDATE orders 
                SET order_date = :order_date, required_date = :required_date,status= :status, 
                    comments=:comments, customers_id = :customers_id
                WHERE id = :id';
    }

    public function deleteQuery(): string
    {
        return 'DELETE FROM orders WHERE id = :id';
    }

    public function createStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':order_date', $object->getOrderDate()->format('Y-m-d'));
        $statement->bindValue(':required_date', $object->getRequiredDate()->format('Y-m-d'));
        $statement->bindValue(':status', $object->getStatus());
        $statement->bindValue(':comments', $object->getComments());
        $statement->bindValue(':customers_id', $object->getCustomerId());
        return $statement->execute();
    }

    public function readAllStatement(PDOStatement $statement): array|false
    {
        $orders = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $orderDate = DateTime::createFromFormat('Y-m-d', $row['order_date']);
            $requiredDate = DateTime::createFromFormat('Y-m-d', $row['required_date']);
            $status = $row['status'];
            $comments = $row['comments'];
            $customersId = $row['customers_id'];
            $order = Order::parameterizedConstructor($orderDate, $requiredDate, $status, $comments, $customersId);
            $order->setId($id);
            $orders[] = $order;
        }
        return $orders;
    }

    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $order = new Order();
        $obj = $statement->fetchObject();
        if (!$obj) return false;
        $order->setAll($obj);
        return $order;
    }

    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':order_date', $object->getOrderDate()->format('Y-m-d'));
        $statement->bindValue(':required_date', $object->getRequiredDate()->format('Y-m-d'));
        $statement->bindValue(':status', $object->getStatus());
        $statement->bindValue(':comments', $object->getComments());
        $statement->bindValue(':customers_id', $object->getCustomerId());
        $statement->bindValue(':id', $object->getId());
        return $statement->execute();
    }
}