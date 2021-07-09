<?php

namespace model;

use util\DateMethods;

class OrderDetails implements ModelInterface
{
    /**
     * @var int|null id of entity 'order_details'
     */
    private ?int $id;

    /**
     * @var int|null  product id of entity 'order_details'
     */
    private ?int $productId;

    /**
     * @var int|null  order id of entity 'order_details'
     */
    private ?int $orderId;

    /**
     * @var int|null  quantity_ordered of entity 'order_details'
     */
    private ?int $quantityOrdered;

    /**
     * @var float|null  price of entity 'order_details'
     */
    private ?float $price;

    /**
     * OrderDetails constructor.
     * @param int|null $productId
     * @param int|null $orderId
     * @param int|null $quantityOrdered
     * @param float|null $price
     * @param int|null $id
     */
    public function __construct(
        ?int $productId = null,
        ?int $orderId = null,
        ?int $quantityOrdered = null,
        ?float $price = null,
        ?int $id = null
    )
    {
        $this->productId = $productId;
        $this->orderId = $orderId;
        $this->quantityOrdered = $quantityOrdered;
        $this->price = $price;
        $this->id = $id;
    }

    /**
     * @return int|null id
     */
    public function getId(): ?int
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
     * @return int|null quantity ordered
     */
    public function getQuantityOrdered(): ?int
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
     * @return float|null price
     */
    public function getPrice(): ?float
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
     * @return int|null product id
     */
    public function getProductId(): ?int
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
     * @return int|null order id
     */
    public function getOrderId(): ?int
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
     *
     * @param object $keys
     * @return bool
     */
    public function setAll(object $keys): bool
    {
        foreach ($keys as $key => $value) {
            if (is_string($key)) {
                match ($key) {
                    'id' => $this->id = $value,
                    'products_id' => $this->productId = $value,
                    'orders_id' => $this->orderId = $value,
                    'quantity_ordered' => $this->quantityOrdered = $value,
                    'price' => $this->price = $value,
                    default => null
                };
            }
        }
        return true;
    }
}
