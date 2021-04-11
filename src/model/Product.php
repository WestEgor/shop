<?php

namespace model;

class Product
{
    private int $id;
    private string $productName;
    private int $quantity;
    private float $price;
    private float $msrp;

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
     * @return String
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param String $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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
     * @return float
     */
    public function getMsrp(): float
    {
        return $this->msrp;
    }

    /**
     * @param float $msrp
     */
    public function setMsrp(float $msrp): void
    {
        $this->msrp = $msrp;
    }




}
