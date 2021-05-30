<?php

namespace model\support_classes;

/**
 * Class Location
 * Support class for entities
 * @package model\support_classes
 */
class Location
{
    /**
     * @var string country
     */
    private string $country;

    /**
     * @var string city
     */
    private string $city;

    /**
     * @var string address
     */
    private string $address;

    /**
     * @var string zip code
     */
    private string $zipCode;

    /**
     * Method, that represents @Location parameterized constructor.
     * @param string $country
     * @param string $city
     * @param string $address
     * @param string $zipCode
     * @return Location
     */
    public static function parameterizedConstructor(string $country, string $city,
                                                    string $address, string $zipCode): Location
    {
        $location = new self();
        $location->country = $country;
        $location->city = $city;
        $location->address = $address;
        $location->zipCode = $zipCode;
        return $location;
    }

    /**
     * @return string country
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string address
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string zip code
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode zip code
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

}