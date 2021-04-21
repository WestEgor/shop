<?php

namespace model;

use DateTime;

class Payment implements ModelInterface
{
    /**
     * @var int id of entity 'payments'
     */
    private int $id;

    /**
     * @var float amount of entity 'payments'
     */
    private float $amount;

    /**
     * @var DateTime payment_date of entity 'payments'
     */
    private DateTime $paymentDate;

    /**
     * @var int customer_id of entity 'payments', who paid
     */
    private int $customerId;


    /**
     * Payment default constructor.
     */
    public function __construct()
    {
        $this->amount = -1;
        $this->paymentDate = new DateTime('now');
        $this->customerId = -1;
    }

    /**
     * Method, that represent Payment parameterized constructor.
     * @param float $amount
     * @param DateTime $paymentDate
     * @param int $customerId
     * @return Payment
     */
    public static function parameterizedConstructor(int $customerId, float $amount, DateTime $paymentDate): Payment
    {
        $payment = new self();
        $payment->customerId = $customerId;
        $payment->amount = $amount;
        $payment->paymentDate = $paymentDate;
        return $payment;
    }

    /**
     * @return int id of payments
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id id of payments
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float amount of payments
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount amount of payments
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return DateTime payment date
     */
    public function getPaymentDate(): DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @param DateTime $paymentDate payment date
     */
    public function setPaymentDate(DateTime $paymentDate): void
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return int customer id
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId customer id
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
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
            if ($key === 'customers_id') $this->customerId = $value;
            if ($key === 'id') $this->id = $value;
            if ($key === 'amount') $this->amount = $value;
            if ($key === 'payment_date') $this->paymentDate = DateTime::createFromFormat('Y-m-d', $value);
        }
        return true;
    }
}
