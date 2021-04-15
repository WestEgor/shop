<?php

namespace model;
/**
 * Class Product
 * instance will be used to manipulate of entity of table´products´
 *
 * @package model
 */
class Product
{
    /**
     * id of table 'products'
     *
     * @var int
     */
    private int $id;

    /**
     * name of table 'products'
     *
     * @var string
     */
    private string $name;

    /**
     * quantity of table 'products'
     *
     * @var int
     */
    private int $quantity;

    /**
     * price of table 'products'
     *
     * @var float
     */
    private float $price;

    /**
     * msrp of table 'products'
     *
     * @var float
     */
    private float $msrp;

    /**
     * @return int product id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id id of product
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String product name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $name name of product
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int product quantity
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity quantity of product
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float price
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price price of product
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float product msrp
     */
    public function getMsrp(): float
    {
        return $this->msrp;
    }

    /**
     * @param float $msrp msrp of product
     */
    public function setMsrp(float $msrp): void
    {
        $this->msrp = $msrp;
    }

    /**
     * @param object $keys PDO::fetchObject returns stdClass
     * Methods used for parse from stdClass to Product
     * @return bool
     * return TRUE if object exists
     * return FALSE if object is null (false)
     */
    public function setAll(object $keys): bool
    {
        if (!$keys) return false;
        foreach ($keys as $key => $value) {
            if ($key === 'id') $this->id = $value;
            if ($key === 'name') $this->name = $value;
            if ($key === 'quantity') $this->quantity = $value;
            if ($key === 'price') $this->price = $value;
            if ($key === 'msrp') $this->msrp = $value;
        }
        return true;
    }

}
