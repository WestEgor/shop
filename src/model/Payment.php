<?php

namespace model;

use DateTime;
use util\DateMethods;

class Payment implements ModelInterface
{
    /**
     * @var int|null id of entity 'payments'
     */
    private ?int $id;

    /**
     * @var float|null amount of entity 'payments'
     */
    private ?float $amount;

    /**
     * @var DateTime|null payment_date of entity 'payments'
     */
    private ?DateTime $paymentDate;

    /**
     * @var int|null customer_id of entity 'payments', who paid
     */
    private ?int $customerId;


    /**
     * Payment default constructor.
     *
     * @param int|null      $customerId
     * @param float|null    $amount
     * @param DateTime|null $paymentDate
     * @param int|null      $id
     */
    public function __construct(
        ?float $amount = null,
        ?DateTime $paymentDate = null,
        ?int $customerId = null,
        ?int $id = null
    ) {
        $this->amount = $amount;
        $this->paymentDate = $paymentDate;
        $this->customerId = $customerId;
        $this->id = $id;
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
     *
     * @param  object $keys
     * @return bool
     */
    public function setAll(object $keys): bool
    {
        foreach ($keys as $key => $value) {
            if ($key === 'customers_id') {
                $this->customerId = $value;
            }
            if ($key === 'id') {
                $this->id = $value;
            }
            if ($key === 'amount') {
                $this->amount = $value;
            }
            if ($key === 'payment_date') {
                $this->paymentDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $value));
            }
        }
        return true;
    }
}
