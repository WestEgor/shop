<?php


namespace repository\order_details;


use model\Order;
use model\OrderDetails;
use PDO;
use PDOStatement;
use repository\AbstractRepository;

class OrderDetailsEntity extends AbstractRepository
{

    public function readAllQuery(): string
    {
        return 'SELECT * FROM order_details';
    }

    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM order_details WHERE id = :id';
    }

    public function createQuery(): string
    {
        return 'INSERT INTO order_details(products_id,orders_id, quantity_ordered, price) 
                VALUES(:products_id, :orders_id, :quantity_ordered, :price)';
    }

    public function updateQuery(): string
    {
        return 'UPDATE order_details 
                SET products_id = :products_id, orders_id=: orders_id, 
                    quantity_ordered = :quantity_ordered, price = :price
                WHERE id = :id';
    }

    public function deleteQuery(): string
    {
        return 'DELETE FROM order_details WHERE id = :id';
    }

    public function createStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':products_id', $object->getProductId());
        $statement->bindValue(':orders_id', $object->getOrderId());
        $statement->bindValue(':quantity_ordered', $object->getQuantityOrdered());
        $statement->bindValue(':price', $object->getPrice());
        return $statement->execute();
    }

    public function readAllStatement(PDOStatement $statement): array|false
    {
        $orderDetailsArray = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $productId = $row['products_id'];
            $orderId = $row['orders_id'];
            $quantityOrdered = $row['quantity_ordered'];
            $price = $row['price'];
            $order = OrderDetails::parameterizedConstructor($productId, $orderId, $quantityOrdered, $price);
            $order->setId($id);
            $orderDetailsArray[] = $order;
        }
        return $orderDetailsArray;
    }

    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $orderDetails = new OrderDetails();
        $obj = $statement->fetchObject();
        if (!$obj) return false;
        $orderDetails->setAll($obj);
        return $orderDetails;
    }

    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':products_id', $object->getProductId());
        $statement->bindValue(':orders_id', $object->getOrderId());
        $statement->bindValue(':quantity_ordered', $object->getQuantityOrdered());
        $statement->bindValue(':price', $object->getPrice());
        $statement->bindValue(':id', $object->getId());
        return $statement->execute();
    }
}