<?php

namespace model;

class Product
{
    private int $id;
    private string $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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


    public function setAll(object $keys)
    {
        foreach ($keys as $key => $value) {
            if ($key === 'id') $this->id = $value;
            if ($key === 'name') $this->name = $value;
            if ($key === 'quantity') $this->quantity = $value;
            if ($key === 'price') $this->price = $value;
            if ($key === 'msrp') $this->msrp = $value;
        }
    }


}
