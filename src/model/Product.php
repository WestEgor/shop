<?php

namespace model;

/**
 * Class Product
 * Instance will be used to manipulate of entity of table ´products´
 *
 * @package model
 */
class Product implements ModelInterface
{
    /**
     * id of entity 'products'
     *
     * @var int|null
     */
    private ?int $id;

    /**
     * name of entity 'products'
     *
     * @var string|null
     */
    private ?string $name;

    /**
     * quantity of entity 'products'
     *
     * @var int|null
     */
    private ?int $quantity;

    /**
     * price of entity 'products'
     *
     * @var float|null
     */
    private ?float $price;

    /**
     * msrp of entity 'products'
     *
     * @var float|null
     */
    private ?float $msrp;

    /**
     * Product constructor.
     *
     * @param string|null $name
     * @param int|null    $quantity
     * @param float|null  $price
     * @param float|null  $msrp
     * @param int|null    $id
     */
    public function __construct(
        ?string $name = null,
        ?int $quantity = null,
        ?float $price = null,
        ?float $msrp = null,
        ?int $id = null
    ) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->msrp = $msrp;
        $this->id = $id;
    }


    /**
     * @return int|null product id
     */
    public function getId(): ?int
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
     * @return string|null product name
     */
    public function getName(): ?string
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
     * @return int|null product quantity
     */
    public function getQuantity(): ?int
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
     * @return float|null price
     */
    public function getPrice(): ?float
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
     * @return float|null product msrp
     */
    public function getMsrp(): ?float
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
     *
     * @param  object $keys
     * @return bool
     */
    public function setAll(object $keys): bool
    {
        foreach ($keys as $key => $value) {
            if ($key === 'id') {
                $this->id = $value;
            }
            if ($key === 'name') {
                $this->name = $value;
            }
            if ($key === 'quantity') {
                $this->quantity = $value;
            }
            if ($key === 'price') {
                $this->price = $value;
            }
            if ($key === 'msrp') {
                $this->msrp = $value;
            }
        }
        return true;
    }
}
