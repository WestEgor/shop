<?php


namespace repository\payments;


use model\Customer;
use model\Payment;

class PaymentsJoin
{
    private Payment $payment;
    private Customer $customer;

    /**
     * PaymentsJoin constructor.
     * @param Payment $payment
     * @param Customer $customer
     */
    public function __construct(Payment $payment, Customer $customer)
    {
        $this->payment = $payment;
        $this->customer = $customer;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }




}