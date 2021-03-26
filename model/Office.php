<?php

class Office
{
    private int $id;
    private Location $location;
    private Contacts $contacts;

    /**
     * Office constructor.
     * @param Location $location
     * @param Contacts $contacts
     */
    public function __construct(Location $location, Contacts $contacts)
    {
        $this->location = $location;
        $this->contacts = $contacts;
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


}
