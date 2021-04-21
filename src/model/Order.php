<?php

namespace model;

use DateTime;

/** Class Order
 * Implement ModelInterface
 * Instance will be used to manipulate of entity of table ´orders´
 * @package model
 */
class Order implements ModelInterface
{
    /**
     * @var int id of entity 'orders'
     */
    private int $id;

    /**
     * @var DateTime order_date of entity 'orders'
     */
    private DateTime $orderDate;

    /**
     * @var DateTime required_date of entity 'orders'
     */
    private DateTime $requiredDate;

    /**
     * @var string status of order in entity 'orders'
     */
    private string $status;

    /**
     * @var string  comments to order in entity 'orders'
     */
    private string $comments;

    /**
     * @var int customer_id of entity 'orders', who made this order
     */
    private int $customerId;


    /**
     * Order default constructor
     */
    public function __construct()
    {
        $this->id = -1;
        $this->orderDate = new DateTime('now');
        $this->requiredDate = new DateTime('now');
        $this->status = '';
        $this->comments = '';
        $this->customerId = -1;
    }

    /**
     * Method, that represents Order parameterized constructor
     * @param DateTime $orderDate
     * @param DateTime $requiredDate
     * @param string $status
     * @param string $comments
     * @param int $customerId
     * @return Order
     */
    public static function parameterizedConstructor(DateTime $orderDate, DateTime $requiredDate,
                                                    string $status, string $comments, int $customerId): Order
    {
        $order = new self();
        $order->orderDate = $orderDate;
        $order->requiredDate = $requiredDate;
        $order->status = $status;
        $order->comments = $comments;
        $order->customerId = $customerId;
        return $order;
    }

    /**
     * @return int id of order
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id id of order
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime date of order
     */
    public function getOrderDate(): DateTime
    {
        return $this->orderDate;
    }

    /**
     * @param DateTime $orderDate date of order
     */
    public function setOrderDate(DateTime $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return DateTime required date to order
     */
    public function getRequiredDate(): DateTime
    {
        return $this->requiredDate;
    }

    /**
     * @param DateTime $requiredDate required date to order
     */
    public function setRequiredDate(DateTime $requiredDate): void
    {
        $this->requiredDate = $requiredDate;
    }

    /**
     * @return string status of order
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status status of order
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string comments to order
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments comments to order
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return int customer id (who made this order)
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId customer id (who made this order)
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Implemented method from ModelInterface
     * @param object $keys
     * @return bool
     */
    public function setAll(object $keys): bool
    {
        if (!$keys) return false;
        foreach ($keys as $key => $value) {
            if ($key === 'id') $this->id = $value;
            if ($key === 'order_date') $this->orderDate = DateTime::createFromFormat('Y-m-d', $value);
            if ($key === 'required_date') $this->requiredDate = DateTime::createFromFormat('Y-m-d', $value);
            if ($key === 'status') $this->status = $value;
            if ($key === 'comments') $this->comments = $value;
            if ($key === 'customers_id') $this->customerId = $value;
        }
        return true;
    }


}
