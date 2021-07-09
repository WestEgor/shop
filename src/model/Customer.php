<?php

namespace model;

use Exception;
use JetBrains\PhpStorm\Pure;
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
     * @var int|null id of entity 'customer'
     */
    private ?int $id;

    /**
     * @var Person|null persons information of entity 'customer'
     */
    private ?Person $person;

    /**
     * @var Location|null location information of entity 'customer'
     */
    private ?Location $location;

    /**
     * @var Contacts|null $contacts information of entity 'customer'
     */
    private ?Contacts $contacts;


    public function __construct(
        ?Person $person = null,
        ?Location $location = null,
        ?Contacts $contacts = null,
        ?int $id = null
    ) {
        $this->person = $person;
        $this->location = $location;
        $this->contacts = $contacts;
        $this->id = $id;
    }


    /**
     * @return int|null customer id
     */
    public function getId(): ?int
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
     * @return Person|null persons information of customer
     */
    public function getPerson(): ?Person
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
     * @return Location|null location of customer
     */
    public function getLocation(): ?Location
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
     * @return Contacts|null contacts information of customer
     */
    public function getContacts(): ?Contacts
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
     * @return string|null persons name
     */
    public function getPersonName(): ?string
    {
        return $this->getPerson()?->getName();
    }

    /**
     * @return string|null persons last name
     */
    public function getPersonLastName(): ?string
    {
        return $this->getPerson()?->getLastname();
    }

    /**
     * @return int|null persons age
     */
    public function getPersonAge(): ?int
    {
        return $this->getPerson()?->getAge();
    }

    /**
     * @return string location country
     */
    public function getLocationCountry(): ?string
    {
        return $this->getLocation()?->getCountry();
    }

    /**
     * @return string|null location city
     */
    public function getLocationCity(): ?string
    {
        return $this->getLocation()?->getCity();
    }

    /**
     * @return string|null location address
     */
    public function getLocationAddress(): ?string
    {
        return $this->getLocation()?->getAddress();
    }

    /**
     * @return string|null zip code
     */
    public function getLocationZipCode(): ?string
    {
        return $this->getLocation()?->getZipCode();
    }

    /**
     * @return string|null contacts email
     */
    public function getContactsEmail(): ?string
    {
        return $this->getContacts()?->getEmail();
    }

    /**
     * @return string|null contacts phone number
     */
    public function getContactsPhoneNumber(): ?string
    {
        return $this->getContacts()?->getPhoneNumber();
    }

    /**
     * Implemented method from ModelInterface
     * @param object $keys
     * @return bool
     */
    public function setAll(object $keys): bool
    {
        $person = new Person();
        $location = new Location();
        $contacts = new Contacts();
        foreach ($keys as $key => $value) {
            if (is_string($key)) {
                match ($key) {
                    'id' => $this->id = $value,
                    'name' => $person->setName($value),
                    'last_name' => $person->setLastname($value),
                    'age' => $person->setAge($value),
                    'country' => $location->setCountry($value),
                    'city' => $location->setCity($value),
                    'address' => $location->setAddress($value),
                    'zip_code' => $location->setZipCode($value),
                    'email' => $contacts->setEmail($value),
                    'phone_number' => $contacts->setPhoneNumber($value),
                    default => null
                };
            }
        }
        $this->setPerson($person);
        $this->setLocation($location);
        $this->setContacts($contacts);
        return true;
    }
}
