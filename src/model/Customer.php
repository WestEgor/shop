<?php

namespace model;

class Customer
{
    private int $id;
    private Person $person;
    private int $age;
    private Location $location;
    private Contacts $contacts;
    private int $employeeId;

    /**
     * Customer constructor.
     * @param Person $person
     * @param int $age
     * @param Location $location
     * @param Contacts $contacts
     * @param int $employeeId
     */
    public function __construct(Person $person, int $age, Location $location, Contacts $contacts, int $employeeId)
    {
        $this->person = $person;
        $this->age = $age;
        $this->location = $location;
        $this->contacts = $contacts;
        $this->employeeId = $employeeId;
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
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
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


    /**
     * @return int
     */
    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    /**
     * @param int $employeeId
     */
    public function setEmployeeId(int $employeeId): void
    {
        $this->employeeId = $employeeId;
    }


}
