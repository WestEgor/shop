<?php

namespace model;

use DateTime;

class Order
{
    private int $id;
    private DateTime $orderDate;
    private DateTime $requiredDate;
    private string $status;
    private string $comments;
    private int $customerId;


    public function __construct()
    {

    }

    public static function parameterizedConstructor(DateTime $orderDate, DateTime $requiredDate,
                                                    string $status, string $comments, int $customerId)
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
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getOrderDate(): DateTime
    {
        return $this->orderDate;
    }

    /**
     * @param DateTime $orderDate
     */
    public function setOrderDate(DateTime $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return DateTime
     */
    public function getRequiredDate(): DateTime
    {
        return $this->requiredDate;
    }

    /**
     * @param DateTime $requiredDate
     */
    public function setRequiredDate(DateTime $requiredDate): void
    {
        $this->requiredDate = $requiredDate;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }


    public function setAll(object $keys)
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
