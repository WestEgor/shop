<?php

namespace model;

class OrderDetails implements ModelInterface
{
    private int $id;
    private int $productId;
    private int $orderId;
    private int $quantityOrdered;
    private float $price;

    public function __construct()
    {

    }

    public static function parameterizedConstructor(int $productId, int $orderId, int $quantityOrdered, float $price)
    {
        $orderDetails = new self();
        $orderDetails->productId = $productId;
        $orderDetails->orderId = $orderId;
        $orderDetails->quantityOrdered = $quantityOrdered;
        $orderDetails->price = $price;
        return $orderDetails;
    }

    /**
     * @return int
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
     * @return int
     */
    public function getQuantityOrdered(): int
    {
        return $this->quantityOrdered;
    }

    /**
     * @param int $quantityOrdered
     */
    public function setQuantityOrdered(int $quantityOrdered): void
    {
        $this->quantityOrdered = $quantityOrdered;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function setAll(object $keys)
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