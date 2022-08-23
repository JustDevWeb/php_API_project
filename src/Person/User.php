<?php

namespace Project\Api\Person;

class User
{
    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     */

    public function __construct
    (
        private int $id,
        private string $firstName,
        private string $lastName
    )
    {
    }

    public function __toString(): string
    {
       return "User id: {$this->getId()}.{$this->getFirstName()} {$this->getLastName()}".PHP_EOL;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }






}