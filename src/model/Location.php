<?php

namespace model;


class Location
{
    private string $country;
    private string $city;
    private string $address;
    private string $zipCode;

    /**
     * Location constructor.
     * @param string $country
     * @param string $city
     * @param string $address
     * @param string $zipCode
     */
    public function __construct(string $country, string $city, string $address, string $zipCode)
    {
        $this->country = $country;
        $this->city = $city;
        $this->address = $address;
        $this->zipCode = $zipCode;
    }


    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }


}
