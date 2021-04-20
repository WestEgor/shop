<?php

namespace model;

use DateTime;

class Payment implements ModelInterface
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
    public function __construct()
    {
        $this->amount = -1;
        $this->paymentDate = new DateTime('now');
        $this->customerId = -1;
    }


    public static function parameterizedConstructor($customerId, $amount, DateTime $paymentDate)
    {
        $payment = new self();
        $payment->customerId = $customerId;
        $payment->amount = $amount;
        $payment->paymentDate = $paymentDate;
        return $payment;
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

    public function setAll(object $keys): bool
    {
        if (!$keys) return false;
        foreach ($keys as $key => $value) {
            if ($key === 'customers_id') $this->customerId = $value;
            if ($key === 'id') $this->id = $value;
            if ($key === 'amount') $this->amount = $value;
            if ($key === 'payment_date') $this->paymentDate = DateTime::createFromFormat('Y-m-d', $value);
        }
        return true;
    }
}
