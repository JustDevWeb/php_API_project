<?php

namespace Project\Api\Person;

class Name
{
    /**
     * @param string $firstName
     * @param string $lastName
     */

    public function __construct
    (
        private string $firstName,
        private string $lastName
    )
    {
    }

    public function __toString(): string
    {
       return $this->firstName. ' ' . $this->lastName;
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