<?php

namespace model;

use DateTime;
use util\DateMethods;

/** Class Order
 * Implement ModelInterface
 * Instance will be used to manipulate of entity of table ´orders´
 * @package model
 */
class Order implements ModelInterface
{
    /**
     * @var int|null  id of entity 'orders'
     */
    private ?int $id;

    /**
     * @var DateTime|null  order_date of entity 'orders'
     */
    private ?DateTime $orderDate;

    /**
     * @var DateTime|null  required_date of entity 'orders'
     */
    private ?DateTime $requiredDate;

    /**
     * @var string|null status of order in entity 'orders'
     */
    private ?string $status;

    /**
     * @var string|null comments to order in entity 'orders'
     */
    private ?string $comments;

    /**
     * @var int|null customer_id of entity 'orders', who made this order
     */
    private ?int $customerId;


    /**
     * Order constructor.
     * @param DateTime|null $orderDate
     * @param DateTime|null $requiredDate
     * @param string|null $status
     * @param string|null $comments
     * @param int|null $customerId
     * @param int|null $id
     */
    public function __construct(
        ?DateTime $orderDate = null,
        ?DateTime $requiredDate = null,
        ?string $status = null,
        ?string $comments = null,
        ?int $customerId = null,
        ?int $id = null
    ) {
        $this->orderDate = $orderDate;
        $this->requiredDate = $requiredDate;
        $this->status = $status;
        $this->comments = $comments;
        $this->customerId = $customerId;
        $this->id = $id;
    }


    /**
     * @return int|null id of order
     */
    public function getId(): ?int
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
     * @return DateTime|null date of order
     */
    public function getOrderDate(): ?DateTime
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
     * @return DateTime|null required date to order
     */
    public function getRequiredDate(): ?DateTime
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
     * @return string|null status of order
     */
    public function getStatus(): ?string
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
     * @return string|null comments to order
     */
    public function getComments(): ?string
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
     * @return int|null customer id (who made this order)
     */
    public function getCustomerId(): ?int
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
        foreach ($keys as $key => $value) {
            if ($key === 'id') {
                $this->id = $value;
            }
            if ($key === 'order_date') {
                $this->orderDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $value));
            }
            if ($key === 'required_date') {
                $this->orderDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $value));
            }
            if ($key === 'status') {
                $this->status = $value;
            }
            if ($key === 'comments') {
                $this->comments = $value;
            }
            if ($key === 'customers_id') {
                $this->customerId = $value;
            }
        }
        return true;
    }
}
