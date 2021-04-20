<?php

namespace model\help_change_name;

class Person
{
    private string $name;
    private string $lastname;
    private int $age;


    public function __construct()
    {
        $this->name = '';
        $this->lastname = '';
        $this->age = -1;
    }

    /**
     * Person constructor.
     * @param string $name
     * @param string $lastname
     * @param int $age
     */
    public static function  parameterizedConstructor(string $name, string $lastname, int $age)
    {
        $person = new self();
        $person->name = $name;
        $person->lastname = $lastname;
        $person->age = $age;
        return $person;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
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


}
