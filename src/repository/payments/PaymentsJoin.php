<?php

namespace repository\payments;

use model\Customer;
use model\Payment;

/**
 * Class PaymentsJoin
 * Class for join entities 'payments' and 'customers'
 *
 * @package repository\payments
 */
class PaymentsJoin
{
    /**
     * @var Payment payments entity
     */
    private Payment $payment;

    /**
     * @var Customer customers entity
     */
    private Customer $customer;

    /**
     * PaymentsJoin parameterized constructor.
     *
     * @param Payment  $payment
     * @param Customer $customer
     */
    public function __construct(Payment $payment, Customer $customer)
    {
        $this->payment = $payment;
        $this->customer = $customer;
    }

    /**
     * @return Payment payments object
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment payments object
     */
    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * @return Customer customers object
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer customers object
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }
}
