<?php
class Employee{
    private int $id;
    private Person $person;
    private Contacts $contacts;
    private int $officeId;

    /**
     * Employee constructor.
     * @param Person $person
     * @param Contacts $contacts
     * @param int $officeId
     */
    public function __construct(Person $person, Contacts $contacts, int $officeId)
    {
        $this->person = $person;
        $this->contacts = $contacts;
        $this->officeId = $officeId;
    }

    /**
     * @return int
     */
    public function getId() : int
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
    public function getPerson() : Person
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
     * @return Contacts
     */
    public function getContacts() : Contacts
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
    public function getOfficeId() :int
    {
        return $this->officeId;
    }

    /**
     * @param int $officeId
     */
    public function setOfficeId(int $officeId): void
    {
        $this->officeId = $officeId;
    }





}