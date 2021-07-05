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
     * @var string|null name
     */
    private ?string $name;

    /**
     * @var string|null last name
     */
    private ?string $lastname;

    /**
     * @var int|null age
     */
    private ?int $age;

    /**
     * Person constructor.
     * @param string|null $name
     * @param string|null $lastname
     * @param int|null $age
     */
    public function __construct(?string $name = null,
                                ?string $lastname = null,
                                ?int $age = null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
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
