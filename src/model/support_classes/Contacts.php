<?php

namespace model\support_classes;

/**
 * Class Contacts
 * Support class for entities
 * @package model\support_classes
 */
class Contacts
{
    /**
     * @var string email
     */
    private string $email;
    /**
     * @var string phone number
     */
    private string $phoneNumber;

    /**
     * Contacts default constructor.
     */
    public function __construct()
    {
        $this->email = '';
        $this->phoneNumber = '';
    }

    /**
     * Method, that represents @Contacts parameterized constructor.
     * @param string $email
     * @param string $phoneNumber
     * @return Contacts
     */
    public static function parameterizedConstructor(string $email, string $phoneNumber): Contacts
    {
        $contacts = new self();
        $contacts->email = $email;
        $contacts->phoneNumber = $phoneNumber;
        return $contacts;
    }

    /**
     * @return string email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string phone number
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber phone number
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }


}