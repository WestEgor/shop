<?php

namespace model;

use model\support_classes\Contacts;
use model\support_classes\Location;
use model\support_classes\Person;

/**
 * Class Customer
 * Implement ModelInterface
 * Instance will be used to manipulate of entity of table ´customers´
 * @package model
 */
class Customer implements ModelInterface
{
    /**
     * @var int id of entity 'customer'
     */
    private int $id;

    /**
     * @var Person persons information of entity 'customer'
     */
    private Person $person;

    /**
     * @var Location location information of entity 'customer'
     */
    private Location $location;

    /**
     * @var Contacts $contacts information of entity 'customer'
     */
    private Contacts $contacts;

    /**
     * Customer default constructor.
     */
    public function __construct()
    {
        $this->id = -1;
        $this->person = new Person();
        $this->location = new Location();
        $this->contacts = new Contacts();
    }

    /**
     * Method, that represents customer parameterized constructor.
     * @param Person $person
     * @param Location $location
     * @param Contacts $contacts
     * @return Customer
     */
    public static function parameterizedConstructor(Person $person, Location $location, Contacts $contacts): Customer
    {
        $customer = new self();
        $customer->person = $person;
        $customer->location = $location;
        $customer->contacts = $contacts;
        return $customer;
    }


    /**
     * @return int customer id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id id of customer
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Person persons information of customer
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @param Person $person persons information of customer
     */
    public function setPerson(Person $person): void
    {
        $this->person = $person;
    }

    /**
     * @return Location location of customer
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location location of customer
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return Contacts contacts information of customer
     */
    public function getContacts(): Contacts
    {
        return $this->contacts;
    }

    /**
     * @param Contacts $contacts contacts information of customer
     */
    public function setContacts(Contacts $contacts): void
    {
        $this->contacts = $contacts;
    }


    /**
     * @return string persons name
     */
    public function getPersonName(): string
    {
        return $this->getPerson()->getName();
    }

    /**
     * @return string persons last name
     */
    public function getPersonLastName(): string
    {
        return $this->getPerson()->getLastname();
    }

    /**
     * @return string persons age
     */
    public function getPersonAge(): string
    {
        return $this->getPerson()->getAge();
    }

    /**
     * @return string location country
     */
    public function getLocationCountry(): string
    {
        return $this->getLocation()->getCountry();
    }

    /**
     * @return string location city
     */
    public function getLocationCity(): string
    {
        return $this->getLocation()->getCity();
    }

    /**
     * @return string location address
     */
    public function getLocationAddress(): string
    {
        return $this->getLocation()->getAddress();
    }

    /**
     * @return string zip code
     */
    public function getLocationZipCode(): string
    {
        return $this->getLocation()->getZipCode();
    }

    /**
     * @return string contacts email
     */
    public function getContactsEmail(): string
    {
        return $this->getContacts()->getEmail();
    }

    /**
     * @return string contacts phone number
     */
    public function getContactsPhoneNumber(): string
    {
        return $this->getContacts()->getPhoneNumber();
    }

    /**
     * Implemented method from ModelInterface
     * @param object $keys
     * @return bool
     */
    public function setAll(object $keys): bool
    {
        if (!$keys) return false;
        $person = new Person();
        $location = new Location();
        $contacts = new Contacts();
        foreach ($keys as $key => $value) {
            if ($key === 'id') $this->id = $value;
            if ($key === 'name') $person->setName($value);
            if ($key === 'last_name') $person->setLastname($value);
            if ($key === 'age') $person->setAge($value);
            if ($key === 'country') $location->setCountry($value);
            if ($key === 'city') $location->setCity($value);
            if ($key === 'address') $location->setAddress($value);
            if ($key === 'zip_code') $location->setZipCode($value);
            if ($key === 'email') $contacts->setEmail($value);
            if ($key === 'phone_number') $contacts->setPhoneNumber($value);
        }
        $this->setPerson($person);
        $this->setLocation($location);
        $this->setContacts($contacts);
        return true;
    }

}
