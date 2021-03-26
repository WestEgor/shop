<?php
class Product{
    private int $id;
    private String $productName;
    private int $quantity;
    private float $price;
    private float $msrp;
    private int $productLineId;

    /**
     * Product constructor.
     * @param String $productName
     * @param int $quantity
     * @param float $price
     * @param float $msrp
     * @param int $productLineId
     */
    public function __construct(string $productName, int $quantity, float $price, float $msrp, int $productLineId)
    {
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->msrp = $msrp;
        $this->productLineId = $productLineId;
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

    /**
     * @return int
     */
    public function getProductLineId(): int
    {
        return $this->productLineId;
    }

    /**
     * @param int $productLineId
     */
    public function setProductLineId(int $productLineId): void
    {
        $this->productLineId = $productLineId;
    }




}
