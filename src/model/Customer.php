<?php

namespace model;

use model\help_change_name\Contacts;
use model\help_change_name\Location;
use model\help_change_name\Person;

class Customer implements ModelInterface
{
    private int $id;
    private Person $person;
    private Location $location;
    private Contacts $contacts;

    /**
     * Customer constructor.
     * @param Person $person
     * @param Location $location
     * @param Contacts $contacts
     */
    public function __construct()
    {
    }

    public static function parameterizedConstructor(Person $person, Location $location, Contacts $contacts)
    {
        $customer = new self();
        $customer->person = $person;
        $customer->location = $location;
        $customer->contacts = $contacts;
        return $customer;
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
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person): void
    {
        $this->person = $person;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return Contacts
     */
    public function getContacts(): Contacts
    {
        return $this->contacts;
    }

    /**
     * @param Contacts $contacts
     */
    public function setContacts(Contacts $contacts): void
    {
        $this->contacts = $contacts;
    }

    public function getPersonName(): string
    {
        return $this->getPerson()->getName();
    }

    public function getPersonLastName(): string
    {
        return $this->getPerson()->getLastname();
    }

    public function getPersonAge(): string
    {
        return $this->getPerson()->getAge();
    }

    public function getLocationCountry(): string
    {
        return $this->getLocation()->getCountry();
    }

    public function getLocationCity(): string
    {
        return $this->getLocation()->getCity();
    }

    public function getLocationAddress(): string
    {
        return $this->getLocation()->getAddress();
    }

    public function getLocationZipCode(): string
    {
        return $this->getLocation()->getZipCode();
    }

    public function getContactsEmail(): string
    {
        return $this->getContacts()->getEmail();
    }

    public function getContactsPhoneNumber(): string
    {
        return $this->getContacts()->getPhoneNumber();
    }

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
