<?php

namespace model;

/**
 * Class Product
 * Instance will be used to manipulate of entity of table ´products´
 * @package model
 */
class Product implements ModelInterface
{
    /**
     * id of entity 'products'
     * @var int
     */
    private int $id;

    /**
     * name of entity 'products'
     * @var string
     */
    private string $name;

    /**
     * quantity of entity 'products'
     * @var int
     */
    private int $quantity;

    /**
     * price of entity 'products'
     * @var float
     */
    private float $price;

    /**
     * msrp of entity 'products'
     * @var float
     */
    private float $msrp;

    /**
     * Product default constructor.
     */
    public function __construct()
    {
        $this->id = -1;
        $this->name = '';
        $this->quantity = -1;
        $this->price = -1.0;
        $this->msrp = -1.0;
    }


    /**
     * Method, that represents Product parameterized constructor
     * @param string $name
     * @param int $quantity
     * @param float $price
     * @param float $msrp
     * @return Product
     */
    public static function parameterizedConstructor(string $name, int $quantity,
                                                    float $price, float $msrp): Product
    {
        $product = new self();
        $product->name = $name;
        $product->quantity = $quantity;
        $product->price = $price;
        $product->msrp = $msrp;
        return $product;
    }


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
     * Implemented method from ModelInterface
     * @param object $keys
     * @return bool
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
