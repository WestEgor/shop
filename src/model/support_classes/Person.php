<?php

namespace model\support_classes;

/**
 * Class Person
 * Support class for entities
 * @package model\support_classes
 */
class Person
{
    /**
     * @var string name
     */
    private string $name;

    /**
     * @var string last name
     */
    private string $lastname;

    /**
     * @var int age
     */
    private int $age;

    /**
     * Person default constructor.
     */
    public function __construct()
    {
        $this->name = '';
        $this->lastname = '';
        $this->age = -1;
    }

    /**
     * Method, that represents @Person parameterized constructor.
     * @param string $name
     * @param string $lastname
     * @param int $age
     * @return Person
     */
    public static function parameterizedConstructor(string $name, string $lastname, int $age): Person
    {
        $person = new self();
        $person->name = $name;
        $person->lastname = $lastname;
        $person->age = $age;
        return $person;
    }

    /**
     * @return string name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string last name
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname last name
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return int age
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

}
