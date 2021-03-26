<?php
class OrderDetails{
    private int $id;
    private int $quantityOrdered;
    private float $price;
    private int $productId;
    private int $orderId;

    /**
     * OrderDetails constructor.
     * @param int $quantityOrdered
     * @param float $price
     * @param int $productId
     * @param int $orderId
     */
    public function __construct(int $quantityOrdered, float $price, int $productId, int $orderId)
    {
        $this->quantityOrdered = $quantityOrdered;
        $this->price = $price;
        $this->productId = $productId;
        $this->orderId = $orderId;
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




}