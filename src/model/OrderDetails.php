<?php

namespace model;

class OrderDetails implements ModelInterface
{
    /**
     * @var int id of entity 'order_details'
     */
    private int $id;

    /**
     * @var int product id of entity 'order_details'
     */
    private int $productId;

    /**
     * @var int order id of entity 'order_details'
     */
    private int $orderId;

    /**
     * @var int quantity_ordered of entity 'order_details'
     */
    private int $quantityOrdered;

    /**
     * @var float price of entity 'order_details'
     */
    private float $price;

    /**
     * OrderDetails default constructor.
     */
    public function __construct()
    {
    }

    /**
     * Method, that represents OrderDetails parameterized constructor
     * @param int $productId
     * @param int $orderId
     * @param int $quantityOrdered
     * @param float $price
     * @return OrderDetails
     */
    public static function parameterizedConstructor(int $productId, int $orderId,
                                                    int $quantityOrdered, float $price): OrderDetails
    {
        $orderDetails = new self();
        $orderDetails->productId = $productId;
        $orderDetails->orderId = $orderId;
        $orderDetails->quantityOrdered = $quantityOrdered;
        $orderDetails->price = $price;
        return $orderDetails;
    }

    /**
     * @return int id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int quantity ordered
     */
    public function getQuantityOrdered(): int
    {
        return $this->quantityOrdered;
    }

    /**
     * @param int $quantityOrdered quantity ordered
     */
    public function setQuantityOrdered(int $quantityOrdered): void
    {
        $this->quantityOrdered = $quantityOrdered;
    }

    /**
     * @return float proce
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int product id
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId product id
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int order id
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId order id
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
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
            if ($key === 'products_id') $this->productId = $value;
            if ($key === 'orders_id') $this->orderId = $value;
            if ($key === 'quantity_ordered') $this->quantityOrdered = $value;
            if ($key === 'price') $this->price = $value;
        }
        return true;
    }
}