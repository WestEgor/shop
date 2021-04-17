<?php

namespace model;

class Contacts
{
    private string $email;
    private string $phoneNumber;

    /**
     * Contacts constructor.
     * @param string $email
     * @param string $phoneNumber
     */
    public static function parameterizedConstructor(string $email, string $phoneNumber)
    {
        $contacts = new self();
        $contacts->email = $email;
        $contacts->phoneNumber = $phoneNumber;
        return $contacts;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }


}