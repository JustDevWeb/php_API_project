<?php

namespace Project\Api\Person;

use \DateTimeImmutable;

class Person
{
    /**
     * @param Name $name
     * @param DateTimeImmutable $registeredON
     */

    public function __construct (
        private Name $name,
        private DateTimeImmutable $registeredON
    )
    {
    }

    public function __toString()
    {
        return $this->name . ' (на сайте с ' . $this->registeredON->format('Y-m-d').')';
    }


    public function getName(): Name
    {
        return $this->name;
    }


    public function setName(Name $name): void
    {
        $this->name = $name;
    }


    public function getRegisteredON(): DateTimeImmutable
    {
        return $this->registeredON;
    }


    public function setRegisteredON(DateTimeImmutable $registeredON): void
    {
        $this->registeredON = $registeredON;
    }




}