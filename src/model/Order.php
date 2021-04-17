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
    private string $costumerId;

    /**
     * Order constructor.
     * @param DateTime $orderDate
     * @param DateTime $requiredDate
     * @param string $status
     * @param string $comments
     * @param string $costumerId
     */
    public function __construct(DateTime $orderDate, DateTime $requiredDate,
                                string $status, string $comments, string $costumerId)
    {
        $this->orderDate = $orderDate;
        $this->requiredDate = $requiredDate;
        $this->status = $status;
        $this->comments = $comments;
        $this->costumerId = $costumerId;
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
     * @return string
     */
    public function getCostumerId(): string
    {
        return $this->costumerId;
    }

    /**
     * @param string $costumerId
     */
    public function setCostumerId(string $costumerId): void
    {
        $this->costumerId = $costumerId;
    }


}
