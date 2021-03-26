<?php

class Payment
{
    private int $id;
    private float $amount;
    private DateTime $paymentDate;
    private int $customerId;

    /**
     * Payment constructor.
     * @param float $amount
     * @param DateTime $paymentDate
     * @param int $customerId
     */
    public function __construct(float $amount, DateTime $paymentDate, int $customerId)
    {
        $this->amount = $amount;
        $this->paymentDate = $paymentDate;
        $this->customerId = $customerId;
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
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return DateTime
     */
    public function getPaymentDate(): DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @param DateTime $paymentDate
     */
    public function setPaymentDate(DateTime $paymentDate): void
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }




}
