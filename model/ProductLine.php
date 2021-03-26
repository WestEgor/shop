<?php
class ProductLine{
    private int $id;
    private string $productLine;
    private string $textDescription;

    /**
     * ProductLine constructor.
     * @param string $productLine
     * @param string $textDescription
     */
    public function __construct(string $productLine, string $textDescription)
    {
        $this->productLine = $productLine;
        $this->textDescription = $textDescription;
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
     * @return string
     */
    public function getProductLine(): string
    {
        return $this->productLine;
    }

    /**
     * @param string $productLine
     */
    public function setProductLine(string $productLine): void
    {
        $this->productLine = $productLine;
    }

    /**
     * @return string
     */
    public function getTextDescription(): string
    {
        return $this->textDescription;
    }

    /**
     * @param string $textDescription
     */
    public function setTextDescription(string $textDescription): void
    {
        $this->textDescription = $textDescription;
    }




}
